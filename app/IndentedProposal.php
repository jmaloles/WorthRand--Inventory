<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Input;
use Storage;
use File;



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
                DB::raw('wr_crm_indented_proposal_item.id as "indented_proposal_item_id"'),
                DB::raw('wr_crm_indented_proposal_item.quantity as "indented_proposal_item_quantity"'),
            DB::raw('wr_crm_indented_proposal_item.delivery as "indented_proposal_item_delivery"'),
                DB::raw('wr_crm_indented_proposal_item.price as "indented_proposal_item_price"'))
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
        $indented_proposal = IndentedProposal::find($request->get('indent_proposal_id'));
        $indented_proposal->purchase_order = $request->get('purchase_order');
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
        $indented_proposal->status = "SENT";

        if($indented_proposal->save()) {
            foreach($request->all() as $key => $value) {

                if(strpos($key, 'delivery') !== FALSE) {
                    $delivery = explode('-', $key);
                    $indented_proposal_item_id = $delivery[1];

                    $indented_proposal_item = IndentedProposalItem::find($indented_proposal_item_id);
                    $indented_proposal_item->delivery = $value;
                    $indented_proposal_item->save();
                }

                if(strpos($key, 'quantity') !== FALSE) {
                    $delivery = explode('-', $key);
                    $indented_proposal_item_id = $delivery[1];

                    $indented_proposal_item = IndentedProposalItem::find($indented_proposal_item_id);
                    $indented_proposal_item->quantity = $value;
                    $indented_proposal_item->save();
                }

                if(strpos($key, 'price') !== FALSE) {
                    $delivery = explode('-', $key);
                    $indented_proposal_item_id = $delivery[1];

                    $indented_proposal_item = IndentedProposalItem::find($indented_proposal_item_id);
                    $indented_proposal_item->price = $value;
                    $indented_proposal_item->save();
                }
            }

            $indented_proposal_items = IndentedProposalItem::whereIndentedProposalId($indented_proposal->id)->get();

            foreach($indented_proposal_items as $indented_proposal_item) {
                if($indented_proposal_item->type == "projects") {
                    $project_pricing_history = new ProjectPricingHistory();
                    $project_pricing_history->project_id = $indented_proposal_item->item_id;
                    $project_pricing_history->price = $indented_proposal_item->price;
                    $project_pricing_history->pricing_date = date('Y');
                    $project_pricing_history->terms = $indented_proposal->terms_of_payment_1;
                    $project_pricing_history->delivery = "TEST DELIVERY";
                    $project_pricing_history->fpd_reference = "TEST_FPD_REFERENCE";
                    $project_pricing_history->wpc_reference = "TEST_WPC_REFERENCE";
                    $project_pricing_history->po_number = $indented_proposal->purchase_order;

                    if($project_pricing_history->save()) {
                        $project = Project::find($project_pricing_history->project_id);
                        $project->price = $project_pricing_history->price;
                        $project->save();
                    }
                } else if($indented_proposal_item->type == "after_markets") {
                    $after_marketpricing_history = new AfterMarketPricingHistory();
                    $after_marketpricing_history->project_id = $indented_proposal_item->item_id;
                    $after_marketpricing_history->price = $indented_proposal_item->price;
                    $after_marketpricing_history->pricing_date = date('Y');
                    $after_marketpricing_history->terms = $indented_proposal->terms_of_payment_1;
                    $after_marketpricing_history->delivery = "TEST DELIVERY";
                    $after_marketpricing_history->fpd_reference = "TEST_FPD_REFERENCE";
                    $after_marketpricing_history->wpc_reference = "TEST_WPC_REFERENCE";
                    $after_marketpricing_history->po_number = $indented_proposal->pruchase_number;
                    $after_marketpricing_history->save();
                }
            }

            /*$file = Input::file('fileField');
            $extension = $file->getClientOriginalExtension();
            Storage::disk('ftp')->put($file->getFilename().'.'.$extension,  File::get($file));*/
            return redirect()->to('/admin/indented_proposal/'.$indented_proposal->id.'/sent');
        }
    }

    public static function showSentIndentedProposal($indented_proposal)
    {
        if($indented_proposal->status == "SENT") {
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
                    DB::raw('wr_crm_indented_proposal_item.id as "indented_proposal_item_id"'),
                    DB::raw('wr_crm_indented_proposal_item.quantity as "indented_proposal_item_quantity"'),
                    DB::raw('wr_crm_indented_proposal_item.delivery as "indented_proposal_item_delivery"'),
                    DB::raw('wr_crm_indented_proposal_item.price as "indented_proposal_item_price"'))
                ->leftJoin('projects', function($join) {
                    $join->on('indented_proposal_item.item_id', '=', 'projects.id')
                        ->where('indented_proposal_item.type', '=', 'projects');
                })
                ->leftJoin('after_markets', function($join) {
                    $join->on('indented_proposal_item.item_id', '=', 'after_markets.id')
                        ->where('indented_proposal_item.type', '=', 'after_markets');
                })
                ->where('indented_proposal_item.indented_proposal_id', '=', $indented_proposal->id)->get();

            return view('proposal.admin.indented.sent', compact('indented_proposal', 'selectedItems', 'ctr'));
        }

        \View::composer('errors.400', function($view) use ($indented_proposal)
        {
            $view->with('indented_proposal_id', $indented_proposal->id);
        });

        abort('400', $indented_proposal);
    }
}
