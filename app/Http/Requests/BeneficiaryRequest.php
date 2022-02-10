<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeneficiaryRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'firstName' => 'required',
                    'secondName' => 'required',
                    'thirdName' => 'required',
                    'lastName' => 'required',
                    'gender' => 'required',
                    'id_number' => 'required|unique:beneficiaries',
                    'PhoneNumber' => 'required|numeric',
                    'family_member' => 'required|numeric',
                    'branch_id' => 'required',
                    'project_id' => 'nullable',
                    'city_id' => 'required',
                    'address' => 'required',
                    'maritial' => 'required',
                    'status_id' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'firstName' => 'required',
                    'secondName' => 'required',
                    'thirdName' => 'required',
                    'lastName' => 'required',
                    'gender' => 'required',
                    'id_number' => 'required|unique:beneficiaries,id_number'.$this->route()->beneficiarei->id,
                    'PhoneNumber' => 'required|numeric',
                    'family_member' => 'required|numeric',
                    'branch_id' => 'required',
                    'project_id' => 'required',
                    'city_id' => 'required',
                    'address' => 'required',
                    'maritial' => 'required',
                    'status_id' => 'required',
                ];
            }
            default: break;
        }
    }
}
