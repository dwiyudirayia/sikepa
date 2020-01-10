<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectionPageRequest;
use App\Http\Requests\UpdateSectionPageRequest;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\SectionPage;

class SectionPageController extends Controller
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
    public function store(StoreSectionPageRequest $request)
    {
        try {
            SectionPage::create($request->store());
            $data = SectionPage::all();
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
            $data = SectionPage::with('pages.category', 'categories')->findOrFail($id);

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
            $data = SectionPage::findOrFail($id);

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
    public function update(UpdateSectionPageRequest $request, $id)
    {
        try {
            SectionPage::where('id', $id)->update($request->update());
            $data = SectionPage::all();

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
            $data = SectionPage::findOrFail($id);
            $data->delete();

            $array = SectionPage::all();
            return response()->json($this->notification->deleteSuccess($array));
        } catch (\Throwable $th) {
            return response()->json($this->notification->deleteFailed($th));
        }
    }
    public function checkNameSection($name)
    {
        $data = SectionPage::where('name', $name)->where('deleted_at', null)->get();

        if ($data->isNotEmpty()) {
            return response()->json(['isExist' => true]);
        }

        return response()->json(['isExist' => false]);
    }
    public function checkNameSectionEdit($name, $id)
    {
        $checkSameValueOnId = SectionPage::where('id', $id)->where('name', $name)->where('deleted_at', null)->get();
        if ($checkSameValueOnId->count() == 1) {
            return response()->json(['isExist' => false]);
        }

        $checkAllData = SectionPage::where('name', $name)->where('deleted_at', null)->get();

        if ($checkAllData->count() > 0) {
            return response()->json(['isExist' => true]);
        }

        return response()->json(['isExist' => false]);
    }
}
