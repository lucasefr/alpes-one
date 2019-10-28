<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarInformationFormRequest extends FormRequest
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
        $x = "";
        return [
            //
            'vehicle_type' 			=> 'max:50',
            'is_new' 				=> 'boolean',
            'is_seminew' 			=> 'boolean',
            'branch' 				=> 'max:50',
            'model' 				=> 'max:50',
            'city' 				    => 'max:100',
            'initial_price' 		=> 'max:100',
            'final_price' 			=> 'max:4',
            'inicial_year' 			=> 'max:4',
            'final_year' 			=> 'max:4',
            'private' 				=> 'boolean',
            'resale' 				=> 'boolean',
        ];
    }

    public function messages()
{
    return [
        'vehicle_type.max'   		=> trans('max_characters'),
        'is_new.boolean' 			=> trans('boolean_validation'),
        'is_seminew.boolean'		=> trans('boolean_validation'),
        'branch.max' 				=> trans('max_characters'),
        'model.max' 				=> trans('max_characters'),
        'city.max' 				    => trans('max_characters'),
        'initial_price.max' 		=> trans('max_characters'),
        'final_price.max' 			=> trans('max_characters'),
        'inicial_year.max' 			=> trans('max_characters'),
        'final_year.max' 			=> trans('max_characters'),
        'private.boolean' 			=> trans('boolean_validation'),
        'resale.boolean' 			=> trans('boolean_validation'),
    ];
}
}
