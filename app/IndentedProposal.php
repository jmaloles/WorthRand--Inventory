<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class IndentedProposal extends Model
{
    //

    public static function adminPostCreateIndentedProposal($request)
    {
        if(trim($request->get('array_id')) == "") {
            return redirect()->back()->with('message', 'You didn\'t select any item');
        } else {
            $array_id = [];
            $item_ids = explode(',', $request->get('array_id'));

            $indented_proposal = new IndentedProposal();
            $indented_proposal->status = "DRAFT";

            if($indented_proposal->save()) {
                foreach($item_ids as $item_id) {
                    $explodedValue = explode('-', $item_id);
                    $id = $explodedValue[0];
                    $table = $explodedValue[1];

                    $indented_proposal_item = new IndentedProposalItem();
                    $indented_proposal_item->indented_proposal_id = $indented_proposal->id;
                    $indented_proposal_item->item_id = $id;
                    $indented_proposal_item->type = $table;
                    $indented_proposal_item->save();
                }
            }

            return redirect()->to('/admin/indented_proposal/'.$indented_proposal->id);
        }
    }

    public static function viewIndentedProposal($indentedProposal)
    {
        $ctr = 0;

        $selectedItems = DB::table('indented_proposal_item')
            ->select('projects.*',
                DB::raw('wr_crm_projects.name as "project_name"'),
                DB::raw('wr_crm_projects.model as "project_md"'),
                DB::raw('wr_crm_projects.serial_number as "project_sn"'),
                DB::raw('wr_crm_projects.part_number as "project_pn"'),
                DB::raw('wr_crm_projects.drawing_number as "project_dn"'),
                DB::raw('wr_crm_projects.tag_number as "project_tn"'),
                DB::raw('wr_crm_projects.material_number as "project_mn"'),
                DB::raw('wr_crm_projects.price as "project_price"'),
            'after_markets.*',
                DB::raw('wr_crm_after_markets.name as "after_market_name"'),
                DB::raw('wr_crm_after_markets.model as "after_market_md"'),
                DB::raw('wr_crm_after_markets.part_number as "after_market_pn"'),
                DB::raw('wr_crm_after_markets.drawing_number as "after_market_dn"'),
                DB::raw('wr_crm_after_markets.material_number as "after_market_mn"'),
                DB::raw('wr_crm_after_markets.material_number as "after_market_sn"'),
                DB::raw('wr_crm_after_markets.tag_number as "after_market_tn"'),
                DB::raw('wr_crm_after_markets.price as "after_market_price"'),
            'indented_proposal_item.*',
                DB::raw('wr_crm_indented_proposal_item.id as "indented_proposal_item_id"'))
            ->leftJoin('projects', function($join) {
                $join->on('indented_proposal_item.item_id', '=', 'projects.id')
                    ->where('indented_proposal_item.type', '=', 'projects');
            })
            ->leftJoin('after_markets', function($join) {
                $join->on('indented_proposal_item.item_id', '=', 'after_markets.id')
                    ->where('indented_proposal_item.type', '=', 'after_markets');
            })
            ->where('indented_proposal_item.indented_proposal_id', '=', $indentedProposal->id)->get();

        return view('proposal.admin.indented.create', compact('selectedItems', 'ctr', 'indentedProposal'));
    }

    public static function saveIndentedProposal($request)
    {
        // dd($request->all());
        $indented_proposal = IndentedProposal::find($request->get('indent_proposal_id'));
        $indented_proposal->to = $request->get('to');
        $indented_proposal->to_address = $request->get('to_address');
        $indented_proposal->sold_to = $request->get('sold_to');
        $indented_proposal->invoice_to = $request->get('invoice');
        $indented_proposal->invoice_to_address = $request->get('invoice_address');
        $indented_proposal->ship_to = $request->get('ship_to');
        $indented_proposal->ship_to_address = $request->get('ship_to_address');
        $indented_proposal->special_instructions = $request->get('special_instruction');
        $indented_proposal->insurance = $request->get('insurance');
        $indented_proposal->ship_via = $request->get('ship_via');
        $indented_proposal->packing = $request->get('packing');
        $indented_proposal->amount = $request->get('amount');
        $indented_proposal->documents = $request->get('documents');
        $indented_proposal->wpcoc = "indented";
        $indented_proposal->order_entry_no = $request->get('purchase_order');
        $indented_proposal->terms_of_payment_1 = $request->get('terms_of_payment_1');
        $indented_proposal->terms_of_payment_address = $request->get('terms_of_payment_address');
        $indented_proposal->bank_detail_name = $request->get('bank_detail_name');
        $indented_proposal->bank_detail_account_no = $request->get('bank_detail_account_number');
        $indented_proposal->bank_detail_swift_code = $request->get('bank_detail_swift_code');
        $indented_proposal->bank_detail_account_name = $request->get('bank_detail_account_name');
        $indented_proposal->bank_detail_address = $request->get('bank_detail_address');
        $indented_proposal->commission_note = $request->get('bank_detail_name');
        $indented_proposal->commission_address = $request->get('bank_detail_account_number');
        $indented_proposal->commission_account_number = $request->get('bank_detail_swift_code');
        $indented_proposal->commission_swift_code = $request->get('bank_detail_account_name');

        if($indented_proposal->save()) {
            foreach($request->all() as $key => $value) {
                if(strpos($key, 'delivery') !== FALSE) {
                    $delivery = explode('-', $key);
                    $indented_proposal_item_id = $delivery[1];

                    $indented_proposal_item = IndentedProposalItem::find($indented_proposal_item_id);
                    $indented_proposal_item->delivery = $value;
                    $indented_proposal_item->save();
                }
            }

            foreach($request->all() as $key => $value) {
                if(strpos($key, 'quantity') !== FALSE) {
                    $delivery = explode('-', $key);
                    $indented_proposal_item_id = $delivery[1];

                    $indented_proposal_item = IndentedProposalItem::find($indented_proposal_item_id);
                    $indented_proposal_item->quantity = $value;
                    $indented_proposal_item->save();
                }
            }

            foreach($request->all() as $key => $value) {
                if(strpos($key, 'price') !== FALSE) {
                    $delivery = explode('-', $key);
                    $indented_proposal_item_id = $delivery[1];

                    $indented_proposal_item = IndentedProposalItem::find($indented_proposal_item_id);
                    $indented_proposal_item->price = $value;
                    $indented_proposal_item->save();
                }
            }

            return redirect()->to('indented_proposals');
        }
    }
}
