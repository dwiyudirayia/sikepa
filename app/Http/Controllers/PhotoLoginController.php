<?php

namespace App\Http\Controllers;

use App\PhotoLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoLoginController extends Controller
{
    public function index() {
        try {
            $data = PhotoLogin::all();

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
            $data = PhotoLogin::findOrFail($id);

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
            $nameFile = 'photo-login'.'-'.date('Y-m-d').'-'.time().'.'.$extFile;
            $name = $request->image->storeAs(strtotime(now()), $nameFile, 'photo_login');

            $data = PhotoLogin::findOrFail($id);
            Storage::disk('photo_login')->delete($data->image_path);
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
}
