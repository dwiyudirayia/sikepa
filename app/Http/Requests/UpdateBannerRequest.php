<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use File;
use App\Banner;
class UpdateBannerRequest extends FormRequest
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
    public function update()
    {
        $data = Banner::findOrFail($this->id);

        if($this->image_path == $data->image_path)
        {
            return [
                'updated_by' => request()->user()->id,
                'description' => $this->description,
                'category_id' => $this->category_id,
            ];
        } else {
            $image = $this->image_path;
            $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($this->image_path)->save(public_path('banner/').$name);

            File::delete("banner/".$data->image_path);

            return [
                'updated_by' => 1,
                'category_id' => $this->category_id,
                'description' => $this->description,
                'image_path' => $name,
            ];
        }
    }
}
