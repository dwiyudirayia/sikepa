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
use App\Mail\NomorResi;
use App\Mail\SurveyKepuasan;
use App\Notifications\DeputiNotificationGuest;
use App\Province;
use App\Regency;
use App\SatisfactionSurvey;
use App\SubmissionProposal;
use App\SubmissionProposalGuest;
use App\SubmissionType;
use App\Suggestion;
use App\TypeOfCooperationOneDerivative;
use App\TypeOfCooperationTwoDerivative;
use Illuminate\Support\Facades\Notification;
use DB;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
use Validator;
class FrontController extends Controller
{
    public function filterMonitoringCooperation($data) {
        if($data['q'] != null) {
            $monitoring['data'] = SubmissionProposalGuest::with('country','province','regency','agencies','typeOfCooperation','typeOfCooperationOne','typeOfCooperationTwo','deputi.role','tracking.role','nomor','law')->where('mailing_number', $data['q'])->first();
            if($monitoring['data'] != null) {
                $monitoring['biro'] = $monitoring['data']['tracking'][0];
                $data = array_values($monitoring['data']['tracking']->toArray());
                $monitoring['user_kppa'] = array_splice($data, 1, 8);
                $monitoring['count_deputi'] = $monitoring['data']['deputi']->count();
                return $monitoring;
            } else {
                return true;
            }
        } else {
            return true;
        }
        dd($monitoring['biro']);
    }
    public function storeSatisfactionSurvey(Request $request) {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:satisfaction_survey|max:255',
                'survey' => 'required',
            ],[
                'email.required' => 'Email Harus di Isi',
                'email.unique' => 'Email Sudah Terdaftar Sebelumnya',
            ]);
            if ($validator->fails()) {
                return back()
                        ->withErrors($validator)
                        ->withInput()
                        ->with('error', 'Data Gagal di Simpan');
                Cookie::queue(Cookie::forget('email'));
            }
            $survey = SatisfactionSurvey::create([
                'email' => $request->email,
                'survey' => $request->survey,
                'token' => (string) Str::uuid(),
            ]);

            Mail::to($survey->email)->send(new SurveyKepuasan($survey));

            DB::commit();
            return redirect()->route('home')->with('success', 'Terimakasih atas permohonan kerja sama yang Anda ajukan. Permohonan Anda akan segera kami tindak lanjuti. Nomor Registrasi Permohonan telah berhasil kami kirim ke email Anda. Untuk memantau dan mengetahui status permohonan Anda, silahkan mengunjungi website SIKEPA.');
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
        $bannerArticle = Article::orderBy('created_at', 'desc')->where('approved', 1)->where('publish', 1)->take(3)->get();
        $article = Article::orderBy('created_at', 'desc')->where('approved', 1)->where('publish', 1)->take(8)->get();
        $testimoni = Testimoni::where('active', 1)->get();
        dd($bannerArticle, $article, $testimoni);

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
        $article = Article::where('approved', 1)->where('publish', 1)->paginate(9);

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
        $data['type'] = SubmissionType::all();
        $data['country'] = Country::all();
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
            DB::beginTransaction();
            $proposal = SubmissionProposalGuest::create($request->store());

            foreach ($request->deputi as $key => $value) {
                $proposal->deputi()->create([
                    'role_id' => $value,
                ]);
            }

            $userKPPA = [2, 9, 10, 11, 12, 13, 14, 15, 16];
            foreach ($userKPPA as $key => $value) {
                $proposal->tracking()->create([
                    'role_id' => $value,
                ]);
            }

            Cookie::queue(Cookie::make('email', $request->email));

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
            Notification::send($users, new DeputiNotificationGuest($path));
            Mail::to($request->email)->send(new NomorResi($proposal));

            return redirect()->route('satisfaction.survey')->with('success', 'Data Berhasil di Simpan! Silahkan Vote Survey Kepuasan Jika Minat');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            DB::rollback();

            return back()->with('error', 'Data Gagal di Simpan');
        }
    }
    public function type($id) {
        try {
            $data = TypeOfCooperation::where('submission_type_id', $id)->get();

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
            if($id == 1 || $id == 2) {
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
        $data['approval_guest_overseas_guest'] = SubmissionProposalGuest::where('countries_id', '!=', 102)->get()->count();
        $data['approval_guest_domestic_guest'] = SubmissionProposalGuest::where('countries_id', 102)->get()->count();
        $data['approval_guest_overseas'] = SubmissionProposal::where('countries_id', '!=', '102')->get()->count();
        $data['approval_guest_domestic'] = SubmissionProposal::where('countries_id', 102)->get()->count();
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
    public function downloadFileCooperation($id) {
        try {
            $data = SubmissionProposalGuest::with('law')->findOrFail($id);
            // dd($data);
            $file = $data->law->draft;
            return response()->download(storage_path("/app/public/law_draft_guest/".$file));

        } catch (\Throwable $th) {
            dd($th);
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode()
            ]);
        }
    }
}
