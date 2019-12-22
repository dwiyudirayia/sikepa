<?php

namespace App\Http\Requests;

use App\Page;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class UpdatePageRequest extends FormRequest
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
        $data = Page::findOrFail($this->id);

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
            $nameFile = 'page-photo'.'-'.date('Y-m-d').'-'.time().'.'.$extFile;
            $name = $this->image->storeAs(strtotime(now()), $nameFile, 'page_photo');

            Storage::disk('page_photo')->delete($data->image);

            return [
                'updated_by' => auth()->user()->id,
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
