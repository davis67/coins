<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpportunityRequest extends FormRequest
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
            'opportunity_name' => 'required',
            'country' => 'required',
            'revenue' => 'nullable',
            'type' => 'required',
            'clients_name' => 'required',
            'lead_source' => 'required',
            'sales_stage' => 'required',
            'internal_deadline' => 'required|date',
            'external_deadline' => 'required|date|after:internal_deadline',
            'funder' => 'required',
        ];
    }
}
