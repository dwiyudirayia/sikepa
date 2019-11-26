<?php

namespace App\Http\Controllers;

use App\Testimoni;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\Http\Requests\StoreTestimoniRequest;
use File;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    private $notification;

    public function __construct(NotificationRepositoryInterfaces $notification)
    {
        $this->notification = $notification;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $getPermissions = auth()->user()->getPermissionNames();
            $data = Testimoni::all();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimoniRequest $request)
    {
        try {
            Testimoni::create($request->store());

            $data = Testimoni::all();

            return response()->json($this->notification->storeSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->storeFailed($th));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = Testimoni::findOrFail($id);
            File::delete('testimoni/'.$data->photo);
            $data->delete();

            $currentData = Testimoni::all();
            return response()->json($this->notification->deleteSuccess($currentData));
        } catch (\Throwable $th) {
            return response()->json($this->notification->deleteFailed($th));
        }
    }
    public function edit($id) {
        try {
            $data = Testimoni::findOrFail($id);

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function update(Request $request, $id) {
        try {
            $check = Testimoni::findOrFail($id);
            if($request->photo == "" || $check->photo == $request->photo ) {

                Testimoni::where('id', $id)->update([
                    'testimoni' => $request->testimoni,
                    'name' => $request->name,
                    'job' => $request->job,
                ]);
            } else {
                $photo = $request->photo;
                $name = time().'.' . explode('/', explode(':', substr($photo, 0, strpos($photo, ';')))[1])[1];
                \Image::make($request->photo)->save(public_path('testimoni/').$name);

                $find = Testimoni::findOrFail($id);
                File::delete('testimoni/'.$find->photo);

                Testimoni::where('id', $id)->update([
                    'testimoni' => $request->testimoni,
                    'name' => $request->name,
                    'job' => $request->job,
                    'photo' => $name
                ]);
            }

            $data = Testimoni::all();
            return response()->json($this->notification->updateSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->updateFailed($th));
        }
    }
    public function changeStatus($id) {
        try {
            $data = Testimoni::findOrFail($id);
            $data->active = !$data->active;
            $data->save();

            $currentData = Testimoni::all();
            return response()->json($this->notification->deleteSuccess($currentData));
        } catch (\Throwable $th) {
            return response()->json($this->notification->deleteFailed($th));
        }
    }
}
