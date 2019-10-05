<?php

namespace App\Http\Controllers;

use App\SectionPage;
use App\CategoryPage;
use App\Http\Requests\StoreCategoryPageRequest;
use App\Http\Requests\UpdateCategoryPageRequest;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;

class CategoryPageController extends Controller
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
            $data = CategoryPage::all();

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
            $data = SectionPage::all();

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
    public function store(StoreCategoryPageRequest $request)
    {
        try {
            CategoryPage::create($request->store());

            $data = CategoryPage::where('section_id', $request->section_id)->get();
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
            $data = CategoryPage::with('articles')->findOrFail($id);

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
            $data['data'] = CategoryPage::with('section')->findOrFail($id);
            $data['section'] = SectionPage::all();

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
    public function update(UpdateCategoryPageRequest $request, $id)
    {
        try {
            CategoryPage::where('id', $id)->update($request->update());
            $data = CategoryPage::where('section_id', $request->section_id)->get();

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
            $data = CategoryPage::findOrFail($id);
            $data->delete();

            $array = CategoryPage::where('section_id', $data->section_id)->get();
            return response()->json($this->notification->deleteSuccess($array));
        } catch (\Throwable $th) {
            return response()->json($this->notification->deleteFailed($th));
        }
    }
    public function listSectionCategory($id)
    {
        try {
            $data = SectionPage::with('categories')->findOrFail($id);
            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function checkNameCategory($name, $section_id)
    {
        $data = CategoryPage::where('name', $name)->where('deleted_at', null)->where('section_id', $section_id)->get();

        if($data->isNotEmpty())
        {
            return response()->json(['isExist'=> true]);
        }

        return response()->json(['isExist' => false]);
    }
    public function checkNameCategoryEdit($name, $id)
    {
        $checkSameValueOnId = CategoryPage::where('id', $id)->where('name', $name)->where('deleted_at', null)->get();
        if($checkSameValueOnId->count() == 1)
        {
            return response()->json(['isExist' => false]);
        }

        $checkAllData = CategoryPage::where('name', $name)->where('deleted_at', null)->get();

        if($checkAllData->count() > 0)
        {
            return response()->json(['isExist' => true]);
        }

        return response()->json(['isExist' => false]);
    }}
