public->js->pos.js

//Update payable amount
    $('button#posEditPayableAmountUpdate').click(function () {
        console.log('ok');
        //if payable amount is not valid return false
        if (!$("#total_payable_amount").valid()) {
            return false;
        }
        let total_payable_amount = $('#total_payable_amount').val()
        //Update values
        let payable_price_total = get_subtotal();
        if (total_payable_amount > payable_price_total) {
            return false;
        }
        $('input#discount_type').val('fixed');
        __write_number($('input#discount_amount'), payable_price_total - total_payable_amount);

        pos_total_row();
    });


//resources->views->sale_pos->partials->pos_form_actions.blade.php


@if(!$is_mobile)
                <div class="bg-navy pos-total text-white">
{{--                <span class="text">@lang('sale.total_payable')</span>--}}
                    <span class="text">Total</span>
                    <input type="hidden" name="final_total"
                           id="final_total_input" value=0>
                    <span id="total_payable" class="number">0</span>
                </div>
            @endif

            @if(!$is_mobile)
                <div class="bg-primary pos-total text-white">
                    <span class="text">@lang('sale.total_payable')</span>
                    <input class="text-black" type="text" name="total_payable_amount"
                           id="total_payable_amount" value=0 style="height: 30px;">
                    <button type="button" class="btn btn-success btn-flat btn-sm" id="posEditPayableAmountUpdate">@lang('messages.update')</button>
                </div>
            @endif