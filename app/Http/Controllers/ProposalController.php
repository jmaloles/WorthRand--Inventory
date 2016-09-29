<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;

class ProposalController extends Controller
{
    //
    public function adminPostCreateIndentedProposal(Request $request)
    {
        $itemArray = [];
        $array_project_id = explode(',', $request->get('array_id'));

        foreach($array_project_id as $items) {
            $itemArray[] = $items;
        }

        return redirect()->to(route('admin_indented_proposal'))->with('itemArray', $itemArray);
    }

    public function adminIndentProposalView()
    {
        $collectedItems = [];
        $collection_items = (array) Session::get('itemArray');

        foreach($collection_items as $collection_item) {
            $get_items = explode('-', $collection_item);
            $storeItem = DB::table($get_items[1])->where('id', '=', $get_items[0])->first();

            $collectedItems[] = $storeItem;
        }

        return view('proposal.admin.indented.create', compact('collectedItems'));
    }
}
