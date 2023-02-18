<?php

namespace App\Http\Requests\member;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class update extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [


            "id"=>"required|exists:users,id",
            "name"=>"required",
            "email"=>"required|unique:users,email,".request()->id,
            "gender"=>"required",
            "image_id"=>"exists:temps,id",
            "date_of_birth"=>"required|date",
            "user_id"=>"required|unique:users,user_id,".request()->get("id")

        ];
    }


    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator){

        throw new HttpResponseException(

            response()->json(["data"=>[],"message"=>$validator->errors()->first()],401)

        );



    }


}
