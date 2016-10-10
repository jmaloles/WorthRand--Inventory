<?php

namespace App\Http\Controllers;

use App\IndentedProposal;
use App\IndentedProposalItem;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use App\BuyAndSellProposal;

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

    public function adminPostCreateBuyAndSellProposal(Request $request)
    {
        $create_buy_and_sell_proposal = BuyAndSellProposal::adminPostCreateBuyAndSellProposal($request);

        return $create_buy_and_sell_proposal;
    }

    public function adminBuyAndSellProposalView(BuyAndSellProposal $buyAndSellProposal)
    {
        $view_selected_items = BuyAndSellProposal::viewBuyAndSellProposal($buyAndSellProposal);

        return $view_selected_items;
    }

    public function adminSubmitIndentedProposal(Request $request)
    {
        $save_indented_proposal = IndentedProposal::saveIndentedProposal($request);

        return $save_indented_proposal;
    }
}
