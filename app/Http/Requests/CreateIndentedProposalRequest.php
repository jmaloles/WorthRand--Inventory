<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class CreateIndentedProposalRequest extends Request
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
            'purchase_order'    => 'required|unique:indented_proposals,purchase_order',
            'customer_id'       => 'required',
            'branch_id'         => 'required',
            'invoice'           => 'required',
            'invoice_address'   => 'required',
            'ship_to'           => 'required',
            'ship_to_address'   => 'required',
            'quantity.*'        => 'required',
            'price.*'           => 'required',
            'delivery.*'        => 'required',
            'special_instruction' => 'required',
            'ship_via'          => 'required',
            'amount'            => 'required',
            'packing'           => 'required',
            'documents'         => 'required',
            'insurance'         => 'required',
            'terms_of_payment_1' => 'required',
            'terms_of_payment_address' => 'required',
            'bank_detail_owner' => 'required',
            'bank_detail_address' => 'required',
            'bank_detail_account_number' => 'required',
            'bank_detail_swift_code' => 'required',
            'bank_detail_account_name' => 'required',
            'commission_note'   => 'required',
            'commission_address' => 'required',
            'commission_account_number' => 'required',
            'commission_swift_code' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'customer_id.required' => 'The customer you entered is not in our database. Please provided legal customer',
            'branch_id. required' => 'The branch you entered is not in our database. Please provided legal branch'
        ];
    }
}
