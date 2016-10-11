@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row">

                <div class="sidebar col-lg-2 col-md-3 col-sm-3 col-xs-12 ">
                    <ul id="accordion" class="nav nav-pills nav-stacked sidebar-menu">
                        <li class="nav-item"><a class="nav-link"  href="{{ route('search') }}"><i class="fa fa-arrow-left"></i>&nbsp; Back</a></li>
                    </ul>
                </div>

                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                    <form class="form-horizontal" action="{{ route('admin_submit_indented_proposal') }}" method="POST" id="SubmitIndentedProposal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="indent_proposal_id" value="{{ $indented_proposal->id }}">

                        <div class="row">
                            <div class="col-lg-12 col-lg-pull-1">
                                <div class="form-group">
                                    <label for="purchase_order" class="col-sm-2 control-label">P.O: </label>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="purchase_order" name="purchase_order" placeholder="Purchase Order Number"
                                               value="{{ $indented_proposal->purchase_order != '' ? $indented_proposal->purchase_order : '' }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="main_company" class="col-sm-2 control-label">To: </label>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="main_company" name="to" placeholder="To" value="{{ $indented_proposal->to != '' ? $indented_proposal->to : '' }}">
                                        <br>
                                        <textarea name="to_address" id="" class="form-control" placeholder="Address">{{ $indented_proposal->to_address != '' ? $indented_proposal->to_address : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="OfficeSold" class="col-sm-2 control-label">Sold To:</label>
                                    <div class="col-sm-5">
                                        <input name="sold_to" class="form-control" id="OfficeSold" placeholder="Sold To" value="{{ $indented_proposal->sold_to != '' ? $indented_proposal->sold_to : '' }}">
                                        <br>
                                        <textarea name="sold_to_address" class="form-control" placeholder="Address">{{ $indented_proposal->sold_to_address != '' ? $indented_proposal->sold_to_address : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputInvoice" class="col-sm-2 control-label">Invoice To:</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="inputInvoice" name="invoice" placeholder="Enter Invoice" value="{{ $indented_proposal->invoice_to != '' ? $indented_proposal->invoice_to : '' }}">
                                        <br>
                                        <textarea name="invoice_address" id="" class="form-control" placeholder="Invoice Address">{{ $indented_proposal->invoice_to_address != '' ? $indented_proposal->invoice_to_address : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ShitpTo" class="col-sm-2 control-label">Ship To:</label>
                                    <div class="col-sm-5">
                                        <input name="ship_to" class="form-control" id="ShitpTo" placeholder="Ship To" value="{{ $indented_proposal->ship_to != '' ? $indented_proposal->ship_to : '' }}">
                                        <br>
                                        <textarea name="ship_to_address" id="" class="form-control" placeholder="Ship To Address">{{ $indented_proposal->ship_to_address != '' ? $indented_proposal->ship_to_address : '' }}</textarea>
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
                                            <td><input type="text" class="form-control" name="quantity-{{ $selectedItem->indented_proposal_item_id }}" placeholder="Enter item Quantity" value="{{ $selectedItem->quantity != "" ? $selectedItem->quantity : $selectedItem->after_market_price }}"></td>
                                            <td><input type="text" placeholder="Enter item price" class="form-control" name="price-{{ $selectedItem->indented_proposal_item_id }}" value="{{ $selectedItem->project_price != "" ? $selectedItem->project_price : $selectedItem->after_market_price }}"></td>
                                            <td>
                                                <input type="text" class="form-control" name="delivery-{{ $selectedItem->indented_proposal_item_id }}" placeholder="Enter number of Weeks" value="{{ $selectedItem->delivery != "" ? $selectedItem->delivery : $selectedItem->delivery }}">
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

                        <div class="form-group" style="font-size: 16px;">
                            <label for="exampleInputFile">File input</label>
                            <br>
                            <input type="file" id="exampleInputFile" name="fileField">
                            <p class="help-block">Upload File Here</p>
                        </div>

                        <div class="row">
                            <hr>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="InputSpecialInstruction" class="col-sm-2 control-label"><b><i>SPECIAL INSTRUCTION</i></b>: </label>
                                    <div class="col-sm-5">
                                        <textarea name="special_instruction" id="InputSpecialInstruction" class="form-control" placeholder="Special Instruction">{{ $indented_proposal->special_instructions != '' ? $indented_proposal->special_instructions : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="InputShipVia" class="col-sm-2 control-label">SHIP VIA:</label>
                                    <div class="col-sm-5">
                                        <input name="ship_via" class="form-control" id="InputShipVia" placeholder="Ship via" value="{{ $indented_proposal->ship_via != '' ? $indented_proposal->ship_via : '' }}">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="InputAmount" class="col-sm-2 control-label">AMOUNT:</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="InputAmount" name="amount" placeholder="Amount" value="{{ $indented_proposal->amount != '' ? $indented_proposal->amount : '' }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="InputPacking" class="col-sm-2 control-label">PACKING:</label>
                                    <div class="col-sm-5">
                                        <textarea name="packing" id="InputPacking" class="form-control" placeholder="Packing" >{{ $indented_proposal->packing != '' ? $indented_proposal->packing : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="InputDocuments" class="col-sm-2 control-label">DOCUMENTS:</label>
                                    <div class="col-sm-5">
                                        <textarea name="documents" id="InputDocuments" class="form-control" placeholder="Documents">{{ $indented_proposal->documents != '' ? $indented_proposal->documents : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="InputInsurance" class="col-sm-2 control-label">INSURANCE:</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="InputInsurance" name="insurance" placeholder="Insurance"  value="{{ $indented_proposal->insurance != '' ? $indented_proposal->insurance : '' }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="InputTermsOfPayment" class="col-sm-2 control-label">TERMS OF PAYMENT: </label>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="InputTermsOfPayment" name="terms_of_payment_1" placeholder="Note"  value="{{ $indented_proposal->terms_of_payment_1 != '' ? $indented_proposal->terms_of_payment_1 : '' }}">
                                        <br>
                                        <textarea name="terms_of_payment_address" id="InputTermsOfPayment2" class="form-control" placeholder="Address">{{ $indented_proposal->terms_of_payment_address != '' ? $indented_proposal->terms_of_payment_address : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="InputBankDetailName" class="col-sm-2 control-label">BANK DETAILS: </label>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="InputBankDetailName" name="bank_detail_owner" placeholder="Bank Details"  value="{{ $indented_proposal->bank_detail_owner != '' ? $indented_proposal->bank_detail_owner : '' }}">
                                        <br>
                                        <textarea name="bank_detail_address" id="" class="form-control" placeholder="Bank Details Address">{{ $indented_proposal->bank_detail_address != '' ? $indented_proposal->bank_detail_address : '' }}</textarea>
                                        <br>
                                        <input class="form-control" id="InputBankDetailName" name="bank_detail_account_number" placeholder="Account Number"  value="{{ $indented_proposal->bank_detail_account_no != '' ? $indented_proposal->bank_detail_account_no : '' }}">
                                        <br>
                                        <input class="form-control" id="InputBankDetailName" name="bank_detail_swift_code" placeholder="Swift Code"  value="{{ $indented_proposal->bank_detail_swift_code != '' ? $indented_proposal->bank_detail_swift_code : '' }}">
                                        <br>
                                        <input class="form-control" id="InputBankDetailName" name="bank_detail_account_name" placeholder="Bank Account Name"  value="{{ $indented_proposal->bank_detail_account_name != '' ? $indented_proposal->bank_detail_account_name : '' }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="InputBankDetailName" class="col-sm-2 control-label">COMMISSION: </label>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="InputBankDetailName" name="commission_note" placeholder="Commission Details"  value="{{ $indented_proposal->commission_note != '' ? $indented_proposal->commission_note : '' }}">
                                        <br>
                                        <textarea name="commission_address" id="" class="form-control" placeholder="Commission Address" >{{ $indented_proposal->commission_address != '' ? $indented_proposal->commission_address : '' }}</textarea>
                                        <br>
                                        <input class="form-control" id="InputBankDetailName" name="commission_account_number" placeholder="Commission Account Number"  value="{{ $indented_proposal->commission_account_number != '' ? $indented_proposal->commission_account_number : '' }}">
                                        <br>
                                        <input class="form-control" id="InputBankDetailName" name="commission_swift_code" placeholder="Commission Swift Code"  value="{{ $indented_proposal->commission_swift_code != '' ? $indented_proposal->commission_swift_code : '' }}">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@stop