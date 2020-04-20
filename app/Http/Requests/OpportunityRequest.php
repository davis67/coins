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
            'opportunity_name' => 'sometimes|required',
            'country' => 'sometimes|required',
            'revenue' => 'nullable',
            'type' => 'sometimes|required',
            'clients_name' => 'sometimes|required',
            'lead_source' => 'sometimes|required',
            'sales_stage' => 'sometimes|required',
            'team_id' => 'nullable',
            'internal_deadline' => 'sometimes|required|date',
            'external_deadline' => 'sometimes|required|date|after:internal_deadline',
            'funder' => 'sometimes|required',
        ];
    }
}
