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
use App\Http\Requests\StoreSubmissionProposalGuestRequest;
use App\Notifications\DeputiNotificationGuest;
use App\Province;
use App\Regency;
use App\SubmissionProposalGuest;
use App\TypeOfCooperationOneDerivative;
use App\TypeOfCooperationTwoDerivative;
use Illuminate\Support\Facades\Notification;
use DB;
use App\User;
use Illuminate\Database\Eloquent\Builder;

class FrontController extends Controller
{
    public function home()
    {
        $bannerArticle = Article::orderBy('created_at', 'desc')->take(3)->get();
        $article = Article::orderBy('created_at', 'desc')->take(8)->get();
        $testimoni = Testimoni::all();
        // $informasi = CategoryPage::with('pages', 'section', 'pages.files')->findOrFail(1);

        return view('pages.home', compact('bannerArticle', 'testimoni', 'article'));
    }
    public function about($slug) {
        $about = Page::where('url', $slug)->firstOrFail();

        return view('pages.about', compact('about'));
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
    public function faq() {
        $faq = FAQ::all();

        return view('pages.faq', compact('faq'));
    }
    public function article() {
        $article = Article::paginate(9);

        return view('pages.article', compact('article'));
    }
    public function articleDetail($slug) {
        $article = Article::where('url', $slug)->firstOrFail();

        return view('pages.single-article', compact('article'));
    }
    public function submissionProposal() {
        $data['country'] = Country::all();
        $data['type'] = TypeOfCooperation::all();
        $data['agency'] = Agency::all();
        $data['deputi'] = [
            0 => [
                'id' => 2,
                'name' => 'Bidang Partisipasi Masyarakat',
            ],
            1 => [
                'id' => 3,
                'name' => 'Bidang Kesetaraan Gender',
            ],
            2 => [
                'id' => 4,
                'name' => 'Bidang Perlindungan Anak',
            ],
            3 => [
                'id' => 5,
                'name' => 'Bidang Perlindungan Hak Perempuan',
            ],
            4 => [
                'id' => 6,
                'name' => 'Bidang Tumbuh Kembang Anak',
            ],
        ];
        return view('pages.pengajuan-kerjasama', compact('data'));
    }
    public function submissionProposalsStore(StoreSubmissionProposalGuestRequest $request) {
        // dd($request->all());
        try {
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
                $query->whereIn('id', $deputi);
            })->get();
            if($request->type_guest_id == 1) {
                $path = 'PKSProposalSubmissionCooperationIndex';
            } else {
                $path = 'MOUProposalSubmissionCooperationIndex';
            }

            Notification::send($users, new DeputiNotificationGuest($path));

            return back()->with('success', 'Data Berhasil di Simpan');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', 'Data Berhasil di Simpan');
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
}
