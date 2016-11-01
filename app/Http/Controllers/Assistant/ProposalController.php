<?php

namespace App\Http\Controllers\Assistant;

use App\IndentedProposal;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\BuyAndSellProposal;

class ProposalController extends Controller
{
    //
    public function showAcceptedIndentedProposal(IndentedProposal $indentedProposal)
    {
        $show_accepted_proposal = IndentedProposal::showAcceptedIndentedProposal($indentedProposal);

        return $show_accepted_proposal;
    }

    public function updateIndentedProposal(IndentedProposal $indentedProposal)
    {
        $update_accepted_proposal = IndentedProposal::find($indentedProposal->id);
        $update_accepted_proposal->update(['collection_status' => 'FOR-COLLECTION']);

        return redirect()->back()->with('message', 'Indented Proposal [ Purchase Order Number: #' . $indentedProposal->purchase_order . ' ] is now ready for collection')
            ->with('alert', 'alert-success');
    }

    public function assistantShowPendingBuyAndSellProposal(BuyAndSellProposal $buyAndSellProposal)
    {
        $admin_show_pending_proposal = BuyAndSellProposal::showAssistantPendingBuyAndSellProposal($buyAndSellProposal);

        return $admin_show_pending_proposal;
    }
}
