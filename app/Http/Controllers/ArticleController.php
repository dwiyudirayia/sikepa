<?php

namespace App\Http\Controllers;

use App\SectionArticle;
use App\CategoryArticle;
use App\Article;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use File;

class ArticleController extends Controller
{
    private $notification;

    public function __construct(NotificationRepositoryInterfaces $notification)
    {
        $this->notification = $notification;
    }
    public function listCategoryArticle($id)
    {
        try {
            $data = Article::where('category_id', $id)->get();

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
            $data = Article::all();

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
            $data['section'] = SectionArticle::all();
            $data['category'] = CategoryArticle::all();

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
    public function store(StoreArticleRequest $request)
    {
        try {
            Article::create($request->store());

            $data = Article::where('category_id', $request->category_id)->get();

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
            $data = Article::with('category', 'section')->findOrFail($id);

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
            $data['data'] = Article::findOrFail($id);
            $data['section'] = SectionArticle::all();
            $data['category'] = CategoryArticle::all();

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
    public function update(UpdateArticleRequest $request, $id)
    {
        try {
            Article::where('id', $id)->update($request->update());

            $data = Article::where('category_id', $request->category_id)->get();
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
            $data = Article::findOrFail($id);

            File::delete("article/".$data->image);
            $data->delete();

            $array = Article::where('category_id', $data->category_id)->get();
            return response()->json($this->notification->deleteSuccess($array));
        } catch (\Throwable $th) {
            return response()->json($this->notification->deleteFailed($th));
        }
    }
    public function changePublishStatus($id)
    {
        try {
            $data = Article::findOrFail($id);
            $data->publish = !$data->publish;
            $data->save();

            $array = Article::where('category_id', $data->category_id)->get();
            return response()->json($this->notification->updateSuccess($array));
        } catch (\Throwable $th) {
            return response()->json($this->notification->updateFailed($th));
        }
    }
    public function changeApprovedStatus($id)
    {
        try {
            $data = Article::findOrFail($id);
            $data->approved = !$data->approved;
            $data->save();

            $array = Article::where('category_id', $data->category_id)->get();
            return response()->json($this->notification->updateSuccess($array));
        } catch (\Throwable $th) {
            return response()->json($this->notification->updateFailed($th));
        }
    }
    public function categoryArticle($id) {
        try {
            $data = CategoryArticle::where('section_id', $id)->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
}
