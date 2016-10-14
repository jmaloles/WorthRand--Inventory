<?php

namespace App\Http\Controllers\Admin;

use App\IndentedProposal;
use App\IndentedProposalItem;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use App\BuyAndSellProposal;
use App\Http\Controllers\Controller;

class ProposalController extends Controller
{
    //
    public function adminPostCreateIndentedProposal(Request $request)
    {
        $create_indented_proposal = IndentedProposal::adminPostCreateIndentedProposal($request);

        return $create_indented_proposal;
    }

    public function adminIndentProposalView(IndentedProposal $indentedProposal)
    {
        $view_selected_items = IndentedProposal::viewIndentedProposal($indentedProposal);

        return $view_selected_items;
    }

    public function adminSubmitIndentedProposal(Request $request)
    {
        $save_indented_proposal = IndentedProposal::saveIndentedProposal($request);

        return $save_indented_proposal;
    }

    public function adminShowSentIndentedProposal(IndentedProposal $indented_proposal)
    {
        $showSentIndentedProposal = IndentedProposal::showSentIndentedProposal($indented_proposal);

        return $showSentIndentedProposal;
    }

    public function adminSubmitBuyAndSellProposal(Request $request)
    {
        $save_buy_and_sell_proposal = BuyAndSellProposal::saveBuyAndSellProposal($request);

        return $save_buy_and_sell_proposal;
    }

    public function adminBuyAndSellProposalView(BuyAndSellProposal $buyAndSellProposal)
    {
        $view_selected_items = BuyAndSellProposal::viewBuyAndSellProposal($buyAndSellProposal);

        return $view_selected_items;
    }

    public function adminPostCreateBuyAndSellProposal(Request $request)
    {
        $create_buy_and_sell_proposal = BuyAndSellProposal::adminPostCreateBuyAndSellProposal($request);

        return $create_buy_and_sell_proposal;
    }

}
