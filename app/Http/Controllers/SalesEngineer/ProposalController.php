<?php

namespace App\Http\Controllers\SalesEngineer;

use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\IndentedProposal;
use App\Http\Requests\CreateIndentedProposalRequest;
use App\IndentedProposalItem;

class ProposalController extends Controller
{
    //
    public function salesEngineerPostCreateIndentedProposal(Request $request)
    {
        $create_indented_proposal = IndentedProposal::salesEngineerPostCreateIndentedProposal($request);

        return $create_indented_proposal;
    }

    public function salesEngineerIndentProposalView(IndentedProposal $indentedProposal)
    {
        $view_selected_items = IndentedProposal::viewIndentedProposal($indentedProposal);

        return $view_selected_items;
    }

    public function salesEngineerSubmitIndentedProposal(Request $createIndentedProposalRequest)
    {
        foreach($createIndentedProposalRequest->all() as $key => $value) {
            if(strpos($key, 'quantity') !== FALSE) {
                foreach($value as $k => $v) {
                    foreach($v as $x => $s) {
                        $indented_proposal_item = IndentedProposalItem::find($x);
                        $project = Project::find($indented_proposal_item->item_id);

                        var_dump($project->name);
                    }
                }
            }
        }
    }
}
