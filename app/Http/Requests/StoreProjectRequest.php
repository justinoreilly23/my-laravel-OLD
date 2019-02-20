<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public $rules
        = [
            'title'       => ['required', 'min:3', 'max:32'],
            'description' => ['required', 'min:3', 'max:1024'],
        ];

    public function all($keys = null)
    {
        $attributes = parent::all();

        $attributes = $this->formatInput($attributes);

        return $attributes;
    }

    protected function formatInput($input)
    {

        if ( ! isset($input['owner_id']))
        {
            $input['owner_id'] = auth()->id();
        }

        return $input;
    }

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
        $rules = $this->rules;

        return $rules;
    }
}
