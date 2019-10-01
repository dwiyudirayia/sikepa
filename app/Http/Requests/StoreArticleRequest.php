<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreArticleRequest extends FormRequest
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
            // 'title' => 'required',
        ];
    }
    public function store()
    {
        return [
            'created_by' => 1,
            'section_id' => (int)$this->section_id,
            'category_id' => (int)$this->category_id,
            'title' => $this->title,
            'url' => Str::slug($this->title,"-"),
            'content' => $this['content'],
            'image' => $this->image,
            'seo_title' => $this->seo_title,
            'seo_meta_key' => $this->seo_meta_key,
            'seo_meta_desc' => $this->seo_meta_desc,
            'publish' => (int)$this->publish,
            'approved' => (int)$this->approved,
        ];
    }
}
