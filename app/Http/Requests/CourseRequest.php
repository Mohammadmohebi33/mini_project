<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
                'title' => ['required' , 'min:4' , "max:60"],
                'status' => ['required'],
                'isCompleted' => ['required'],
                'price' => ['required'],
                'description' => ['required'],
            ];

        if (request()->isMethod('PUT') || request()->isMethod('PATCH')) {
            $rules['image'][] = ['nullable','mimes:jpeg,png,jpg'];
            $rules['video'][] = ['nullable','mimes:mp4,mov,ogg,qt','max:2000000'];
        }else{
            $rules['image'][] = ['required','mimes:jpeg,png,jpg'];
            $rules['video'][] = ['required','mimes:mp4,mov,ogg,qt','max:2000000'];
        }
        return $rules;
    }
}
