<?php

namespace App\Http\Controllers;

use App\SectionPage;
use App\CategoryPage;
use App\FilePage;
use App\Page;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use File;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    private $notification;

    public function __construct(NotificationRepositoryInterfaces $notification)
    {
        $this->notification = $notification;
    }
    public function listCategoryPage($id)
    {
        try {
            $data = Page::where('category_id', $id)->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Page::all();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $data['section'] = SectionPage::all();
            $data['category'] = CategoryPage::all();

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
    public function store(StorePageRequest $request)
    {
        try {
            $page = Page::create($request->store());
            if($request->hasFile('file')) {
                foreach ($request->file as $key => $value) {
                    $extention = $value->getClientOriginalExtension();
                    $fileName = 'file-page'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
                    $path = $value->storeAs($page->id, $fileName, 'file_page');
                    $page->files()->create([
                        'created_by' => auth()->user()->id,
                        'page_id' => $page->id,
                        'name' => $request->name[$key] ?? "",
                        'file' => $path,
                    ]);
                }
            }
            $data = Page::where('category_id', $request->category_id)->get();
            return response()->json($this->notification->storeSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->storeFailed($th));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = Page::with('category', 'section')->findOrFail($id);

            return response()->json($this->notification->showSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->showFailed($th));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data['data'] = Page::findOrFail($id);
            $data['section'] = SectionPage::all();
            $data['category'] = CategoryPage::all();
            $data['file_page'] = FilePage::where('page_id', $id)->get();

            return response()->json($this->notification->showSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->showFailed($th));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, $id)
    {
        try {
            Page::where('id', $id)->update($request->update());

            $data = Page::where('category_id', $request->category_id)->get();
            return response()->json($this->notification->updateSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->updateFailed($th));
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
            $data = Page::with('files')->findOrFail($id);

            foreach($data->files as $key => $value) {
                Storage::disk('file_page')->delete($value);
            }

            File::delete("page/".$data->image);

            $data->delete();


            $array = Page::where('category_id', $data->category_id)->get();
            return response()->json($this->notification->deleteSuccess($array));
        } catch (\Throwable $th) {
            return response()->json($this->notification->deleteFailed($th));
        }
    }
    public function changePublishStatus($id)
    {
        try {
            $data = Page::findOrFail($id);
            $data->publish = !$data->publish;
            $data->save();

            $array = Page::where('category_id', $data->category_id)->get();
            return response()->json($this->notification->updateSuccess($array));
        } catch (\Throwable $th) {
            return response()->json($this->notification->updateFailed($th));
        }
    }
    public function changeApprovedStatus($id)
    {
        try {
            $data = Page::findOrFail($id);
            $data->approved = !$data->approved;
            $data->save();

            $array = Page::where('category_id', $data->category_id)->get();
            return response()->json($this->notification->updateSuccess($array));
        } catch (\Throwable $th) {
            return response()->json($this->notification->updateFailed($th));
        }
    }
}
