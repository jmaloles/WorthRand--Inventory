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

    public function adminIndentedProposalIndex()
    {
        $ctr = 0;
        $indented_proposals = IndentedProposal::where('collection_status', '=', 'PENDING')->paginate(30);
        $indented_proposals->setPath('indented_proposals');

        return view('proposal.admin.indented_proposal.index', compact('indented_proposals', 'ctr'));
    }

    public function adminShowPendingProposal(IndentedProposal $indented_proposal)
    {
        $admin_show_pending_proposal = IndentedProposal::showPendingProposal($indented_proposal);

        return $admin_show_pending_proposal;
    }

    public function adminAcceptProposal(IndentedProposal $indented_proposal)
    {
        $indented_proposal = IndentedProposal::find($indented_proposal->id);
        $indented_proposal->update(['collection_status' => 'ACCEPTED']);

        return redirect()->back()->with('message', 'Indented Proposal Accepted');
    }

    public function adminShowPendingBuyAndSellProposal(IndentedProposal $buy_and_sell_proposal)
    {
        $admin_show_pending_proposal = BuyAndSellProposal::showPendingProposal($buy_and_sell_proposal);

        return $admin_show_pending_proposal;
    }

    public function adminBuyAndSellProposalIndex()
    {
        $buy_and_sell_proposals = BuyAndSellProposal::whereStatus('SENT')->get();

        return view('proposal.admin.buy_and_sell_proposal.index', compact('buy_and_sell_proposals'));
    }
}
