<?php

namespace App\Http\Controllers;

use App\BannerLandingPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class BannerLandingPageController extends Controller
{
    public function index() {
        try {
            $data = BannerLandingPage::all();

            return response()->json([
                'data' => $data,
                'messages' => 'Data Berhasil di Ambil',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Data Gagal di Ambil',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function edit($id) {
        try {
            $data = BannerLandingPage::findOrFail($id);

            return response()->json([
                'data' => $data,
                'messages' => 'Data Berhasil di Ambil',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Data Gagal di Ambil',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $extFile = $request->image->getClientOriginalExtension();
            $nameFile = 'banner-article'.'-'.date('Y-m-d').'-'.time().'.'.$extFile;
            $name = $request->image->storeAs(strtotime(now()), $nameFile, 'banner_article');


            $data = BannerLandingPage::findOrFail($id);
            Storage::disk('banner_article')->delete($data->image_path);
            $data->image_path = $name;
            $data->save();

            return response()->json([
                'messages' => 'Data Berhasil di Update',
                'status' => 200
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => $th->getCode(),
                'messages' => 'Data Berhasil di Update'
            ]);
        }
    }
    public function changeConfig(Request $request) {
        try {
            $content = "<?php \nreturn [ \n";
            $content .= "\t'config'"." => [ \n";
            $content .= "\t\t'banner' =>"."$request->status,\n";
            $content .= "\t], \n";
            $content .= "] \n?>";

            $file = config_path().'/banner.php';
            file_put_contents($file, $content);
        } catch (\Exception $e) {
        }
    }
    public function config() {
        $data = config('banner.config');

        return response()->json($data);
    }
}
