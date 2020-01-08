<?php

namespace App\Http\Controllers;

use App\DeputiInformation;
use App\FileDeputiInformation;
use App\Http\Requests\StoreDeputiInformationRequest;
use App\Http\Requests\UpdateDeputiInformationRequest;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use Illuminate\Support\Facades\Storage;

class DeputiInformationController extends Controller
{
    private $notification;

    public function __construct(NotificationRepositoryInterfaces $notification)
    {
        $this->notification = $notification;
    }

    public function index() {
        try {
            $data = DeputiInformation::paginate(10);

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function store(StoreDeputiInformationRequest $request) {
        try {
            $deputi = DeputiInformation::create($request->store());

            if($request->hasFile('photo_contact')) {
                $extFile = $request->photo_contact->getClientOriginalExtension();
                $nameFile = 'photo-contact'.'-'.date('Y-m-d').'-'.time().'.'.$extFile;
                $pathPhotoContact = $request->photo_contact->storeAs($deputi->id, $nameFile, 'photo_contact_deputi_information');
            }

            if($request->hasFile('photo_information')) {
                $extFile = $request->photo_information->getClientOriginalExtension();
                $nameFile = 'photo-information'.'-'.date('Y-m-d').'-'.time().'.'.$extFile;
                $pathPhotoInformation = $request->photo_information->storeAs($deputi->id, $nameFile, 'photo_information_deputi_information');
            }

            if($request->hasFile('photo_requirement')) {
                $extFile = $request->photo_requirement->getClientOriginalExtension();
                $nameFile = 'photo-requirement'.'-'.date('Y-m-d').'-'.time().'.'.$extFile;
                $pathPhotoRequirement = $request->photo_requirement->storeAs($deputi->id, $nameFile, 'photo_requirement_deputi_information');
            }

            if($request->hasFile('photo_video')) {
                $extFile = $request->photo_video->getClientOriginalExtension();
                $nameFile = 'photo-video'.'-'.date('Y-m-d').'-'.time().'.'.$extFile;
                $pathPhotoVideo = $request->photo_video->storeAs($deputi->id, $nameFile, 'photo_video_deputi_information');
            } else {
                $pathPhotoVideo = $request->photo_video;
            }

            DeputiInformation::where('id', $deputi->id)->update([
                'photo_contact' => $pathPhotoContact ?? "",
                'photo_information' => $pathPhotoInformation ?? "",
                'photo_requirement' => $pathPhotoRequirement ?? "",
                'photo_video' => $pathPhotoVideo ?? "",
            ]);

            if($request->hasFile('file')) {
                foreach ($request->name as $key => $value) {
                    $extFile = $request->file[$key]->getClientOriginalExtension();
                    $nameFile = 'photo-video'.'-'.date('Y-m-d').'-'.time().'.'.$extFile;
                    $path = $request->file[$key]->storeAs($deputi->id, $nameFile, 'file_deputi_information');

                    $deputi->file()->create([
                        'name' => $value,
                        'file' => $path,
                    ]);
                }
            }

            $data = DeputiInformation::all();
            return response()->json($this->notification->storeSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->storeFailed($th));
        }
    }
    public function destroy($id) {
        try {
            $deputi = DeputiInformation::with('file')->findOrFail($id);

            Storage::disk('photo_contact_deputi_information')->delete($deputi->photo_contact);
            Storage::disk('photo_information_deputi_information')->delete($deputi->photo_information);
            Storage::disk('photo_requirement_deputi_information')->delete($deputi->photo_requirement);
            Storage::disk('photo_video_deputi_information')->delete($deputi->photo_video);

            foreach ($deputi->file as $key => $value) {
                Storage::disk('file_deputi_information')->delete($value->file);
            }

            $deputi->delete();

            $data = DeputiInformation::all();

            return response()->json($this->notification->deleteSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->deleteFailed($th));
        }
    }
    public function edit($id) {
        try {
            $data = DeputiInformation::with('file')->findOrFail($id);

            return response()->json($this->notification->showSuccess($data));
        } catch(\Throwable $th) {
            return response()->json($this->notification->showFailed($data));
        }
    }
    public function destroyFile($id) {
        try {
            $data = FileDeputiInformation::findOrFail($id);
            Storage::disk('file_deputi_information')->delete($data->file);

            $data->delete();

            return response()->json([
                'messages' => 'File Berhasil di Hapus',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'File Gagal di Hapus',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function storeFile(Request $request) {
        try {
            if($request->hasFile('file')) {
                $extFile = $request->file->getClientOriginalExtension();
                $nameFile = 'file'.'-'.date('Y-m-d').'-'.time().'.'.$extFile;
                $path = $request->file->storeAs($request->id, $nameFile, 'file_deputi_information');

                FileDeputiInformation::create([
                    'deputi_information_id' => $request->id,
                    'name' => $request->name,
                    'file' => $path,
                ]);
            } else {
                FileDeputiInformation::create([
                    'deputi_information_id' => $request->id,
                    'name' => $request->name,
                ]);
            }

            return response()->json([
                'messages' => 'File Berhasil di Tambahkan',
                'status' => 200,
                'data' => FileDeputiInformation::where('deputi_information_id', $request->id)->get(),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Tambah File Gagal',
                'status' => $th->getCode(),
                'data' => FileDeputiInformation::where('deputi_information_id', $request->id)->get(),
            ]);
        }
    }
    public function update(UpdateDeputiInformationRequest $request, $id) {
        try {
            $recentDeputi = DeputiInformation::findOrFail($id);

            if($request->hasFile('photo_contact')) {
                $extFile = $request->photo_contact->getClientOriginalExtension();
                $nameFile = 'photo-contact'.'-'.date('Y-m-d').'-'.time().'.'.$extFile;
                $pathPhotoContact = $request->photo_contact->storeAs($id, $nameFile, 'photo_contact_deputi_information');

                Storage::disk('photo_contact_deputi_information')->delete($recentDeputi->photo_contact);
            } else {
                $pathPhotoContact = $request->photo_contact;
            }

            if($request->hasFile('photo_information')) {
                $extFile = $request->photo_information->getClientOriginalExtension();
                $nameFile = 'photo-information'.'-'.date('Y-m-d').'-'.time().'.'.$extFile;
                $pathPhotoInformation = $request->photo_information->storeAs($id, $nameFile, 'photo_information_deputi_information');

                Storage::disk('photo_information_deputi_information')->delete($recentDeputi->photo_information);
            } else {
                $pathPhotoInformation = $request->photo_information;
            }

            if($request->hasFile('photo_requirement')) {
                $extFile = $request->photo_requirement->getClientOriginalExtension();
                $nameFile = 'photo-requirement'.'-'.date('Y-m-d').'-'.time().'.'.$extFile;
                $pathPhotoRequirement = $request->photo_requirement->storeAs($id, $nameFile, 'photo_requirement_deputi_information');

                Storage::disk('photo_requirement_deputi_information')->delete($recentDeputi->photo_requirement);
            } else {
                $pathPhotoRequirement = $request->photo_requirement;
            }
            $deputi = DeputiInformation::where('id', $id)->update($request->update());

            if($request->hasFile('photo_video')) {
                $extFile = $request->photo_video->getClientOriginalExtension();
                $nameFile = 'photo-video'.'-'.date('Y-m-d').'-'.time().'.'.$extFile;
                $pathPhotoVideo = $request->photo_video->storeAs($id, $nameFile, 'photo_video_deputi_information');

                Storage::disk('photo_video_deputi_information')->delete($recentDeputi->photo_video);
            } else {
                $pathPhotoVideo = $request->photo_video;
            }

            DeputiInformation::where('id', $id)->update([
                'photo_contact' => $pathPhotoContact ?? "",
                'photo_information' => $pathPhotoInformation ?? "",
                'photo_requirement' => $pathPhotoRequirement ?? "",
                'photo_video' => $pathPhotoVideo ?? "",
            ]);

            return response()->json([
                'messages' => 'Data Berhasil di Perbaharui',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Data Gagal Diperbaharui',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function downloadFileDeputiInformation($id) {
        try {
            $fileDeputi = FileDeputiInformation::findOrFail($id);

            $file = $fileDeputi->file;
            return response()->download(storage_path("/app/public/file_deputi_information/".$file));

        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download FIle Gagal',
                'status' => $th->getCode()
            ]);
        }
    }
}
