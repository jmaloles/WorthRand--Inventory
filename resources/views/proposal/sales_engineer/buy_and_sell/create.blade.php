@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row">

                <div class="sidebar col-lg-2 col-md-3 col-sm-3 col-xs-12 ">
                    <ul id="accordion" class="nav nav-pills nav-stacked sidebar-menu">
                        <li class="nav-item"><a class="nav-link" href="#send_proposal" onclick='document.getElementById("SubmitBuyAndSellProposal").submit();'><i class="fa fa-paper-plane"></i>&nbsp; Submit Proposal</a></li>

                        <li class="nav-item"><a class="nav-link"  href="{{ route('search') }}"><i class="fa fa-arrow-left"></i>&nbsp; Back</a></li>
                    </ul>
                </div>

                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                    <form class="form-horizontal" action="{{ route('se_submit_buy_and_sell_proposal') }}" method="POST" id="SubmitBuyAndSellProposal">
                        {{ csrf_field() }}
                        <input type="hidden" name="buy_and_sell_proposal_id" value="{{ $buyAndSellProposal->id }}">

                        <div class="row">
                            <div class="col-lg-12 col-lg-pull-1">
                                <div class="form-group">
                                    <label for="purchase_order" class="col-sm-2 control-label">P.O: </label>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="purchase_order" name="purchase_order" placeholder="Purchase Order Number">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="main_company" class="col-sm-2 control-label">WPC REF </label>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="wpc ref" name="wpc_ref" placeholder="WPC Ref">
                                        <br>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="OfficeSold" class="col-sm-2 control-label">Date</label>
                                    <div class="col-sm-5">
                                        <input name="date" class="form-control" id="Date" placeholder="Date">
                                        <br>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputInvoice" class="col-sm-2 control-label">Sold To:</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="inputInvoice" name="sold" placeholder="Sold To">
                                        <br>
                                        <textarea name="sold_to_address" id="" class="form-control" placeholder="Address"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ShitpTo" class="col-sm-2 control-label">Invoice To:</label>
                                    <div class="col-sm-5">
                                        <input name="invoice_to" class="form-control" id="InvoiceTo" placeholder="Invoice To">
                                        <br>
                                        <textarea name="invoice_address" id="" class="form-control" placeholder="Invoice Address"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="main_company" class="col-sm-2 control-label">QRC REF </label>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="qrc ref" name="qrc_ref" placeholder="WPC Ref">
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <hr>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table">
                                    <thead>
                                    <th>ITEM NO#</th>
                                    <th>DESCRIPTION</th>
                                    <th>QUANTITY</th>
                                    <th>PRICE</th>
                                    <th>DELIVERY</th>
                                    </thead>

                                    <tbody>
                                    @foreach($selectedItems as $selectedItem)
                                        <tr>
                                            <td>{{ ++$ctr }}</td>
                                            <td>
                                                <b>NAME:&nbsp;</b> {{ $selectedItem->project_name != "" ? $selectedItem->project_name : $selectedItem->after_market_name }}
                                                <br>
                                                <b>PN:&nbsp;</b> {{ $selectedItem->project_pn != "" ? $selectedItem->project_pn : $selectedItem->after_market_pn }}
                                                <br>
                                                <b>MODEL NO.:&nbsp;</b> {{ $selectedItem->project_md != "" ? $selectedItem->project_md : $selectedItem->after_market_md }}
                                                <br>
                                                <b>DWG NO.:&nbsp;</b> {{ $selectedItem->project_dn != "" ? $selectedItem->project_dn : $selectedItem->after_market_dn }}
                                                <br>
                                                <b>TAG NO.:&nbsp;</b> {{ $selectedItem->project_tn != "" ? $selectedItem->project_tn : $selectedItem->after_market_tn }}
                                            </td>
                                            <td><input type="text" class="form-control" name="quantity-{{ $selectedItem->buy_and_sell_proposal_item_id }}" placeholder="Enter item Quantity"></td>
                                            <td><input type="text" placeholder="Enter item price" class="form-control" name="price-{{ $selectedItem->buy_and_sell_proposal_item_id }}" value="{{ $selectedItem->project_price != "" ? $selectedItem->project_price : $selectedItem->after_market_price }}"></td>
                                            <td>
                                                <input type="text" class="form-control" name="delivery-{{ $selectedItem->buy_and_sell_proposal_item_id }}" placeholder="Enter number of Weeks">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <hr>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="InputSpecialInstruction" class="col-sm-2 control-label"><b><i>Validity:</i></b>: </label>
                                    <div class="col-sm-5">
                                        <input name="validity" id="InputValidity" class="form-control" placeholder="Validity"></input>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="InputAmount" class="col-sm-2 control-label">Payment Terms:</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="InputPaymentTerms" name="terms" placeholder="Payment Terms">
                                    </div>
                                </div>

                                @stop