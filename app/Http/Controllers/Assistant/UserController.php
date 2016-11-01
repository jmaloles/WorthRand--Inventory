<?php

namespace App\Http\Controllers\Assistant;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\IndentedProposal;
use App\BuyAndSellProposal;

class UserController extends Controller
{
    //
    public function dashboard()
    {
        $ctr = 0;
        $indented_proposals = IndentedProposal::where('collection_status', 'ACCEPTED')->paginate(30);
        $indented_proposals->setPath('dashboard');

        $ctr2 = 0;
        $buy_and_sell_proposals = BuyAndSellProposal::where('collection_status', 'ACCEPTED')->paginate(30);
        $buy_and_sell_proposals->setPath('dashboard');

        return view('auth.assistant.dashboard', compact('ctr', 'ctr2', 'indented_proposals', 'buy_and_sell_proposals'));
    }
}
