<?php

namespace App\Http\Requests\PlaceInformation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class GetPlaceInformationRequest
 * 
 * @author Keannu Rim Kristoffer C. Regala <keannu>
 * @since 2023.05.06
 * @version 1.0
 */
class GetPlaceInformationRequest extends FormRequest
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
    public function rules() : array
    {
        return [
            'city' => ['required', 'string', Rule::in('Tokyo', 'Yokohama', 'Kyoto', 'Osaka', 'Sapporo', 'Nagoya')]
        ];
    }
}
