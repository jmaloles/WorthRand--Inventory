<?php

namespace App\Http\Controllers\SalesEngineer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\IndentedProposal;

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
}
