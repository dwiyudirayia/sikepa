<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\BannerCategory;
use App\Banner;
use File;

class BannerController extends Controller
{
    private $notification;

    public function __construct(NotificationRepositoryInterfaces $notification)
    {
        $this->notification = $notification;
    }

    // public function listCategoryBanner($id) {
    //     try {
    //         $data = Banner::where('category_id', $id)->get();

    //         return response()->json($this->notification->generalSuccess($data));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
    // public function create()
    // {
    //     try {
    //         $data = BannerCategory::all();

    //         return response()->json($this->notification->generalSuccess($data));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
    // public function store(StoreBannerRequest $request)
    // {
    //     try {
    //         Banner::create($request->store());

    //         $data = Banner::where('category_id', $request->category_id)->get();

    //         return response()->json($this->notification->storeSuccess($data));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->storeFailed($th));
    //     }
    // }
    // public function edit($id) {
    //     try {
    //         $data['data'] = Banner::findOrFail($id);
    //         $data['category'] = BannerCategory::all();

    //         return response()->json($this->notification->showSuccess($data));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->showFailed($th));
    //     }
    // }
    // public function destroy($id)
    // {
    //     try {
    //         $data = Banner::findOrFail($id);

    //         File::delete("banner/".$data->image_path);
    //         $data->delete();

    //         $array = Banner::where('category_id', $data->category_id)->get();
    //         return response()->json($this->notification->deleteSuccess($array));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->deleteFailed($th));
    //     }
    // }
    // public function update(UpdateBannerRequest $request, $id)
    // {
    //     try {
    //         Banner::where('id', $id)->update($request->update());

    //         $data = Banner::where('category_id', $request->category_id)->get();
    //         return response()->json($this->notification->updateSuccess($data));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->updateFailed($th));
    //     }
    // }
    
}
