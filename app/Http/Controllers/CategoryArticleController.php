<?php

namespace App\Http\Controllers;

use App\CategoryArticle;
use App\SectionArticle;
use App\Http\Requests\StoreCategoryArticleRequest;
use App\Http\Requests\UpdateCategoryArticleRequest;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;

class CategoryArticleController extends Controller
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
            $data = CategoryArticle::all();

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
            $data = SectionArticle::all();

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
    public function store(StoreCategoryArticleRequest $request)
    {
        try {
            CategoryArticle::create($request->store());

            $data = CategoryArticle::where('section_id', $request->section_id)->get();
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
            $data = CategoryArticle::with('articles')->findOrFail($id);

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
            $data['data'] = CategoryArticle::with('section')->findOrFail($id);
            $data['section'] = SectionArticle::all();

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
    public function update(UpdateCategoryArticleRequest $request, $id)
    {
        try {
            CategoryArticle::where('id', $id)->update($request->update());
            $data = CategoryArticle::where('section_id', $request->section_id)->get();

            return response()->json($this->notification->updateSuccess($data));
        } catch (\Throwable $th) {

            return response()->json($this->notification->updateSuccess($th));
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
            $data = CategoryArticle::findOrFail($id);
            $data->delete();

            $array = CategoryArticle::where('section_id', $data->section_id)->get();
            return response()->json($this->notification->deleteSuccess($array));
        } catch (\Throwable $th) {
            return response()->json($this->notification->deleteFailed($th));
        }
    }
    public function listSectionCategory($id)
    {
        try {
            $data = SectionArticle::with('categories')->findOrFail($id);
            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function checkNameCategory($name, $section_id)
    {
        $data = CategoryArticle::where('name', $name)->where('deleted_at', null)->where('section_id', $section_id)->get();

        if($data->isNotEmpty())
        {
            return response()->json(['isExist'=> true]);
        }

        return response()->json(['isExist' => false]);
    }
    public function checkNameCategoryEdit($name, $id)
    {
        $checkSameValueOnId = CategoryArticle::where('id', $id)->where('name', $name)->where('deleted_at', null)->get();
        if($checkSameValueOnId->count() == 1)
        {
            return response()->json(['isExist' => false]);
        }

        $checkAllData = CategoryArticle::where('name', $name)->where('deleted_at', null)->get();

        if($checkAllData->count() > 0)
        {
            return response()->json(['isExist' => true]);
        }

        return response()->json(['isExist' => false]);
    }
}
