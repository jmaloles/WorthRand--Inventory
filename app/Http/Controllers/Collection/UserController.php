<?php

namespace App\Http\Controllers\Collection;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\IndentedProposal;

class UserController extends Controller
{
    public function collectionDashboard()
    {
        $indented_proposal = IndentedProposal::whereCollectionStatus("Processing")->get();
        return view('auth.collection.dashboard');
    }
}
