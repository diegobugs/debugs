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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = null;

        if ($this->project) {
            $id = $this->project->id;
        }

        return [
            'name' => 'required|string|max:255',
            'skey' => 'required|string|max:6|unique:categories,name,' . $id,
            'description' => 'nullable|string'
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
            'name' => 'project\'s name',
            'skey' => 'project\'s Shortcut key',
            'description' => 'Description',
        ];
    }
}
