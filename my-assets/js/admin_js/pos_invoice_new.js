
"use strict";
function addInputField(t) {
    // console.log(t);

    var row = $("#addinvoice tbody tr").length;
    var count = row + 1;

    //  alert(count)

    var tab1 = 0;
    var tab2 = 0;
    var tab3 = 0;
    var tab4 = 0;
    var tab5 = 0;
    var tab6 = 0;
    var tab7 = 0;
    var tab8 = 0;
    var tab9 = 0;
    var tab10 = 0;
    var tab11 = 0;
    var tab12 = 0;
    var limits = 500;
    var taxnumber = $("#txfieldnum").val();
    var tbfild = '';
    for (var i = 0; i < taxnumber; i++) {
        var taxincrefield = '<input id="total_tax' + i + '_' + count + '" class="total_tax' + i + '_' + count + '" type="hidden"><input id="all_tax' + i + '_' + count + '" class="total_tax' + i + '" type="hidden" name="tax[]">';
        tbfild += taxincrefield;
    }
    if (count == limits)
        toastr.error("You have reached the limit of adding " + count + " inputs");
    else {
        var a = "product_name_" + count,
            tabindex = count * 6,
            e = document.createElement("tr");
        tab1 = tabindex + 1;
        tab2 = tabindex + 2;
        tab3 = tabindex + 3;
        tab4 = tabindex + 4;
        tab5 = tabindex + 5;
        tab6 = tabindex + 6;
        tab7 = tabindex + 7;
        tab8 = tabindex + 8;
        tab9 = tabindex + 9;
        tab10 = tabindex + 10;
        tab11 = tabindex + 11;
        tab12 = tabindex + 12;
        e.innerHTML = "<td><input type='text' name='product_name' onkeypress='invoice_productList(" + count + ");' class='form-control productSelection common_product' placeholder='Product Name' id='" + a + "' required tabindex='" + tab1 + "'><input type='hidden' class='common_product autocomplete_hidden_value  product_id_" + count + "' name='product_id[]' id='SchoolHiddenId'/></td>" +
            "<td><input type='text'  class='form-control text-right  available_quantity_" + count + "' value='' readonly></td>" +
            " <td><input type='hidden' name='available_quantity[]' id='' class='form-control text-right common_avail_qnt available_quantity_" + count + "' value='0' readonly='readonly' /><input class='form-control text-right common_name unit_" + count + " valid' value='None' readonly='' aria-invalid='false' type='text'></td>" +
            "<td> <input type='text' name='product_quantity[]' value='1' required='required' onkeyup='quantity_calculate(" + count + ");' onchange='quantity_calculate(" + count + ");' id='total_qntt_" + count + "' class='common_qnt total_qntt_" + count + " form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab3 + "'/>" +
            // "</td><td> <?php $date = date('Y-m-d') ?><input type='date' id='' style='width: 110px' class='form-control  warrenty_date_" + count + "' name='warrenty_date[]' value=''/></td>" +
            "<td  class='text-center'><input type='text' style='width:120px;display:inline-block' name='product_rate[]' onkeyup='quantity_calculate(" + count + ");' onchange='quantity_calculate(" + count + ");' id='price_item_" + count + "' class='common_rate price_item" + count + " form-control text-right' required placeholder='0.00' min='0'  tabindex='" + tab4 + "'/>     <s id='purchase_price_" + count + "' class=' purchase_price" + count + "text-right' style='width:120px;display:inline-block'>৳0.00</s></td>" +
            "<td class='text-right'><input class='total_price_wd  form-control text-right' type='text' name='total_price_wd[]' id='total_price_wd_" + count + "' value='0.00' readonly='readonly'/></td>" +

            "<td class='text-center'><input type='text' name='discount[]' onkeyup='quantity_calculate(" + count + ");' onchange='quantity_calculate(" + count + ");' id='discount_" + count + "'style='width:120px;display:inline-block' class='form-control text-right common_discount' placeholder='0.00' min='0' tabindex='" + tab5 + "' /><input type='text' style='width:120px;' name='comm[]' onkeyup='quantity_calculate(" + count + ");' onchange='quantity_calculate(" + count + ");' id='comm_" + count + "' class='form-control text-right comm_th d-none  p-5' placeholder='0.00' min='0' tabindex='" + tab5 + "' /><input type='hidden' value='' name='discount_type' id='discount_type_" + count + "'></td>" +

            "<td class='text-right' hidden><input class=' total_discount form-control text-right' type='text' name='total_discount[]' id='total_discount_" + count + "' name='discount_amt[]' value='0.00' readonly='readonly'/></td>" +
            "<td class='text-right'><input class='common_total_price total_price form-control text-right' type='text' name='total_price[]' id='total_price_" + count + "' value='0.00' readonly='readonly'/></td>" +

            "<td class='text-right' hidden><input class=' total_comm form-control text-right' type='text' name='total_comm[]' id='total_comm_" + count + "' name='total_comm[]' value='0.00' readonly='readonly'/></td>" +

            "<td>" + tbfild + "<input type='hidden' id='all_discount_" + count + "' class='total_discount dppr' name='discount_amount[]'/><button tabindex='" + tab5 + "' style='text-align: right;' class='btn btn-danger' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-close'></i></button></td>",
            document.getElementById(t).appendChild(e),
            document.getElementById(a).focus(),
            document.getElementById("add_invoice_item").setAttribute("tabindex", tab6);
        document.getElementById("details").setAttribute("tabindex", tab7);
        document.getElementById("invoice_discount").setAttribute("tabindex", tab8);
        document.getElementById("shipping_cost").setAttribute("tabindex", tab9);
        document.getElementById("paidAmount").setAttribute("tabindex", tab10);
        // document.getElementById("full_paid_tab").setAttribute("tabindex", tab11);
        document.getElementById("add_invoice").setAttribute("tabindex", tab12);


        count++
    }
}


//Quantity calculat
"use strict";
function quantity_calculate(item) {
    // console.log(item);

    var quantity = $("#total_qntt_" + item).val();
    var available_quantity = $(".available_quantity_" + item).val();


    if (available_quantity <= 0) {
        toastr.error('Not available quantity for sale !!')
        return
    }
    var price_item = Number($("#price_item_" + item).val());
    var invoice_discount = $("#invoice_discount").val();
    var warrenty_date = $("#warrenty_date_" + item).val();
    var warehouse = $(".warehouse_" + item).val();
    var discount = $("#discount_" + item).val();
    var total_tax = $("#total_tax_" + item).val();
    var total_discount = $("#total_discount_" + item).val();


    var tax = ($("#tax_" + item).val() ? $("#tax_" + item).val() : 0);
    var vat = ($("#vat_" + item).val() ? $("#vat_" + item).val() : 0);
    var comm_item = ($("#comm_" + item).val() ? $("#comm_" + item).val() : 0);

    var taxnumber = $("#txfieldnum").val();
    var dis_type = $("#discount_type_" + item).val();
    if (Number(quantity) > Number(available_quantity)) {
        var message = "You can Sale maximum " + available_quantity + " Items";
        toastr.error(message);
        // alert(message);
        $("#total_qntt_" + item).val(available_quantity);
        var quantity = 0;
        $("#total_price_" + item).val(0);
        for (var i = 0; i < taxnumber; i++) {
            $("#all_tax" + i + "_" + item).val(0);
            quantity_calculate(item);
        }
    }

    var just_tot = quantity * price_item;

    var row_tot = ((just_tot) - discount - ((just_tot) * (comm_item / 100)));

    $("#total_price_wd_" + item).val(just_tot.toFixed(2));


    $("#total_discount_" + item).val(discount);
    $("#total_price_" + item).val(row_tot.toFixed(2, 2));

    calculateSum();
    invoice_paidamount();
}
//Calculate Sum
"use strict";
function calculateSum() {
    var total_vat_permission = $("#total_vat_permission").val();
    var taxnumber = $("#txfieldnum").val();
    var t = 0,
        a = 0,
        e = 0,
        o = 0,
        p = 0,
        f = 0,
        x = 0,
        ad = 0,
        tx = 0,
        ds = 0,
        ttq = 0,
        vat = 0,
        tax = 0,
        tdpw = 0,

        s_cost = ($("#shipping_cost").val() ? $("#shipping_cost").val() : 0),
        adc_cost = ($("#delivery_ac").val() ? $("#delivery_ac").val() : 0),
        c_cost = ($("#condition_cost").val() ? $("#condition_cost").val() : 0),
        commission = ($("#commission").val() ? $("#commission").val() : 0),
        service_charge = ($("#service_charge").val() ? $("#service_charge").val() : 0),
        perc_discount = ($("#perc_discount").val() ? $("#perc_discount").val() : 0);

    var total_discount_ammount = ($("#total_discount_ammount").val() ? $("#total_discount_ammount").val() : 0);
    var sub_total = ($("#sub_total").val() ? $("#sub_total").val() : 0);

    // console.log(total_discount_ammount, sub_total);


    $(".vat").each(function () {
        isNaN(this.value) || 0 == this.value.length || (vat += parseFloat(this.value))
    }),
        $(".tax").each(function () {
            isNaN(this.value) || 0 == this.value.length || (tax += parseFloat(this.value))
        }),

        $(".total_qnty").each(function () {
            isNaN(this.value) || 0 == this.value.length || (ttq += parseFloat(this.value))
        }),

        $(".total_discount").each(function () {
            isNaN(this.value) || 0 == this.value.length || (p += parseFloat(this.value))
        }),


        $("#total_discount_ammount").val(p.toFixed(2, 2)),


        $(".totalTax").each(function () {
            isNaN(this.value) || 0 == this.value.length || (f += parseFloat(this.value))
        }),
        $("#total_tax_amount").val(f.toFixed(2, 2)),

        //Total Price
        $(".total_price").each(function () {
            isNaN(this.value) || 0 == this.value.length || (t += parseFloat(this.value))
        }),
        $(".total_price_wd").each(function () {
            isNaN(this.value) || 0 == this.value.length || (x += parseFloat(this.value))
        }),

        // console.log(x);

        $(".dppr").each(function () {
            isNaN(this.value) || 0 == this.value.length || (ad += parseFloat(this.value))
        }),

        o = a.toFixed(2, 2),
        e = t.toFixed(2, 2),
        tx = f.toFixed(2, 2),
        //ds = p.toFixed(2, 2);
        //sales flat discoun t
        ds = $("#invoice_discount").val();
    var pds = +(t) * (perc_discount / 100);


    var total_discount_ammount = $("#total_discount_ammount").val();
    var ttl_discount = parseFloat(total_discount_ammount) + pds;
    //var ttl_cms = +commission;
    $("#sub_total").val(t.toFixed(2, 2));
    $("#total_vat_amount").val(vat.toFixed(2, 2));
    $("#total_tax_amount").val(tax.toFixed(2, 2));



    $("#total_discount_ammount").val(ttl_discount.toFixed(2, 2));



    $(".total_price").each(function () {
        var str = this.id;


        var newStr = str.replace("total_price_", "");
        var main_discounted_price = this.value;
        var distributed_discount = ((ttl_discount / t) * main_discounted_price);
        console.log('main'+main_discounted_price + " " + distributed_discount )
        $("#distributed_discount_" + newStr).val(distributed_discount);

        var item_discount = $("#discount_" + newStr).val();
        var total_price_wd = $("#total_price_wd_" + newStr).val();

        var item_total_discount = Number(item_discount) + distributed_discount;

        var total_discounted_price_wd = total_price_wd - item_total_discount;

        $("#item_total_discount_" + newStr).val(item_total_discount);

        $("#total_discounted_price_wd_" + newStr).val(total_discounted_price_wd);

        var tax_percent = $("#tax_percent_" + newStr).val();
        var vat_percent = $("#vat_percent_" + newStr).val();
        $("#tax_" + newStr).val(((tax_percent * (total_discounted_price_wd)) / 100).toFixed(2));
        $("#vat_" + newStr).val(((vat_percent * (total_discounted_price_wd)) / 100).toFixed(2));

        // console.log(tax_percent, vat_percent);  
        isNaN(this.value) || 0 == this.value.length || (tdpw += parseFloat(this.value))
    });

    var total_price_with_total_discount = tdpw - ttl_discount;

    $("#total_price_with_total_discount").val(total_price_with_total_discount.toFixed(2, 2));

    // console.log(tdpw);


    $("#total_vat").val(vat.toFixed(2));
    $("#total_tax").val(tax.toFixed(2));

    //ds =+(t) * (perc_discount / 100);

    //console.log(discount_perc);

    var previuos = parseFloat($("#previous").val());
    var test = +s_cost + + service_charge + + t + -ds + + ad - commission - pds;
    var test2 = +s_cost + + service_charge + + t + -ds + + ad - pds;

    if (c_cost == undefined || commission == undefined) {
        $("#grandTotal").val(test2.toFixed(2, 2));
        // $("#cash_1").val(test2 + previuos);
        $("#cash_1").val(test2);
        $("#paidAmount").val(test2.toFixed(2, 2));
    } else {
        $("#grandTotal").val(test.toFixed(2, 2));
        // $("#cash_1").val(test + previuos);
        $("#cash_1").val(test);
        // $("#paidAmount").val(test.toFixed(2, 2));
    }

    var gt = $("#grandTotal").val();
    //var invdis = $("#invoice_discount").val();

    var grnt_totals = Number(gt) + Number(vat) + Number(tax);

    invoice_paidamount();
    $("#grandTotal").val(grnt_totals.toFixed(2));


    var item_count = $('.autocomplete_hidden_value').length;
    $('#total_item_html').html('');
    $('#total_item_html').html(item_count);

    $('#total_qty_html').html('');
    $("#total_qty_html").html(ttq);

    $('#total_amount_html').html('');
    $("#total_amount_html").html(t.toFixed(2, 2));

}

//Invoice Paid Amount
"use strict";
function invoice_paidamount() {
    // alert("test");
    var prb = parseFloat($("#previous").val(), 10);
    var pr = 0;
    var d = 0;
    var nt = 0;
    if (prb != 0) {
        pr = prb;
    } else {
        pr = 0;
    }
    // var t = $("#grandTotal").val(),
    //     a = $("#paidAmount").val(),
    //     e = t - a,
    //     f = e + pr,
    //     nt = parseFloat(t, 10) + pr,
    //     re_r = Math.round(nt) - nt,
    //     d = a - nt;

    var t = $("#grandTotal").val(),
        a = $("#paidAmount").val(),
        net_total = $("#n_total").val(),
        e = t - a,
        f = e,
        nt = parseFloat(t, 10),
        re_r = Math.round(nt) - nt,
        d = a - net_total;
    // console.log("T is " + t + " A is " + a + " E is " + e + " F is " + f + " D is "+ d);


    $("#n_total").val(Math.round(nt).toFixed(2, 2));

    $('#rounding').val(re_r.toFixed(2, 2));

    var autocomplete_customer_id = $("#autocomplete_customer_id").val();
    // if (autocomplete_customer_id == 1 && f > 0) {
    //     $('#add_invoice').attr('disabled', '');
    // }
    // else {
    //     $('#add_invoice').removeAttr('disabled');
    // }

    if (f > 0) {
        $("#dueAmmount").val(Math.round(f).toFixed(2, 2));
        if (a <= f) {
            $("#change").val(0);
        }
    } else {

        if (a < f) {
            $("#change").val(0);
        }
        if (a > f) {
            $("#change").val(d.toFixed(2, 2))
        }
        $("#dueAmmount").val(0)
    }
}

//Stock Limit
"use strict";
function stockLimit(t) {
    var a = $("#total_qntt_" + t).val(),
        e = $(".product_id_" + t).val(),
        o = $(".baseUrl").val();

    $.ajax({
        type: "POST",
        url: o + "Cinvoice/product_stock_check",
        data: {
            product_id: e
        },
        cache: !1,
        success: function (e) {
            alert(e);
            if (a > Number(e)) {
                var o = "You can Sale maximum " + e + " Items";
                alert(o), $("#qty_item_" + t).val("0"), $("#total_qntt_" + t).val("0"), $("#total_price_" + t).val("0")
            }
        }
    })
}

"use strict";
function stockLimitAjax(t) {
    var a = $("#total_qntt_" + t).val(),
        e = $(".product_id_" + t).val(),
        o = $(".baseUrl").val();

    $.ajax({
        type: "POST",
        url: o + "Cinvoice/product_stock_check",
        data: {
            product_id: e
        },
        cache: !1,
        success: function (e) {
            alert(e);
            if (a > Number(e)) {
                var o = "You can Sale maximum " + e + " Items";
                alert(o), $("#qty_item_" + t).val("0"), $("#total_qntt_" + t).val("0"), $("#total_price_" + t).val("0.00"), calculateSum()
            }
        }
    })
}

'use strict';
function add_pay_row(sl) {
    var count = $("#count");
    sl = count.val();
    sl += 1;
    var bkash_list = $("#bkash_list").val();
    var nagad_list = $("#nagad_list").val();
    var rocket_list = $("#rocket_list").val();
    var bank_list = $("#bank_list").val();
    var card_list = $("#card_list").val();
    var pay_div = $("#pay_div");
    pay_div.append(

        '<div class="col-sm-12 row_div"  >'
        + '<div class="row margin-top10  m-0"  >'
        + ' <div class="col-sm-3 ">'
        + ' <input  class="form-control  box " value="মেথড" readonly>'
        + '</div>'
        + ' <div class="col-sm-3 col-md-4 col-lg-4">'
        + '  <div class="selectWrapper">'
        + '<select name="paytype[]" class="form-control selectBox" required="" onchange="bank_paymet(this.value, ' + sl + ')" tabindex="3">'
        + '<option value="1">Cash</option>'
        + '<option value="2">Cheque</option>'
        + '<option value="4">Bank</option>'
        + ' <option value="3">Bkash</option>'
        + ' <option value="5">Nagad</option>'
        + ' <option value="7">Rocket</option>'
        + ' <option value="6">Card</option>'

        + '</select>'

        + '</div>'

        + '</div>'

        + ' <div class="col-sm-3 " id="ammnt_' + sl + '">'
        + '<input class="form-control box p_amount" placeholder="Amount" type="text" name="p_amount[]" onchange="calc_paid()" onkeyup="calc_paid()">'
        // + '<label for="p_amount"> Amount</label>'
        + '</div>'

        + '<div class="col-sm-1">'
        + '<a id="delete_btn" onclick="delete_row(this)" class=" client-add-btn btn btn btn btn-danger"><i class="fa fa-trash"></i></a>'
        + '</div>'

        + '</div>'

        + '<div class="row margin-top10  m-0" id="bank_div_' + sl + '"  style="display:none;">'

        + ' <div class="col-sm-12">'

        + ' <div class="form-group row">'

        + ' <div class="col-sm-3 ">'
        + ' <input  class="form-control  box " value="Bank Name" readonly>'
        + '</div>'

        + ' <div class="col-sm-7">'
        + ' <input type="text" name="bank_id" class="form-control" id="bank_id_' + sl + '" placeholder="Bank" required>'
        + ' </div>'

        + '<div class="col-sm-1">'
        + ' <a href="#" class="client-add-btn btn btn-info" aria-hidden="true" data-toggle="modal" data-target="#cheque_info"><i class="fa fa-file m-r-2"></i></a>'
        + '</div>'

        + ' </div>'

        + '</div>'

        + '</div>'



        + '<div class="row margin-top10  m-0"  id="bank_div_m_' + sl + '"  style="display:none;">'
        + ' <div class="col-sm-12">'
        + ' <div class="form-group row">'

        + ' <div class="col-sm-3 ">'
        + ' <input  class="form-control  box " value="Bank Name" readonly>'
        + '</div>'

        + '<div class="col-sm-7">'
        + ' <div class="selectWrapper">'
        + '<select name="bank_id_m[]" required class="form-control bankpayment" id="bank_id_m_' + sl + '">'
        + bank_list
        + '</select>'
        + '</div>'

        + ' </div>'
        + '</div>'
        + '</div>'
        + '</div>'


        + '<div class="row margin-top10  m-0" id="bkash_div_' + sl + '"  style="display:none;">'
        + ' <div class="col-sm-12">'
        + ' <div class="form-group row">'
        + ' <div class="col-sm-3 ">'
        + '  <input  class="form-control  box " value="Number" readonly>'
        + '</div>'
        + '<div class="col-sm-7">'
        + ' <div class="selectWrapper">'
        + '<select name="bkash_id[]" required class="form-control bankpayment" id="bkash_id_' + sl + '">'
        + bkash_list

        + '</select>'
        + '</div>'
        + ' </div>'
        + '</div>'
        + '</div>'
        + ' </div>'


        + '<div class="row margin-top10  m-0"  id="nagad_div_' + sl + '"  style="display:none;">'
        + ' <div class="col-sm-12">'
        + ' <div class="form-group row">'
        + ' <div class="col-sm-3 ">'
        + '  <input  class="form-control  box " value="Number" readonly>'
        + '</div>'
        + '<div class="col-sm-7">'
        + ' <div class="selectWrapper">'
        + '<select name="nagad_id[]" class="form-control bankpayment" id="nagad_id_' + sl + '">'
        + nagad_list

        + '</select>'
        + '</div>'
        + ' </div>'

        + '</div>'
        + ' </div>'
        + '</div>'

        + '<div class="row margin-top10  m-0" id="rocket_div_' + sl + '"  style="display:none;">'
        + ' <div class="col-sm-12">'
        + ' <div class="form-group row">'
        + ' <div class="col-sm-3 ">'
        + '  <input  class="form-control  box " value="Number" readonly>'
        + '</div>'
        + '<div class="col-sm-7">'
        + ' <div class="selectWrapper">'
        + '<select name="rocket_id[]" class="form-control bankpayment" id="rocket_id_' + sl + '">'
        + rocket_list

        + '</select>'
        + '</div>'
        + ' </div>'
        + '</div>'
        + '</div>'
        + '</div>'
        + '<div class="row margin-top10  m-0" id="card_div_' + sl + '"  style="display:none;">'
        + ' <div class="col-sm-12">'
        + ' <div class="form-group row">'
        + ' <div class="col-sm-3 ">'
        + '  <input  class="form-control  box " value="Number" readonly>'
        + '</div>'
        + '<div class="col-sm-7">'
        + ' <div class="selectWrapper">'
        + '<select name="card_id[]" class="form-control bankpayment" id="card_id_' + sl + '">'
        + card_list

        + '</select>'
        + '</div>'
        + ' </div>'
        + '</div>'
        + '</div>'
        + ' </div>'
        + '</div>'
        + '</div>'
        + '</div>'

        + '</div>'

        + '</div>'



        + '</div>'

        + '</div>'




        + '</div>'

        + '</div>'

















    );
    count.val(sl + 1);
}


'use strict';
function delete_row(e) {
    e.closest('.row_div').remove();
}

function condition_charge(val) {



    if (val == 1) {

        $('#condition_tr').removeClass('d-none')
        $('#payment_div').addClass('d-none')
    }

    if (val == 2) {

        $('#condition_tr').removeClass('d-none')
        $('#payment_div').removeClass('d-none')
    }

    if (val == 3) {

        $('#condition_tr').addClass('d-none')
        $('#payment_div').removeClass('d-none')
    }



}

"use strict";
function bank_paymet(val, sl) {

    if (val == 2 || 3 || 4 || 5 || 6 || 7) {

        if (val == 2) {
            var style = 'block';
            document.getElementById('bank_id_' + sl).setAttribute("required", true);
            document.getElementById('ammnt_' + sl).style.display = 'none';
        } else {
            var style = 'none';
            document.getElementById('bank_id_' + sl).removeAttribute("required");
            document.getElementById('ammnt_' + sl).style.display = 'block';
        }

        document.getElementById('bank_div_' + sl).style.display = style;

        if (val == 3) {
            var style = 'block';
            document.getElementById('bkash_id_' + sl).setAttribute("required", true);

        } else {
            var style = 'none';
            document.getElementById('bkash_id_' + sl).removeAttribute("required");

        }

        document.getElementById('bkash_div_' + sl).style.display = style;


        if (val == 4) {
            var style = 'block';
            document.getElementById('bank_id_m_' + sl).setAttribute("required", true);
        } else {
            var style = 'none';
            document.getElementById('bank_id_m_' + sl).removeAttribute("required");
        }

        document.getElementById('bank_div_m_' + sl).style.display = style;

        if (val == 5) {
            var style = 'block';
            document.getElementById('nagad_id_' + sl).setAttribute("required", true);
        } else {
            var style = 'none';
            document.getElementById('nagad_id_' + sl).removeAttribute("required");
        }

        document.getElementById('nagad_div_' + sl).style.display = style;

        if (val == 7) {
            var style = 'block';
            document.getElementById('rocket_id_' + sl).setAttribute("required", true);
        } else {
            var style = 'none';
            document.getElementById('rocket_id_' + sl).removeAttribute("required");
        }

        document.getElementById('rocket_div_' + sl).style.display = style;

        if (val == 6) {
            var style = 'block';
            document.getElementById('card_id_' + sl).setAttribute("required", true);
        } else {
            var style = 'none';
            document.getElementById('card_id_' + sl).removeAttribute("required");
        }

        document.getElementById('card_div_' + sl).style.display = style;




    }



}


"use strict"
function calc_paid() {
    var pt = 0;

    var paid_amount = (parseFloat($("#paid_amount").val()) ? parseFloat($("#paid_amount").val()) : 0);

    $(".p_amount").each(function () {
        isNaN(this.value) || 0 == this.value.length || (pt += parseFloat(this.value))
    });

    $("#paidAmount").val((paid_amount + pt).toFixed(2, 2));
    invoice_paidamount();
}


//Invoice full paid
"use strict";
function full_paid() {
    var grandTotal = $("#n_total").val();
    $("#paidAmount").val(grandTotal);
    $("#cash_1").val(grandTotal);
    $("#cash_field").val(grandTotal);
    invoice_paidamount();
    calculateSum();
}

//Delete a row of table
"use strict";
function deleteRow(t) {
    var a = $("#addinvoice > tbody > tr").length;
    //    alert(a);
    if (1 == a)
        alert("There only one row you can't delete.");
    else {
        var e = t.parentNode.parentNode;
        e.parentNode.removeChild(e),
            calculateSum();
        invoice_paidamount();
        var current = 1;
        $("#addinvoice > tbody > tr td input.productSelection").each(function () {
            current++;
            $(this).attr('id', 'product_name' + current);
        });
        var common_qnt = 1;
        $("#addinvoice > tbody > tr td input.common_qnt").each(function () {
            common_qnt++;
            $(this).attr('id', 'total_qntt_' + common_qnt);
            $(this).attr('onkeyup', 'quantity_calculate(' + common_qnt + ');');
            $(this).attr('onchange', 'quantity_calculate(' + common_qnt + ');');
        });
        var common_rate = 1;
        $("#addinvoice > tbody > tr td input.common_rate").each(function () {
            common_rate++;
            $(this).attr('id', 'price_item_' + common_rate);
            $(this).attr('onkeyup', 'quantity_calculate(' + common_qnt + ');');
            $(this).attr('onchange', 'quantity_calculate(' + common_qnt + ');');
        });
        var common_discount = 1;
        $("#addinvoice > tbody > tr td input.common_discount").each(function () {
            common_discount++;
            $(this).attr('id', 'discount_' + common_discount);
            $(this).attr('onkeyup', 'quantity_calculate(' + common_qnt + ');');
            $(this).attr('onchange', 'quantity_calculate(' + common_qnt + ');');
        });
        var common_total_price = 1;
        $("#addinvoice > tbody > tr td input.common_total_price").each(function () {
            common_total_price++;
            $(this).attr('id', 'total_price_' + common_total_price);
        });




    }
}

"use strict";
function customer_autocomplete(sl) {





    var customer_id = $('#customer_id').val();

    // Auto complete
    var options = {
        minLength: 0,
        source: function (request, response) {
            var customer_name = $('#customer_name').val();
            var csrf_test_name = $('[name="csrf_test_name"]').val();
            var base_url = $("#base_url").val();
            var sale_type = $('#sel_type').val();


            $.ajax({
                url: base_url + "Cinvoice/customer_autocomplete",
                method: 'post',
                dataType: "json",
                data: {
                    term: request.term,
                    customer_id: customer_name,
                    sale_type: sale_type,
                    csrf_test_name: csrf_test_name,
                },
                success: function (data) {
                    response(data);

                }
            });
        },
        focus: function (event, ui) {
            $(this).val(ui.item.label);
            return false;
        },
        select: function (event, ui) {
            $(this).parent().parent().find("#autocomplete_customer_id").val(ui.item.value.id);
            $("#customer_mobile_two").val(ui.item.value.mobile);
            var customer_id = ui.item.value.id;

            customer_due(customer_id);

            $(this).unbind("change");
            return false;
        }
    }

    $('body').on('keypress.autocomplete', '#customer_name', function () {
        $(this).autocomplete(options);
    });

}
var count = 2,
    limits = 500;


"use strict";
function customer_due(id) {
    if (id == 1) {
        $('#add_invoice').attr('disabled', '');
    }
    else {
        $('#add_invoice').removeAttr('disabled');
    }
    var csrf_test_name = $('[name="csrf_test_name"]').val();
    var base_url = $("#base_url").val();
    $.ajax({
        url: base_url + 'Cinvoice/previous',
        type: 'post',
        data: { customer_id: id, csrf_test_name: csrf_test_name },
        success: function (msg) {

            //console.log(msg)

            $("#previous").val(msg);
            // $("#previous").val(0);
        },
        error: function (xhr, desc, err) {
            alert('failed');
        }
    });
}

$(document).ready(function () {
    "use strict";

    $('#full_paid_tab').keydown(function (event) {
        if (event.keyCode == 13) {
            $('#add_invoice').trigger('click');
        }
    });
});


$(document).ready(function () {
    "use strict";

    var frm = $("#gui_sale_insert");
    var output = $("#output");
    frm.on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            // dataType : 'json',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.status == true) {
                    output.empty().html(data.message).addClass('alert-success').removeClass('alert-danger').removeClass('hide');
                    $("#inv_id").val(data.invoice_id);
                    $('#printconfirmodal').modal('show');
                    if (data.status == true && event.keyCode == 13) {
                    }
                } else {
                    output.empty().html(data.exception).addClass('alert-danger').removeClass('alert-success').removeClass('hide');
                }
            },
            error: function (xhr) {
                alert('failed!');
            }
        });
    });
});

$("#printconfirmodal").on('keydown', function (e) {
    var key = e.which || e.keyCode;
    if (key == 13) {
        $('#yes').trigger('click');
    }
});



"use strict";

function add_customer() {

    var name = $('#customer_name').val();

    if ($.isNumeric(name) == true) {
        $('#mobile').val(name);
    } else {
        $('#m_customer_name').val(name);
    }



}

"use strict";
function onselectimage(id) {

    var stock = $("#stock_" + id).val();

    if (parseInt(stock) > 0) {
        var product_id = id;
        var base_url = $('#base_url').val();
        var csrf_test_name = $('[name="csrf_test_name"]').val();
        var exist = $("#SchoolHiddenId_" + product_id).val();
        var qty = $("#total_qntt_" + product_id).val();
        var add_qty = parseInt(qty) + 1;
        var outlet_id = $("#outlet_name").val();
        if (product_id == exist) {
            $("#total_qntt_" + product_id).val(add_qty);
            quantity_calculate(product_id);
            calculateSum();
            invoice_paidamount();
            document.getElementById('add_item').value = '';
            document.getElementById('add_item').focus();
        } else {
            $.ajax({
                type: "post",
                async: false,
                url: base_url + 'Cinvoice/gui_pos_invoice',
                data: {
                    outlet_id: outlet_id,
                    product_id: product_id,
                    csrf_test_name: csrf_test_name
                },
                success: function (data) {
                    console.log(data)
                    if (data == false) {
                        alert('This Product Not Found !');
                        document.getElementById('add_item_m').value = '';
                        document.getElementById('add_item_m').focus();
                        quantity_calculate(product_id);
                        calculateSum();
                        invoice_paidamount();
                    } else {

                        document.getElementById('add_item_m').value = '';
                        document.getElementById('add_item_m').focus();
                        $('#addinvoice tbody').append(data);
                        quantity_calculate(product_id);
                        calculateSum();
                        invoice_paidamount();
                        setTimeout(function () {
                            $("#hidden_tr").css("display", "none");
                        }, 1000);
                    }
                },
                error: function () {
                    alert('Request Failed, Please check your code and try again!');
                }
            });
        }

    } else {

        toastr.error('Not Available quantity for sale!')
    }



}



"use strict";
$('body').on('keyup', '#product_name', function () {
    var product_name = $(this).val();
    var csrf_test_name = $('[name="csrf_test_name"]').val();
    // var category_id = $('#category_id').val();
    var myurl = $('#posurl').val();
    $.ajax({
        type: "post",
        async: false,
        url: myurl,
        data: {
            product_name: product_name,
            csrf_test_name: csrf_test_name
        },
        success: function (data) {
            if (data == '420') {
                $("#product_search").html('<h1 class"srcalrt">Product not found !</h1>');
            } else {
                $("#product_search").html(data);
            }
        },
        error: function () {
            alert('Request Failed, Please check your code and try again!');
        }
    });
});

$('body').on('change', '#category_id', function () {
    var base_url = $('#base_url').val();
    var csrf_test_name = $('[name="csrf_test_name"]').val();
    var product_name = $('#product_name').val();
    var category_id = $('#category_id').val();
    var myurl = $('#posurl').val();
    $.ajax({
        type: "post",
        async: false,
        url: myurl,
        data: { product_name: product_name, category_id: category_id, csrf_test_name: csrf_test_name },
        success: function (data) {
            if (data == '420') {
                $("#product_search").html(data);
            } else {
                $("#product_search").html(data);
            }
        },
        error: function () {
            alert('Request Failed, Please check your code and try again!');
        }
    });
});

$('body').on('click', '#search_button', function () {
    var product_name = $('#product_name').val();
    var csrf_test_name = $('[name="csrf_test_name"]').val();
    var category_id = $('#category_id').val();
    var myurl = $('#posurl').val();
    $.ajax({
        type: "post",
        async: false,
        url: myurl,
        data: { product_name: product_name, category_id: category_id, csrf_test_name: csrf_test_name },
        success: function (data) {
            if (data == '420') {
                $("#product_search").html('<h1 class"srcalrt text-center">Product not found !</h1>');
            } else {
                $("#product_search").html(data);
            }
        },
        error: function () {
            alert('Request Failed, Please check your code and try again!');
        }
    });
});



"use strict";
function detailsmodal(productname, stock, model, unit, price, image) {
    $("#detailsmodal").modal('show');
    var base_url = document.getElementById("baseurl").value;
    document.getElementById("modal_productname").innerHTML = productname;
    document.getElementById("modal_productstock").innerHTML = stock;
    document.getElementById("modal_productmodel").innerHTML = model;
    document.getElementById("modal_productunit").innerHTML = unit;
    document.getElementById("modal_productprice").innerHTML = price;
    document.getElementById("modalimg").innerHTML = '<img src="' + image + '" alt="image" style="width:100px; height:60px;" />';
}


"use strict";

function add_customer() {

    var name = $('#customer_name').val();

    if ($.isNumeric(name) == true) {
        $('#mobile').val(name);
    } else {
        $('#m_customer_name').val(name);
    }



}

$(document).ready(function () {
    "use strict";
    var allowSubmit = false;
    $("#newcustomer").submit(function (e) {
        if (!allowSubmit) {
            e.preventDefault();
        }
        var customeMessage = $("#customeMessage");
        var customer_id = $("#autocomplete_customer_id");
        var customer_name = $("#customer_name");
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            dataType: 'json',
            data: $(this).serialize(),
            beforeSend: function () {
                customeMessage.removeClass('hide');

            },
            success: function (data) {
                if (data.status == true) {
                    toastr.success(data.message)
                    //customeMessage.addClass('alert-success').removeClass('alert-danger').html(data.message);
                    customer_id.val(data.customer_id);
                    customer_name.val(data.customer_name);
                    $("#cust_info").modal('hide');
                } else {
                    //customeMessage.addClass('alert-danger').removeClass('alert-success').html(data.error_message);
                    toastr.error(data.error_message)
                }
            },
            error: function (xhr) {
                toastr.error('Failed! Something went wrong..!')
            }

        });

    });
});

$(document).on('click', '.taxbutton', function (e) {
    var $this = $(this);
    var icon = $this.find('i');
    if (icon.hasClass('fa fa-angle-double-up')) {
        $this.find('i').removeClass('fa fa-angle-double-up').addClass('fa fa-angle-double-down');
    } else {
        $this.find('i').removeClass('fa fa-angle-double-down').addClass('fa fa-angle-double-up');
    }
});

$(document).ready(function () {
    $(".paymentpart").click(function () {

        var $header = $(this);
        var $content = $header.next();
        $content.slideToggle(500, function () {
            $header.html(function () {
                return $content.is(":visible") ? "<span  class='btn btn-warning'><i class='fa fa-angle-double-down'></i></span>" : "<span  class='btn btn-warning'><i class='fa fa-angle-double-up'></i></span>";
            });
        });

    });
});


"use strict";
function bank_info_show(payment_type) {
    if (payment_type.value == "1") {
        document.getElementById("bank_info_hide").style.display = "none";
    } else {
        document.getElementById("bank_info_hide").style.display = "block";
    }
}

"use strict";
function active_customer(status) {
    if (status == "payment_from_2") {
        document.getElementById("payment_from_2").style.display = "none";
        document.getElementById("payment_from_1").style.display = "block";
        document.getElementById("myRadioButton_2").checked = false;
        document.getElementById("myRadioButton_1").checked = true;
    } else {
        document.getElementById("payment_from_1").style.display = "none";
        document.getElementById("payment_from_2").style.display = "block";
        document.getElementById("myRadioButton_2").checked = false;
        document.getElementById("myRadioButton_1").checked = true;
    }
}


$(document).ready(function () {
    "use strict";
    $('#addinvoice .toggle').on('click', function () {
        $('#addinvoice .hideableRow').toggleClass('hiddenRow');
    })
    $(".bankpayment").css("width", "100%");
});





"use strict";
function delivery_type(val) {


    if (val == 2) {
        var style = 'block';
        $('.hidden_tr').removeClass('d-none');

    } else {
        var style = 'none';
        $('.hidden_tr').addClass('d-none');

    }

    document.getElementById('courier_div').style.display = style;



}


/*pos invoice part*/


// $(document).ready(function () {
//     "use strict";
//     var frm = $("#pos_sale_insert");
//     var output = $("#output");
//     $(frm).keydown(function (event) {
//         if (event.keyCode == 13) {
//             event.preventDefault();
//             return false;
//         }
//     });
//     frm.on('submit', function (e) {
//         e.preventDefault();
//         $(".page-loader-wrapper").css('display', 'block');

//         //    var formData = new FormData(this);
//         $.ajax({
//             url: $(this).attr('action'),
//             method: $(this).attr('method'),
//             // dataType : 'json',
//             data: new FormData(this),
//             processData: false,
//             contentType: false,
//             success: function (d) {
//                 var data = JSON.parse(d);

//                 console.log(data);
//                 $(".page-loader-wrapper").css('display', 'none');


//                 if (data.status == true) {
//                     output.empty().html(data.message).addClass('alert-success').removeClass('alert-danger').removeClass('hide');

//                     $("#inv_id").val(data.invoice_id);
//                     $("#add_invoice").attr("disabled", true);
//                     $('#printconfirmodal').modal('show');

//                     if (data.status == true && event.keyCode == 13) {
//                     }
//                 } else {
//                     output.empty().html(data.exception).addClass('alert-danger').removeClass('alert-success').removeClass('hide');
//                 }
//             },
//             error: function (xhr) {
//                 $(".page-loader-wrapper").css('display', 'none');

//                 alert('failed!');
//             }
//         });
//     });
// });

$("#printconfirmodal").on('keydown', function (e) {
    var key = e.which || e.keyCode;
    if (key == 13) {
        $('#yes').trigger('click');
    }
});



function cancelprint() {
    location.reload();
}


"use strict";
function invoice_productList(sl) {
    var csrf_test_name = $('[name="csrf_test_name"]').val();
    var base_url = $("#base_url").val();
    var priceClass = 'price_item' + sl;
    var total_vat_permission = $("#total_vat_permission").val();
    var total_tax_permission = $("#total_tax_permission").val();

    var available_quantity = 'available_quantity_' + sl;
    var unit = 'unit_' + sl;
    var tax = 'total_tax_' + sl;
    var serial_no = 'serial_no_' + sl;
    var total_price = 'total_price_' + sl;
    var discount_type = 'discount_type_' + sl;
    var total_price_wd = 'total_price_wd_' + sl;
    var purchase_price = 'purchase_price_' + sl;
    var tax2 = 'tax_' + sl;
    var vat = 'vat_' + sl;
    var tax_percent = 'tax_percent_' + sl;
    var vat_percent = 'vat_percent_' + sl;
    var qnty = 'total_qntt_' + sl;

    // Auto complete
    var options = {
        minLength: 0,
        source: function (request, response) {
            var product_name = $('#product_name_' + sl).val();
            $.ajax({
                url: base_url + "Cinvoice/autocompleteproductsearch",
                method: 'post',
                dataType: "json",
                data: {
                    term: request.term,
                    product_name: product_name,
                    pr_status: 1,
                    csrf_test_name: csrf_test_name,
                },
                success: function (data) {
                    response(data);

                }
            });
        },
        focus: function (event, ui) {
            $(this).val(ui.item.label);
            return false;
        },
        select: function (event, ui) {
            $(this).parent().parent().find(".autocomplete_hidden_value").val(ui.item.value);
            $(this).val(ui.item.label);
            // var sl = $(this).parent().parent().find(".sl").val();
            var id = ui.item.value;
            var dataString = 'product_id=' + id;
            var base_url = $('.baseUrl').val();
            var outlet_id = $("#outlet_name").val();

            $.ajax
                ({
                    type: "POST",
                    url: base_url + "Cinvoice/retrieve_product_data_inv",
                    data: {
                        product_id: id,
                        outlet_id: outlet_id,
                        csrf_test_name: csrf_test_name
                    },
                    cache: false,
                    success: function (data) {
                        var obj = jQuery.parseJSON(data);
                        // console.log(obj);
                        for (var i = 0; i < (obj.txnmber); i++) {
                            var txam = obj.taxdta[i];
                            var txclass = 'total_tax' + i + '_' + sl;
                            $('.' + txclass).val(obj.taxdta[i]);
                        }
                        $('.' + priceClass).val(obj.price);
                        $('#' + purchase_price).html('৳' + obj.purchase_price);

                        $('#' + total_price).val(obj.purchase_price);
                        $('#' + total_price_wd).val(obj.purchase_price);
                        $('.' + available_quantity).val(obj.stock);
                        $('.' + unit).val(obj.unit);
                        $('.' + tax).val(obj.tax);
                        $('.' + qnty).val(1);
                        $('.' + tax2).val(obj.tax);
                        $('.' + vat).val(obj.vat);
                        $('.' + tax_percent).val(parseFloat(obj.tax_percent));
                        $('.' + vat_percent).val(parseFloat(obj.vat_percent));
                        $('#txfieldnum').val(obj.txnmber);
                        $('#' + serial_no).html(obj.serial);
                        $('#' + discount_type).val(obj.discount_type);
                        // $("#stock_"+sl).val(obj.stock);
                        // Check Permisson of Vat And Tax
                        if(total_vat_permission == 'disable')
                        {
                            $('.' + vat_percent).val(0);
                            $('.' + vat).val(0);
                        }
                        if(total_tax_permission == 'disable')
                        {
                            $('.' + tax_percent).val(0);
                            $('.' + tax).val(0);
                            $('.' + tax2).val(0);
                        }
                        //This Function Stay on others.js page
                        quantity_calculate(sl);

                    }
                });

            $(this).unbind("change");
            return false;
        }
    }

    $('body').on('keypress.autocomplete', '.productSelection', function () {
        $(this).autocomplete(options);
    });

}



window.onload = function () {
    $('body').addClass("sidebar-mini sidebar-collapse");
};

function receiver_changed(e) {
    var id = e.value;
    // console.log(e);
    var num_div = $("#receiver_num_div");
    var num_inp = $("#del_rec_num");
    var base_url = $('.baseUrl').val();
    var csrf_test_name = $('[name="csrf_test_name"]').val();
    // console.log(id);
    $.ajax({
        url: base_url + 'Cinvoice/get_receiver_num',
        type: 'post',
        data: {
            rec_id: id,
            csrf_test_name: csrf_test_name
        },
        success: function (msg) {

            num_div.css('display', 'block');
            num_inp.val(msg);

        },
        error: function (xhr, desc, err) {
            alert('failed');
        }
    });
}

function get_product(cat_id) {

    var base_url = $('.baseUrl').val();
    var csrf_test_name = $('[name="csrf_test_name"]').val();
    $.ajax({
        type: "post",
        async: false,
        url: base_url + 'Cinvoice/get_cat_wise_product',
        data: {
            category_id: cat_id,
            csrf_test_name: csrf_test_name
        },
        success: function (data) {
            $('#style-3').html(data);
            console.log(data)

        },
        error: function () {
            alert('Request Failed, Please check your code and try again!');
        }
    });
}

function add_qty(id) {



    var quantity = parseInt($('#total_qntt_' + id).val());

    $('#total_qntt_' + id).val(quantity + 1);
    quantity_calculate(id);


}

function reduce_qty(id) {



    var quantity = parseInt($('#total_qntt_' + id).val());

    // var last_qty = $('#total_qntt_'+id).val(quantity - 1);

    if ((quantity - 1) < 1) {
        toastr.error('You have to buy minimum 1 quantity!')
    } else {
        $('#total_qntt_' + id).val(quantity - 1);
        quantity_calculate(id);
    }


}