<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
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
            'description' => 'required',
        ];
    }
    public function store()
    {
        if($this->image_path != "")
        {
            $image = $this->image_path;
            $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($this->image_path)->save(public_path('banner/').$name);

            return [
                'created_by' => auth()->user()->id,
                'category_id' => $this->category_id,
                'description' => $this->description,
                'image_path' => $name,
            ];
        } else {
            return [
                'created_by' => auth()->user()->id,
                'description' => $this->description,
                'category_id' => $this->category_id,
            ];
        }
    }
}
