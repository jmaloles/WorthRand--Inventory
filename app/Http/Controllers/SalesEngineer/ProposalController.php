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

    public function salesEngineerSubmitIndentedProposal(Request $request)
    {
       $saveIndentedProposal = IndentedProposal::saveIndentedProposal($request);

       return $saveIndentedProposal;
    }

    public function salesEngineerIndentProposalView(IndentedProposal $indentedProposal)
    {
        $view_selected_items = IndentedProposal::showSentIndentedProposal($indentedProposal);

        return $view_selected_items;
    }
}
