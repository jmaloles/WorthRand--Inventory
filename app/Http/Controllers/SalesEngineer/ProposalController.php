<?php

namespace App\Http\Controllers\SalesEngineer;

use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\IndentedProposal;
use App\Http\Requests\CreateIndentedProposalRequest;
use App\IndentedProposalItem;
use App\BuyAndSellProposal;
use App\BuyAndSellProposalItem;

class ProposalController extends Controller
{
    //
    public function salesEngineerPostCreateIndentedProposal(Request $request)
    {
        $create_indented_proposal = IndentedProposal::salesEngineerPostCreateIndentedProposal($request);

        return $create_indented_proposal;
    }

    public function salesEngineerSubmitIndentedProposal(Request $createIndentedProposalRequest)
    {
       $saveIndentedProposal = IndentedProposal::saveIndentedProposal($createIndentedProposalRequest);

       return $saveIndentedProposal;
    }

    public function salesEngineerIndentProposalView(IndentedProposal $indentedProposal)
    {
        $view_selected_items = IndentedProposal::showSentIndentedProposal($indentedProposal);

        return $view_selected_items;
    }

    public function salesEngineerPostCreateBuyAndSellProposal(Request $request)
    {
        $create_buy_and_sell_proposal = BuyAndSellProposal::salesEngineerPostCreateBuyAndSellProposal($request);

        return $create_buy_and_sell_proposal;
    }

    public function salesEngineerBuyAndSellProposalView(BuyAndSellProposal $buyAndSellProposal)
    {
        $view_selected_items = BuyAndSellProposal::viewBuyAndSellProposal($buyAndSellProposal);

        return $view_selected_items;
    }

    public function salesEngineerSubmitBuyAndSellProposal(Request $request)
    {
        $saveBuyAndSellProposal = BuyAndSellProposal::saveBuyAndSellProposal($request);

        return $saveBuyAndSellProposal;
    }
}
