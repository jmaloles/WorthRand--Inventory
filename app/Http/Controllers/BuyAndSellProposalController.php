<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\BuyAndSellProposal;

class BuyAndSellProposalController extends Controller
{
    public function adminPostCreateBuySellProposal(Request $request)
    {
        $create_buy_and_sell_proposal = BuyAndSellProposal::adminPostCreateBuyAndSellProposal($request);

        return $create_buy_and_sell_proposal;
    }

    public function adminBuyAndSellProposalView(BuyAndSellProposal $buyAndSellProposal)
    {
        $view_selected_items = BuyAndSellProposal::viewBuyAndSellProposal($buyAndSellProposal);

        return $view_selected_items;
    }
}
