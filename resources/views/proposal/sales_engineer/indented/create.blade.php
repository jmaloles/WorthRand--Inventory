@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row">

                <div class="sidebar col-lg-2 col-md-3 col-sm-3 col-xs-12 ">
                    <ul id="accordion" class="nav nav-pills nav-stacked sidebar-menu">
                        <li class="nav-item"><a class="nav-link" href="#send_proposal" onclick='document.getElementById("SubmitIndentedProposal").submit();'><i class="fa fa-paper-plane"></i>&nbsp; Submit Proposal</a></li>

                        <li class="nav-item"><a class="nav-link"  href="{{ route('search') }}"><i class="fa fa-arrow-left"></i>&nbsp; Back</a></li>
                    </ul>
                </div>

                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                    <form class="form-horizontal" action="{{ route('se_submit_indented_proposal') }}" method="POST" id="SubmitIndentedProposal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="indent_proposal_id" value="{{ $indented_proposal->id }}">
                        <input type="hidden" name="customer_id" id="customer_id">
                        <input type="hidden" name="branch_id" id="branch_id">

                        <div class="row">
                            <div class="col-lg-12 col-lg-pull-1">
                                <div class="form-group{{ $errors->has('purchase_order') ? ' has-error' : '' }}">
                                    <label for="purchase_order" class="col-sm-2 control-label">P.O Number: </label>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="purchase_order" name="purchase_order" placeholder="Purchase Order Number"
                                        value="{{ old('purchase_order') }}">
                                        @if ($errors->has('purchase_order'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('purchase_order') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('customer_id') ? ' has-error' : ($errors->has('to') ? ' has-error' : '')  }}">
                                    <label for="main_company" class="col-sm-2 control-label">To: </label>
                                    <div class="col-sm-5">
                                        <input name="to" id="customer_dropdown" class="form-control" value="{{ old('to') }}"/>
                                        @if ($errors->has('customer_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('customer_id') }}</strong>
                                        </span>
                                        @endif
                                        @if ($errors->has('to'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('to') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-5 col-lg-push-2">
                                        <textarea name="to_address" id="to_address" class="form-control" placeholder="Address">{{ old('to_address') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('branch_id') ? ' has-error' : ($errors->has('branch') ? ' has-error' : '') }}">
                                    <label for="OfficeSold" class="col-sm-2 control-label">Sold To:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" value="{{ old('branch') }}" name="branch" id="branch_field" required autofocus />
                                        @if ($errors->has('branch_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('branch_id') }}</strong>
                                            </span>
                                        @endif
                                        @if ($errors->has('branch'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('branch_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-5 col-lg-push-2">
                                        <textarea name="branch_address" id="branch_address" class="form-control" placeholder="Address">{{ old('branch_address') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('invoice') ? ' has-error' : '' }}">
                                    <label for="inputInvoice" class="col-sm-2 control-label">Invoice To:</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="inputInvoice" name="invoice" placeholder="Enter Invoice" value="{{ old('invoice') }}">
                                        @if ($errors->has('invoice'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('invoice') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('invoice_address') ? ' has-error' : '' }}">
                                    <div class="col-sm-5 col-lg-push-2">
                                        <textarea name="invoice_address" id="" class="form-control" placeholder="Invoice Address">{{ old('invoice_address') }}</textarea>
                                        @if ($errors->has('invoice_address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('invoice_address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('ship_to') ? ' has-error' : '' }}">
                                    <label for="ShitpTo" class="col-sm-2 control-label">Ship To:</label>
                                    <div class="col-sm-5">
                                        <input name="ship_to" class="form-control" id="ShitpTo" placeholder="Ship To" value="{{ old('invoice_address') }}">
                                        @if ($errors->has('ship_to'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ship_to') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('ship_to_address') ? ' has-error' : '' }}">
                                    <div class="col-sm-5 col-lg-push-2">
                                        <textarea name="ship_to_address" id="" class="form-control" placeholder="Ship To Address">{{ old('ship_to_address') }}</textarea>
                                        @if ($errors->has('ship_to_address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ship_to_address') }}</strong>
                                            </span>
                                        @endif
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
                                                <b>NAME:&nbsp;</b>
                                                {{ $selectedItem->project_name != "" ? $selectedItem->project_name : $selectedItem->after_market_name }}
                                                <br>
                                                <b>PN:&nbsp;</b> {{ $selectedItem->project_pn != "" ? $selectedItem->project_pn : $selectedItem->after_market_pn }}
                                                <br>
                                                <b>MODEL NO.:&nbsp;</b> {{ $selectedItem->project_md != "" ? $selectedItem->project_md : $selectedItem->after_market_md }}
                                                <br>
                                                <b>DWG NO.:&nbsp;</b> {{ $selectedItem->project_dn != "" ? $selectedItem->project_dn : $selectedItem->after_market_dn }}
                                                <br>
                                                <b>TAG NO.:&nbsp;</b> {{ $selectedItem->project_tn != "" ? $selectedItem->project_tn : $selectedItem->after_market_tn }}
                                            </td>
                                            <td>
                                                <div class="form-group{{ $errors->has('quantity.'.$selectedItem->indented_proposal_item_id) ? ' has-error' : '' }}">
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" name="quantity[{{ $selectedItem->indented_proposal_item_id }}]" value="{{ old('quantity.'.$selectedItem->indented_proposal_item_id) }}" placeholder="Enter item Quantity">
                                                        @if ($errors->has('quantity.'.$selectedItem->indented_proposal_item_id))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('quantity.'.$selectedItem->indented_proposal_item_id) }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group{{ $errors->has('price.'.$selectedItem->indented_proposal_item_id) ? ' has-error' : '' }}">
                                                    <div class="col-lg-12">
                                                        <input type="text" placeholder="Enter item price" class="form-control" name="price[{{ $selectedItem->indented_proposal_item_id }}]" value="{{ $selectedItem->project_price != "" ? $selectedItem->project_price : $selectedItem->after_market_price }}">
                                                        @if ($errors->has('price.'.$selectedItem->indented_proposal_item_id))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('price.'.$selectedItem->indented_proposal_item_id) }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group{{ $errors->has('delivery.'.$selectedItem->indented_proposal_item_id) ? ' has-error' : '' }}">
                                                    <div class="col-lg-12">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="delivery[{{ $selectedItem->indented_proposal_item_id }}]" placeholder="Enter number of Weeks" value="{{ old('delivery.'.$selectedItem->indented_proposal_item_id) }}">
                                                            <div class="input-group-addon">Weeks</div>
                                                        </div>
                                                        @if ($errors->has('delivery.'.$selectedItem->indented_proposal_item_id))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('delivery.'.$selectedItem->indented_proposal_item_id) }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
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
                                        <textarea name="special_instruction" id="InputSpecialInstruction" class="form-control" placeholder="Special Instruction">{{ old('special_instructions') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('ship_via') ? ' has-error' : '' }}">
                                    <label for="InputShipVia" class="col-sm-2 control-label">SHIP VIA:</label>
                                    <div class="col-sm-5">
                                        <input name="ship_via" class="form-control" id="InputShipVia" placeholder="Ship via" value="{{ old('ship_via') }}">
                                        @if ($errors->has('ship_via'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ship_via') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('ship_via') ? ' has-error' : '' }}">
                                    <label for="InputAmount" class="col-sm-2 control-label">AMOUNT:</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="InputAmount" name="amount" placeholder="Amount" value="{{ old('amount') }}">
                                        @if ($errors->has('amount'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('amount') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('packing') ? ' has-error' : '' }}">
                                    <label for="InputPacking" class="col-sm-2 control-label">PACKING:</label>
                                    <div class="col-sm-5">
                                        <textarea name="packing" id="InputPacking" class="form-control" placeholder="Packing" >{{ old('packing') }}</textarea>
                                        @if ($errors->has('packing'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('packing') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('insurance') ? ' has-error' : '' }}">
                                    <label for="InputDocuments" class="col-sm-2 control-label">DOCUMENTS:</label>
                                    <div class="col-sm-5">
                                        <textarea name="documents" id="InputDocuments" class="form-control" placeholder="Documents">{{ old('documents') }}</textarea>
                                        @if ($errors->has('documents'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('documents') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('insurance') ? ' has-error' : '' }}">
                                    <label for="InputInsurance" class="col-sm-2 control-label">INSURANCE:</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="InputInsurance" name="insurance" placeholder="Insurance"  value="{{ old('insurance') }}">
                                        @if ($errors->has('insurance'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('insurance') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('terms_of_payment_1') ? ' has-error' : '' }}">
                                    <label for="InputTermsOfPayment" class="col-sm-2 control-label">TERMS OF PAYMENT: </label>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="InputTermsOfPayment" name="terms_of_payment_1" placeholder="Note" value="{{ old('terms_of_payment_1') }}">
                                        @if ($errors->has('terms_of_payment_1'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('terms_of_payment_1') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('terms_of_payment_address') ? ' has-error' : '' }}">
                                    <div class="col-sm-5 col-lg-push-2">
                                        <textarea name="terms_of_payment_address" id="InputTermsOfPayment2" class="form-control" placeholder="Address">{{ old('terms_of_payment_address') }}</textarea>
                                        @if ($errors->has('terms_of_payment_address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('terms_of_payment_address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('bank_detail_owner') ? ' has-error' : '' }}">
                                    <label for="InputBankDetailName" class="col-sm-2 control-label">BANK DETAILS: </label>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="InputBankDetailName" name="bank_detail_owner" placeholder="Bank Details" value="{{ old('bank_detail_owner') }}">
                                        @if ($errors->has('bank_detail_owner'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('bank_detail_owner') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('bank_detail_address') ? ' has-error' : '' }}">
                                    <div class="col-sm-5 col-lg-push-2">
                                        <textarea name="bank_detail_address" id="" class="form-control" placeholder="Bank Details Address">{{ old('bank_detail_address') }}</textarea>
                                        @if ($errors->has('bank_detail_address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('bank_detail_address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('bank_detail_account_number') ? ' has-error' : '' }}">
                                    <div class="col-sm-5 col-lg-push-2">
                                        <input class="form-control" id="InputBankDetailName" name="bank_detail_account_number" placeholder="Account Number"  value="{{ old('bank_detail_account_number') }}">
                                        @if ($errors->has('bank_detail_account_number'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('bank_detail_account_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('bank_detail_swift_code') ? ' has-error' : '' }}">
                                    <div class="col-sm-5 col-lg-push-2">
                                        <input class="form-control" id="InputBankDetailName" name="bank_detail_swift_code" placeholder="Swift Code"  value="{{ old('bank_detail_swift_code') }}">
                                        @if ($errors->has('bank_detail_swift_code'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('bank_detail_swift_code') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('bank_detail_account_name') ? ' has-error' : '' }}">
                                    <div class="col-sm-5 col-lg-push-2">
                                        <input class="form-control" id="InputBankDetailName" name="bank_detail_account_name" placeholder="Bank Account Name"  value="{{ old('bank_detail_account_name') }}">
                                        @if ($errors->has('bank_detail_account_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('bank_detail_account_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('commission_note') ? ' has-error' : '' }}">
                                    <label for="InputBankDetailName" class="col-sm-2 control-label">COMMISSION: </label>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="InputBankDetailName" name="commission_note" placeholder="Commission Details"  value="{{ old('commission_note') }}">
                                        @if ($errors->has('commission_note'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('commission_note') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('commission_address') ? ' has-error' : '' }}">
                                    <div class="col-sm-5 col-lg-push-2">
                                        <textarea name="commission_address" id="" class="form-control" placeholder="Commission Address" >{{ old('commission_address') }}</textarea>
                                        @if ($errors->has('commission_address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('commission_address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('commission_account_number') ? ' has-error' : '' }}">
                                    <div class="col-sm-5 col-lg-push-2">
                                       <input class="form-control" id="InputBankDetailName" name="commission_account_number" placeholder="Commission Account Number"  value="{{ old('commission_account_number') }}">
                                        @if ($errors->has('commission_account_number'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('commission_account_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('commission_swift_code') ? ' has-error' : '' }}">
                                    <div class="col-sm-5 col-lg-push-2">
                                        <input class="form-control" id="InputBankDetailName" name="commission_swift_code" placeholder="Commission Swift Code"  value="{{ old('commission_swift_code') }}">
                                        @if ($errors->has('commission_swift_code'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('commission_swift_code') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>

        $(document).ready(function() {
            var data;

            $('#customer_dropdown').on('blur', function() {
                if(document.getElementById("customer_dropdown").value.length == 0) {
                    document.getElementById('customer_id').value = "";
                } else {}
            })

            $('#customer_dropdown').autocomplete({
                serviceUrl: "{{ URL::to('/') }}/{{ Auth::user()->role }}/fetch_customers/",
                dataType: 'json',
                type: 'get',
                onSelect: function (suggestions) {
                    document.getElementById('to_address').value = "";
                    document.getElementById('branch_address').value = "";
                    document.getElementById('branch_field').value = "";
                    document.getElementById('customer_id').value = "";
                    document.getElementById('branch_id').value = "";

                    document.getElementById('to_address').value = suggestions.address;
                    document.getElementById('customer_id').value = suggestions.id;

                    $('#branch_field').autocomplete({
                        serviceUrl: "{{ URL::to('/') }}/{{ Auth::user()->role }}/fetch_branches/" + suggestions.id,
                        dataType: 'json',
                        type: 'get',
                        onSelect: function (data) {
                            document.getElementById('branch_address').value = data.address;
                            document.getElementById('branch_id').value = data.id;
                        }
                    });
                }
            });



        });
    </script>
@stop