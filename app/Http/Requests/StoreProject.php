<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProject extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // PARA EL UNIQUE
        // METODO 1
        // $id = null;

        // if ($this->category) {
        //     $id = $this->category->id;
        // }



        // METODO 2
        // if ($this->category) {
        //     return [
        //         'name' => 'required|alpha_num_spaces|unique:categories,name,' . $this->category->id
        //     ];
        // }

        // return [
        //     'name' => 'required|alpha_num_spaces|unique:categories'
        // ];


        // METODO 3
        // switch ($this->method()) {
        //     case 'POST':
        //         return [
        //             'name' => 'required|unique:categories,name',
        //         ];
        //         break;

        //     case 'PATCH':
        //     case 'PUT':
        //         return [
        //             'name' => 'required|unique:categories,name,' . $this->category->id,
        //         ];
        //         break;
        // }
        return [
            //
        ];
    }
    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->somethingElseIsInvalid()) {
                $validator->errors()->add('field', 'Something is wrong with this field!');
            }
        });
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'body.required' => 'A message is required',
        ];
    }
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'email' => 'email address',
        ];
    }
}
