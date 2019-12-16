<?php

namespace App\Http\Controllers;

use App\Agency;
use Illuminate\Http\Request;
use App\Article;
use App\FAQ;
use App\Testimoni;
use App\Page;
use App\TypeOfCooperation;
use App\Country;
use App\DeputiInformation;
use App\FileDeputiInformation;
use App\Http\Requests\StoreSubmissionProposalGuestRequest;
use App\Mail\ResiSubmissionCooperation;
use App\Mail\SurveyKepuasan;
use App\Notifications\DeputiNotificationGuest;
use App\Province;
use App\Regency;
use App\SatisfactionSurvey;
use App\SubmissionProposal;
use App\SubmissionProposalGuest;
use App\Suggestion;
use App\TypeOfCooperationOneDerivative;
use App\TypeOfCooperationTwoDerivative;
use Illuminate\Support\Facades\Notification;
use DB;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function filterMonitoringCooperation($data) {
        $monitoring['data'] = SubmissionProposalGuest::with('country','province','regency','agencies','typeOfCooperation','typeOfCooperationOne','typeOfCooperationTwo','deputi.role','tracking','nomor','reason','law')->where('mailing_number', $data['q'])->first();
        $monitoring['biro'] = array_values($monitoring['data']['tracking']->toArray())[2];
        $data = array_values($monitoring['data']['tracking']->toArray());
        $monitoring['user_kppa'] = array_splice($data, 3, 8);
        // $monitoring['label_user_kppa'] = ['Bagian Kerja Sama','Bagian Ortala','Sesmen','Menteri','Hukum','Sesmen Final','Menteri Final','Bagian Kerja Sama Final'];
        $monitoring['count_deputi'] = $monitoring['data']['deputi']->count();
        return $monitoring;
    }
    public function storeSatisfactionSurvey(Request $request) {
        try {
            DB::beginTransaction();
            $survey = SatisfactionSurvey::create([
                'email' => $request->email,
                'survey' => $request->survey,
                'token' => (string) Str::uuid(),
            ]);

            Mail::to($survey->email)->send(new SurveyKepuasan($survey));

            DB::commit();
            return back()->with('success', 'Berhasil! Silahkan Verifikasi Survey Anda Melalui Email');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', 'Data Gagal di Simpan');
        }
    }
    public function updateSatisfactionSurvey($token) {

        SatisfactionSurvey::where('token', $token)->update([
            'verified' => 1,
        ]);

        return view('pages.hasil-survey');
    }
    public function satisfactionSurvey() {
        return view('pages.survey-kepuasan');
    }
    public function filterFAQ($data) {

        if($data['q'] == null) {
            $faq = FAQ::all();
        } else {
            $faq = FAQ::where('question', $data['q'])->orWhere('answere', $data['q'])->get();
        }

        return $faq;
    }
    public function home()
    {
        $bannerArticle = Article::orderBy('created_at', 'desc')->take(3)->get();
        $article = Article::orderBy('created_at', 'desc')->take(8)->get();
        $testimoni = Testimoni::all();

        return view('pages.home', compact('bannerArticle', 'testimoni', 'article'));
    }
    public function page($slug) {
        $data = Page::where('url', $slug)->firstOrFail();

        return view('pages.page', compact('data'));
    }
    // public function article() {
    //     $article = Article::paginate(5);
    //     $newArticle = Article::orderBy('created_at', 'DESC')->limit(4)->get();

    //     return view('pages.article', [
    //         'article' => $article,
    //         'newArticle' => $newArticle
    //     ]);
    // }
    // public function articleDetail($id) {
    //     $article = Article::findOrFail($id);
    //     $newArticle = Article::orderBy('created_at', 'DESC')->limit(4)->get();

    //     return view('pages.article-detail', [
    //         'article' => $article,
    //         'newArticle' => $newArticle
    //     ]);
    // }
    // public function downloadPdf($id) {
    //     $filePage = FilePage::findOrFail($id);

    //     return response()->download(public_path('storage/'.$filePage->file));
    // }
    // public function submission() {
    //     return view('pages.submission');
    // }
    public function faq(Request $request) {
        if($request->q) {
            $data['q'] = $request->q;
        } else {
            $data['q'] = null;
        }

        $data['data'] = $this->filterFAQ($data);

        return view('pages.faq', compact('data'));
    }
    public function article() {
        $article = Article::paginate(9);

        return view('pages.article', compact('article'));
    }
    public function articleDetail($slug) {
        $article = Article::where('url', $slug)->firstOrFail();

        return view('pages.single-article', compact('article'));
    }
    public function ourContact() {
        return view('pages.our-contact');
    }
    public function submissionProposal() {
        $data['country'] = Country::all();
        $data['type'] = TypeOfCooperation::all();
        $data['agency'] = Agency::all();
        $data['deputi'] = [
            0 => [
                'id' => 3,
                'name' => 'Bidang Partisipasi Masyarakat',
            ],
            1 => [
                'id' => 4,
                'name' => 'Bidang Kesetaraan Gender',
            ],
            2 => [
                'id' => 5,
                'name' => 'Bidang Perlindungan Anak',
            ],
            3 => [
                'id' => 6,
                'name' => 'Bidang Perlindungan Hak Perempuan',
            ],
            4 => [
                'id' => 7,
                'name' => 'Bidang Tumbuh Kembang Anak',
            ],
        ];
        return view('pages.pengajuan-kerjasama', compact('data'));
    }
    public function monitoringResultCooperation(Request $request) {
        if($request->q) {
            $data['q'] = $request->q;
        } else {
            $data['q'] = null;
        }
        $data['data'] = $this->filterMonitoringCooperation($data);

        return view('pages.status-kerjasama', compact('data'));
    }
    public function submissionProposalsStore(StoreSubmissionProposalGuestRequest $request) {
        try {
            // dd(1);
            DB::beginTransaction();
            $proposal = SubmissionProposalGuest::create($request->store());
            foreach ($request->deputi as $key => $value) {
                $proposal->deputi()->create([
                    'role_id' => $value,
                ]);
            }
            $proposal->tracking()->create([]);

            DB::commit();

            $deputi = $request->deputi;
            $users = User::whereHas('roles', function(Builder $query) use ($deputi) {
                $query->whereIn('id', [2,9]);
            })->get();
            if($request->type_guest_id == 1) {
                $path = 'PKSProposalSubmissionCooperationIndex';
            } else {
                $path = 'MOUProposalSubmissionCooperationIndex';
            }
            // dd($request->type_guest_id);
            Notification::send($users, new DeputiNotificationGuest($path));
            Mail::to($request->email)->send(new ResiSubmissionCooperation($proposal));

            return redirect()->route('satisfaction.survey')->with('success', 'Data Berhasil di Simpan! Silahkan Vote Survey Kepuasan Jika Minat');
        } catch (\Throwable $th) {
            DB::rollback();

            return back()->with('error', 'Data Gagal di Simpan');
        }
    }
    public function typeOne($id) {
        try {
            $data = TypeOfCooperationOneDerivative::where('type_of_cooperation_id', $id)->get();

            return response()->json([
                'data' => $data,
                'messages' => 'Data Berhasil di Ambil'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode(),
            ]);
        }
    }
    public function typeTwo($id) {
        try {
            if($id == 1) {
                $data['country'] = Country::where('id', '!=', '102')->get();
            } else {
                $data['country'] = Country::where('id', '102')->get();
                $data['province'] = Province::all();
            }

            $data['type'] = TypeOfCooperationTwoDerivative::where('type_of_cooperation_one_derivative_id', $id)->get();

            return response()->json([
                'data' => $data,
                'messages' => 'Data Berhasil di Ambil'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode(),
            ]);
        }
    }
    public function province($id) {
        try {
            if($id == 102) {
                $data = Province::all();
            } else {
                $data = [];
            }

            return response()->json([
                'data' => $data,
                'messages' => 'Data Berhasil di Ambil'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode(),
            ]);
        }
    }
    public function regency($id) {
        try {
            $data = Regency::where('province_id', $id)->get();

            return response()->json([
                'data' => $data,
                'messages' => 'Data Berhasil di Ambil'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode(),
            ]);
        }
    }
    public function distributionOfCooperation() {
        $data['approval_guest_overseas'] = SubmissionProposalGuest::where('type_of_cooperation_one_derivative_id', 1)->get()->count();
        $data['approval_guest_domestic'] = SubmissionProposalGuest::where('type_of_cooperation_one_derivative_id', 2)->get()->count();
        $data['country'] = Country::all();

        $merge['satker'] = SubmissionProposal::with('typeOfCooperation')->get();
        $merge['guest'] = SubmissionProposalGuest::with('typeOfCooperation')->get();

        $data['data'] = array_merge($merge['satker']->toArray(), $merge['guest']->toArray());

        return view('pages.sebaran-kerjasama', compact('data'));
    }
    public function mapDistributionOfCooperation() {
        $data['satker'] = SubmissionProposal::with('typeOfCooperation')->get();
        $data['guest'] = SubmissionProposalGuest::with('typeOfCooperation')->get();

        $merge = array_merge($data['satker']->toArray(), $data['guest']->toArray());

        return response()->json([
            'data' => $merge,
        ]);
    }
    public function filterMapDistributionOfCooperation(Request $request) {
        $data['satker'] = SubmissionProposal::with('typeOfCooperation')->get();
        $data['guest'] = SubmissionProposalGuest::with('typeOfCooperation')->get();

        $merge = array_merge($data['satker']->toArray(), $data['guest']->toArray());

        $collectMerge = collect($merge);

        if($request->country_id) {
            $filtered = $collectMerge->where('countries_id', $request->country_id);
        }

        if($request->province_id)
        {
            $filtered = $collectMerge->where('province_id', $request->province_id);
        }

        if($request->regency_id)
        {
            $filtered = $collectMerge->where('regency_id', $request->regency_id);
        }

        $result = array_values($filtered->all());

        return response()->json([
            'data' => $result,
        ]);
    }
    public function deputyInformation($slug) {
        $data = DeputiInformation::with('file')->where('url', $slug)->firstOrFail();

        return view('pages.information', compact('data'));
    }
    public function deputyInformationDetail($slug) {
        $data = DeputiInformation::where('url', $slug)->firstOrFail();

        return view('pages.single-information', compact('data'));
    }
    public function storeSuggest(Request $request) {
        try {
            $suggest = Suggestion::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ]);
            return back()->with('success', 'Saran Anda Berhasil di Tambahkan');
        } catch (\Throwable $th) {
            return back()->with('error', 'Saran Anda Gagal ditambahkan');
        }
    }
    public function downloadFileInformation($id) {
        try {
            $deputi = FileDeputiInformation::findOrFail($id);

            $file = $deputi->file;
            return response()->download(storage_path("/app/public/file_deputi_information/".$file));

        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode()
            ]);
        }
    }
}
