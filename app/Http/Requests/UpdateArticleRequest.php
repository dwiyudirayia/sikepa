<?php

namespace App\Http\Requests;

use App\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
        ];
    }
    public function update()
    {
        $data = Article::findOrFail($this->id);

        if($this->image == $data->image)
        {
            return [
                'updated_by' => auth()->user()->id,
                'section_id' => (int)$this->section_id,
                'category_id' => (int)$this->category_id,
                'title' => $this->title,
                'url' => Str::slug($this->title,"-"),
                'short_content' => $this['short_content'],
                'content' => $this['content'],
                'seo_title' => $this->seo_title,
                'seo_meta_key' => $this->seo_meta_key,
                'seo_meta_desc' => $this->seo_meta_desc,
                'publish' => (int)$this->publish,
                'approved' => (int)$this->approved,
            ];
        } else {
            $extFile = $this->image->getClientOriginalExtension();
            $nameFile = 'article-photo'.'-'.date('Y-m-d').'-'.time().'.'.$extFile;
            $name = $this->image->storeAs(strtotime(now()), $nameFile, 'article_photo');

            Storage::disk('article_photo')->delete($data->image);

            return [
                'updated_by' => 1,
                'section_id' => (int)$this->section_id,
                'category_id' => (int)$this->category_id,
                'title' => $this->title,
                'url' => Str::slug($this->title,"-"),
                'short_content' => $this['short_content'],
                'content' => $this['content'],
                'image' => $name,
                'seo_title' => $this->seo_title,
                'seo_meta_key' => $this->seo_meta_key,
                'seo_meta_desc' => $this->seo_meta_desc,
                'publish' => (int)$this->publish,
                'approved' => (int)$this->approved,
            ];
        }
    }
}
