"use strict";
function checkboxcheck(sl) {
  var check_id = "check_id_" + sl;
  var total_qntt = "total_return_qntt_" + sl;
  var product_rate = "price_item_" + sl;
  var product_rate_total = "total_rate_return_" + sl;
  var product_id = "product_id_" + sl;
  var total_price = "total_price_return_" + sl;
  var discount_per_return = "discount_per_return_" + sl;
  var distributed_discount_return = "distributed_discount_return_" + sl;
  var item_total_discount_return = "item_total_discount_return_" + sl;
  var item_total_discounted_price_wd_return = "item_total_discounted_price_wd_return_" + sl;
  var vat_return = "vat_return_" + sl;
  var tax_return = "tax_return_" + sl;


  if ($("#" + check_id).prop("checked") == true) {
    document.getElementById(total_qntt).setAttribute("required", "required");
    document.getElementById(product_rate).setAttribute("name", "product_rate[]");
    document.getElementById(product_rate_total).setAttribute("name", "total_rate_return[]");
    document.getElementById(product_id).setAttribute("name", "product_id[]");
    document.getElementById(total_qntt).setAttribute("name", "total_return_qntt[]");
    document.getElementById(total_price).setAttribute("name", "total_price_return[]");
    // document.getElementById(discount).setAttribute("name", "discount[]");
    document.getElementById(discount_per_return).setAttribute("name", "discount_per_return[]");
    document.getElementById(distributed_discount_return).setAttribute("name", "distributed_discount_return[]");
    document.getElementById(item_total_discount_return).setAttribute("name", "item_total_discount_return[]");
    document.getElementById(item_total_discounted_price_wd_return).setAttribute("name", "item_total_discounted_price_wd_return[]");
    document.getElementById(vat_return).setAttribute("name", "vat_return[]");
    document.getElementById(tax_return).setAttribute("name", "tax_return[]");
  } else if ($("#" + check_id).prop("checked") == false) {
    document.getElementById(total_qntt).removeAttribute("required");
    document.getElementById(product_rate).removeAttribute("name", "");
    document.getElementById(product_rate_total).removeAttribute("name", "");
    document.getElementById(product_id).removeAttribute("name", "");
    document.getElementById(total_qntt).removeAttribute("name", "");
    document.getElementById(total_price).removeAttribute("name", "");
    // document.getElementById(discount).setAttribute("name", "");
    document.getElementById(discount_per_return).removeAttribute("name", "");
    document.getElementById(distributed_discount_return).removeAttribute("name", "");
    document.getElementById(item_total_discount_return).removeAttribute("name", "");
    document.getElementById(item_total_discounted_price_wd_return).removeAttribute("name", "");
    document.getElementById(vat_return).removeAttribute("name", "");
    document.getElementById(tax_return).removeAttribute("name", "");
  }
}
function addInputField(t) {

  var row = $("#normalinvoice tbody tr").length;
  var count = row + 1;
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
    alert("You have reached the limit of adding " + count + " inputs");
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
    e.innerHTML = "<td><input type='text' name='product_name' onkeypress='invoice_productList(" + count + ");' class='form-control productSelection common_product' placeholder='Product Name' id='" + a + "' required tabindex='" + tab1 + "'><input type='hidden' class='common_product autocomplete_hidden_value  product_id_" + count + "' name='re_product_id[]' id='SchoolHiddenId'/></td>" +
      "<td><input type='text'  class='form-control text-right  re_available_quantity_" + count + "' value='' readonly></td>" +
      " <td><input type='hidden' name='re_available_quantity[]' id='' class='form-control text-right common_avail_qnt re_available_quantity_" + count + "' value='0' readonly='readonly' /><input class='form-control text-right common_name re_unit_" + count + " valid' value='None' readonly='' aria-invalid='false' type='text'></td>" +
      "<td> <input type='text' name='re_product_quantity[]' value='1' required='required' onkeyup='quantity_calculate_re(" + count + ");' onchange='quantity_calculate_re(" + count + ");' id='re_total_qntt_" + count + "' class='common_qnt re_total_qntt_" + count + " form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab3 + "'/>" +
      "</td>"
      +
      "<td class='text-center'><input type='text' name='re_product_rate[]' id='re_price_item_" + count + "' class='re_price_item_" + count + " re_price_item form-control text-right' required= '' value='0.00' readonly placeholder='0.00' min='0' /></td >" + "<td class='text-center'><input type='text' name='re_total_price[]' id= 're_total_price_" + count + "' class='re_total_price_" + count + " re_total_price form-control text-right' required = '' readonly value = '0.00' placeholder = '0.00' min = '0' /><input type= 'hidden' name='re_total_discounted_price_wd[]' id='re_total_discounted_price_wd_" + count + "' class='re_total_discounted_price_wd_" + count + " re_total_discounted_price_wd form-control text-right' value='0.00' required='' readonly placeholder='0.00' min='0' /><input type='hidden' name='re_vat[]' id='re_vat_" + count + "' class='re_vat_" + count + " re_vat form-control text-right' readonly placeholder='0.00' value='0.00' min='0' /><input type='hidden' name='re_vat_percent[]' id='re_vat_percent_" + count + "' class='re_vat_percent_" + count + " re_vat_percent form-control text-right' readonly placeholder='0.00' value='0.00' min='0' /><input type='hidden' name='re_tax[]' id='re_tax_" + count + "' class='re_tax_" + count + " re_tax form-control text-right' readonly value='0.00' placeholder='0.00' min='0' /><input type='hidden' name='re_tax_percent[]' id='re_tax_percent_" + count + "' class='re_tax_percent_" + count + " re_tax_percent form-control text-right' readonly value='0.00' placeholder='0.00' min='0' /></td >" +
      "<td class='text-center'><input type='text' name='re_discount[]' onkeyup='quantity_calculate_re(" + count + ");' onchange='quantity_calculate_re(" + count + ");' id='re_discount_" + count + "' class='form-control text-right' min='0' value='0.00' placeholder='0.00' /><input type='hidden' name='re_distributed_discount[]' id='re_distributed_discount_" + count + "' class='form-control text-right' min='0' value='0.00' placeholder='0.00' readonly /><input type='hidden' name='re_item_total_discount[]' id='re_item_total_discount_" + count + "' class='form-control text-right' min='0' value='0.00' placeholder='0.00' readonly /></td>" +
      "<td><input class='re_total_price_wd form-control text-right' type='text' name='re_total_price_wd[]' id='re_total_price_wd_" + count + "' value='0.00' readonly='readonly' /><input type='hidden' value='' name='re_discount_type' id='re_discount_type_" + count + "'></td>" +
      "<td><button style='text-align: right;' class='btn btn-danger' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-close'></i></button></td>",
    document.getElementById(t).appendChild(e),
      document.getElementById(a).focus(),
      document.getElementById("add_invoice_item").setAttribute("tabindex", tab6);
    document.getElementById("re_details").setAttribute("tabindex", tab7);
    document.getElementById("re_invoice_discount").setAttribute("tabindex", tab8);
    document.getElementById("re_shipping_cost").setAttribute("tabindex", tab9);
    document.getElementById("re_paidAmount").setAttribute("tabindex", tab10);
    // document.getElementById("full_paid_tab").setAttribute("tabindex", tab11);
    document.getElementById("add_invoice").setAttribute("tabindex", tab12);
    var commision_type = $('#commission_type').val()

    if (commision_type == 1) {
      $('.comm_th').removeClass('d-none')
      $('.comm_th').addClass('d-inline')

    }

    if (commision_type == 2) {
      $('.comm_th').removeClass('d-inline')
      $('.comm_th').addClass('d-none')
    }

    count++
  }
}
"use strict";
function quantity_calculate_re(item) {
  var quantity = $("#re_total_qntt_" + item).val();
  var available_quantity = $(".re_available_quantity_" + item).val();
  if (available_quantity <= 0) {
        toastr.error('Not available quantity for sale !!')
        return
    }
  var price_item = Number($("#re_price_item_" + item).val());
  var discount = $("#re_discount_" + item).val();
  // var distributed_discount = $("#re_distributed_discount_" + item).val();
  // var total_discount = Number(discount) + Number(distributed_discount);



  //var comm_item = $("#comm_" + item).val();
  var taxnumber = $("#txfieldnum").val();
  var dis_type = $("#discount_type_" + item).val();
  if (Number(quantity) > Number(available_quantity)) {
    var message = "You can Sale maximum " + available_quantity + " Items";
    alert(message);
    $("#re_total_qntt_" + item).val('');
    var quantity = 0;
    $("#re_total_price_" + item).val(0);
    for (var i = 0; i < taxnumber; i++) {
      $("#re_all_tax" + i + "_" + item).val(0);
      quantity_calculate_re(item);
    }

  }

  var just_tot = quantity * price_item;

  // var total_discounted_price_wd = just_tot - total_discount;

    var row_tot = ((just_tot) - discount);

    $("#re_total_price_" + item).val(just_tot.toFixed(2));
    

    // $("#re_item_total_discount_" + item).val(total_discount);
    // $("#re_total_discounted_price_wd_" + item).val(total_discounted_price_wd);

    // $("#re_total_discount_" + item).val(discount);
    $("#re_total_price_wd_" + item).val(row_tot.toFixed(2, 2));

    calculateSum();
    invoice_paidamount();
}

"use strict";
function calculateSum() {
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
    cc = 0,
    vat = 0,
    tax = 0,
    tdpw = 0,

    s_cost = ($("#re_shipping_cost").val() ? $("#re_shipping_cost").val() : 0),
    c_cost = ($("#re_condition_cost").val() ? $("#re_condition_cost").val() : 0),
    service_charge = ($("#re_service_charge").val() ? $("#re_service_charge").val() : 0),

    commission = ($("#re_commission").val() ? $("#re_commission").val() : 0),
    perc_discount = ($("#re_perc_discount").val() ? $("#re_perc_discount").val() : 0);



  $(".re_vat").each(function () {
    isNaN(this.value) || 0 == this.value.length || (vat += parseFloat(this.value))
  }),
    $(".re_tax").each(function () {
      isNaN(this.value) || 0 == this.value.length || (tax += parseFloat(this.value))
    }),



    $(".re_total_discount").each(function () {
      isNaN(this.value) || 0 == this.value.length || (p += parseFloat(this.value))
    }),
    $("#re_total_discount_ammount").val(p.toFixed(2, 2)),

    $(".re_totalTax").each(function () {
      isNaN(this.value) || 0 == this.value.length || (f += parseFloat(this.value))
    }),
    $("#re_dc").val(f.toFixed(2, 2)),

    //Total Price
    $(".re_total_price").each(function () {
      isNaN(this.value) || 0 == this.value.length || (t += parseFloat(this.value))
    }),
    $(".re_total_price_wd").each(function () {
      isNaN(this.value) || 0 == this.value.length || (x += parseFloat(this.value))
    }),

    $(".dppr").each(function () {
      isNaN(this.value) || 0 == this.value.length || (ad += parseFloat(this.value))
    }),

    $(".re_total_comm").each(function () {
      isNaN(this.value) || 0 == this.value.length || (cc += parseFloat(this.value))
    }),

    o = a.toFixed(2, 2),
    e = t.toFixed(2, 2),
    tx = f.toFixed(2, 2),
    //ds = p.toFixed(2, 2);
    ds = $("#invoice_discount").val();
  var pds = +(x) * (perc_discount / 100);


  var total_discount_ammount = $("#re_total_discount_ammount").val();
  var ttl_discount = parseFloat(total_discount_ammount) + pds;
  //var ttl_cms = +commission;
  $("#re_sub_total").val(x.toFixed(2, 2));
  $("#re_total_discount_ammount").val(ttl_discount.toFixed(2, 2));


  $(".re_total_price_wd").each(function () {
        var str = this.id;


        var newStr = str.replace("re_total_price_wd_", "");
        var main_discounted_price = this.value;
        var distributed_discount = ((ttl_discount / x) * main_discounted_price);
        $("#re_distributed_discount_" + newStr).val(distributed_discount);

        var item_discount = $("#re_discount_" + newStr).val();
        var total_price_wd = $("#re_total_price_" + newStr).val();

        var item_total_discount = Number(item_discount) + distributed_discount;

        var total_discounted_price_wd = total_price_wd - item_total_discount;

        $("#re_item_total_discount_" + newStr).val(item_total_discount);

        $("#re_total_discounted_price_wd_" + newStr).val(total_discounted_price_wd);

        var tax_percent = $("#re_tax_percent_" + newStr).val();
        var vat_percent = $("#re_vat_percent_" + newStr).val();
        $("#re_tax_" + newStr).val(((tax_percent * (total_discounted_price_wd)) / 100).toFixed(2));
        $("#re_vat_" + newStr).val(((vat_percent * (total_discounted_price_wd)) / 100).toFixed(2));

        // console.log(tax_percent, vat_percent);  
        isNaN(this.value) || 0 == this.value.length || (tdpw += parseFloat(this.value))
    });

  var total_price_with_total_discount = tdpw - ttl_discount;

  $("#re_sku_total_price_with_discount").val(total_price_with_total_discount.toFixed(2, 2));


  $("#re_total_vat").val(vat.toFixed(2));
  $("#re_total_tax").val(tax.toFixed(2));
  //ds =+(t) * (perc_discount / 100);

  //console.log(discount_perc);

  // var test = +tx + +s_cost + +service_charge + +t + -ttl_discount + + ad - commission;
  // var test2 = +tx + +s_cost + +t + -ttl_discount + + ad;

  var test = total_price_with_total_discount + vat + tax;
  var test2 = total_price_with_total_discount + vat + tax;

  if (c_cost == undefined || commission == undefined) {
    $("#re_grandTotal").val(test2.toFixed(2, 2));
  } else {
    $("#re_grandTotal").val(test.toFixed(2, 2));
  }

  var gt = parseFloat($("#re_grandTotal").val());
  //var invdis = $("#invoice_discount").val();
  var x = parseFloat($("#total_refund").val());

  // var grnt_totals = gt;

  var grnt_totals = gt;
  var grnt_totals_ref = gt + x;
  invoice_paidamount();
  $("#grandTotal").val(grnt_totals.toFixed(2, 2));

  $("#re_grandTotal").val(grnt_totals_ref.toFixed(2, 2));




}
//Quantity calculat
"use strict";
function quantity_calculate(item) {
  var a = 0,
    o = 0,
    d = 0,
    x = 0,
    y = 0,
    z = 0,
    r = 0,
    cm = 0,
    acm = 0,
    g = 0,
    p = 0;
  var pa_total_price = $("#pa_total_price_" + item).val();
  var sold_qty = $("#sold_qty_" + item).val();
  var quantity = $("#total_qntt_" + item).val();
  var price_item = $("#price_item_" + item).val();
  var discount = $("#discount_" + item).val();
  var disc = $("#dis_" + item).val();


  var add_cost = $("#total_tax_ammount").val() ? $("#total_tax_ammount").val() : 0;



  var vat = $("#vat_" + item).val() ? $("#vat_" + item).val() : 0;
  var tax = $("#tax_" + item).val() ? $("#tax_" + item).val() : 0;
  var comm = $("#comm_" + item).val() ? $("#comm_" + item).val() : 0;

  if (parseInt(sold_qty) < parseInt(quantity)) {
    alert("Sold quantity less than quantity!");
    $("#total_qntt_" + item).val("");
  }
  var price = quantity * price_item;
  var dis = price * (discount / 100);
  var diss = price * (disc / 100);
  var cmss = price * (comm / 100);
  $("#all_discount_" + item).val(diss);
  $("#all_cm_" + item).val(cmss);
  $("#return_val_" + item).val(price);
  $("#cm_return_val_" + item).val(price);
  var ttldis = $("#all_discount_" + item).val();
  var total_d = $("#total_discount_ammount").val();

  $(".return_val").each(function () {
    isNaN(this.value) || r == this.value.length || (r += parseFloat(this.value));
  });

  $(".cm_return_val").each(function () {
    isNaN(this.value) || cm == this.value.length || (cm += parseFloat(this.value));
  });

  $(".total_p").each(function () {
    isNaN(this.value) || g == this.value.length || (g += parseFloat(this.value));
  });
  $(".total_price").each(function () {
    isNaN(this.value) || a == this.value.length || (a += parseFloat(this.value));
  });

  $(".payable").each(function () {
    isNaN(this.value) || x == this.value.length || (x += parseFloat(this.value));
  });
  $(".paya_total").each(function () {
    isNaN(this.value) || y == this.value.length || (y += parseFloat(this.value));
  });

  $(".total_discount").each(function () {
    isNaN(this.value) || d == this.value.length || (d += parseFloat(this.value));
  })
  $(".total_cm").each(function () {
    isNaN(this.value) || acm == this.value.length || (acm += parseFloat(this.value));
  })

  //per sku discount calculation
  var invoice_discount = parseFloat($("#invoice_discount").val());
  var perc_dis = parseFloat($("#perc_discount").val());
  var pds = y * (perc_dis / 100);

  var dis_by_sku = price_item * (disc / 100);
  $("#dis_amount_" + item).val(dis_by_sku);

  $(".dis_amount").each(function () {
    isNaN(this.value) || z == this.value.length || (z += parseFloat(this.value));
  })
  var total = parseFloat($('#total_amount').val());
  var total_discount = parseFloat($('#total_discount_ammount').val());
  var shipping_cost = parseFloat($('#shipping_cost').val()) ? parseFloat($('#shipping_cost').val()) : 0;
  var commission = parseFloat($('#commission').val()) ? parseFloat($('#commission').val()) : 0;
  var total_commission = parseFloat($('#total_commission').val()) ? parseFloat($('#total_commission').val()) : 0;
  var dc = parseFloat($('#dc').val()) ? parseFloat($('#dc').val()) : 0;


  var invoice_value = (total - shipping_cost) + total_discount + commission + total_commission;
  // var c_invoice_value=total+commission+total_commission;




  var sale_cm = commission / invoice_value * r;
  var sku_wise_t_cm = sale_cm + acm;


  var sale_discount = invoice_discount / invoice_value * r;
  var sale_discount_perc = pds / g * a;
  var sku_wise_t_dis = sale_discount + sale_discount_perc + d;



  $('#total_return').val(r);
  $('#sub_total').val(a.toFixed(2, 2));
  // $('#sale_discount_perc').val(sale_discount_perc  .toFixed(2,2));
  $('#sku_discount').val(sku_wise_t_dis.toFixed(2, 2));
  $('#sku_cm').val(sku_wise_t_cm.toFixed(2, 2));



  //Total price calculate per product
  var temp = price - (diss + cmss) + + parseInt(vat) + + parseInt(tax);
  var paya = pa_total_price - temp;
  $("#total_price_" + item).val(temp); //
  $("#payable_" + item).val(paya.toFixed(2, 2)); //





  var sales_return = r - (sku_wise_t_dis + sku_wise_t_cm);
  $("#sale_discount").val(sale_discount.toFixed(2, 2));
  $("#sales_return").val(sales_return.toFixed(2, 2));


  var net_pay = (sku_wise_t_dis + sku_wise_t_cm) - r;
  $("#net_pay").val(net_pay.toFixed(2, 2));
  var paid_amount = parseFloat($("#paid_amount").val());

  var total_refund = total - sales_return - paid_amount;
  $("#customer_ac").val(total_refund.toFixed(2, 2));

  if ($("#pay_person").is(":checked")) {
    var n_total_refund = total_refund - dc;
    $('#adc').addClass('d-none');
  } else {
    var n_total_refund = total_refund;
    $('#adc').removeClass('d-none');
  }

  var rounding = Math.round(n_total_refund) - n_total_refund;
  $("#rounding").val(rounding.toFixed(2, 2));
  $("#total_refund").val(Math.round(n_total_refund).toFixed(2, 2));
  $("#dueAmmount").val(Math.round(n_total_refund).toFixed(2, 2));
  $("#refunded_amt").val(Math.round(n_total_refund).toFixed(2, 2));
  $("#re_dueAmmount").val(Math.round(n_total_refund).toFixed(2, 2));
  if (n_total_refund < 0) {
    $('.hide_tr').removeClass('d-none')
    $('.due_tr').addClass('d-none')
  } else {
    $('.hide_tr').addClass('d-none')
    $('.due_tr').removeClass('d-none')
  }




}



//Quantity calculat new
"use strict";
function quantity_calculate_new(item) {
  var a = 0,
    ddr = 0,
    o = 0,
    d = 0,
    x = 0,
    y = 0,
    z = 0,
    r = 0,
    cm = 0,
    acm = 0,
    g = 0,
    tpr = 0,
    t_vat = 0,
    t_tax = 0,
    p = 0;
  var pa_total_price = $("#pa_total_price_" + item).val();
  var sold_qty = $("#sold_qty_" + item).val();
  var quantity = $("#total_qntt_" + item).val();
  var price_item = $("#price_item_" + item).val();
  var discount = $("#discount_" + item).val();
  var disc = $("#dis_" + item).val();
  
  var total_return_qntt = $("#total_return_qntt_" + item).val();
  if (parseInt(sold_qty) < parseInt(total_return_qntt)) {
    alert("Sold quantity less than quantity!");
    $("#total_return_qntt_" + item).val("");
  }
  var discount_per = $("#discount_per_" + item).val();
  var distributed_discount = $("#distributed_discount_" + item).val();
  var vat = $("#vat_" + item).val();
  var tax = $("#tax_" + item).val();
  


  var total_rate_return = price_item * total_return_qntt;
  var discount_per_return = (total_return_qntt * discount_per) / sold_qty;
  var distributed_discount_return = (total_return_qntt * distributed_discount) / sold_qty;
  var item_total_discount_return = discount_per_return + distributed_discount_return;
  var item_total_discounted_price_wd_return = total_rate_return - item_total_discount_return;
  var vat_return = (total_return_qntt * vat) / sold_qty;
  var tax_return = (total_return_qntt * tax) / sold_qty;
  var total_price_return = total_rate_return - discount_per_return;
  
  $("#total_rate_return_" + item).val(total_rate_return.toFixed(2));
  $("#discount_per_return_" + item).val(discount_per_return);
  $("#distributed_discount_return_" + item).val(distributed_discount_return);
  $("#item_total_discount_return_" + item).val(item_total_discount_return);
  $("#item_total_discounted_price_wd_return_" + item).val(item_total_discounted_price_wd_return);
  $("#vat_return_" + item).val(vat_return);
  $("#tax_return_" + item).val(tax_return);
  $("#total_price_return_" + item).val(total_price_return.toFixed(2));


  var add_cost = $("#total_tax_ammount").val() ? $("#total_tax_ammount").val() : 0;



  var vat = $("#vat_" + item).val() ? $("#vat_" + item).val() : 0;
  var tax = $("#tax_" + item).val() ? $("#tax_" + item).val() : 0;
  var comm = $("#comm_" + item).val() ? $("#comm_" + item).val() : 0;

  if (parseInt(sold_qty) < parseInt(quantity)) {
    alert("Sold quantity less than quantity!");
    $("#total_qntt_" + item).val("");
  }
  var price = quantity * price_item;
  var dis = price * (discount / 100);
  var diss = price * (disc / 100);
  var cmss = price * (comm / 100);
  $("#all_discount_" + item).val(diss);
  $("#all_cm_" + item).val(cmss);
  $("#return_val_" + item).val(price);
  $("#cm_return_val_" + item).val(price);
  var ttldis = $("#all_discount_" + item).val();
  var total_d = $("#total_discount_ammount").val();

  // $(".return_val").each(function () {
  //   isNaN(this.value) || r == this.value.length || (r += parseFloat(this.value));
  // });

  $(".total_price_return").each(function () {
    isNaN(this.value) || r == this.value.length || (r += parseFloat(this.value));
  });

  $(".cm_return_val").each(function () {
    isNaN(this.value) || cm == this.value.length || (cm += parseFloat(this.value));
  });

  $(".total_p").each(function () {
    isNaN(this.value) || g == this.value.length || (g += parseFloat(this.value));
  });
  // $(".total_price").each(function () {
    // isNaN(this.value) || a == this.value.length || (a += parseFloat(this.value));
  // });

  $(".total_price_wd").each(function () {
    isNaN(this.value) || a == this.value.length || (a += parseFloat(this.value));
  });

  $(".total_price_return").each(function () {
    isNaN(this.value) || tpr == this.value.length || (tpr += parseFloat(this.value));
  });

  $(".distributed_discount_return").each(function () {
    isNaN(this.value) || ddr == this.value.length || (ddr += parseFloat(this.value));
  });

  $(".payable").each(function () {
    isNaN(this.value) || x == this.value.length || (x += parseFloat(this.value));
  });
  $(".paya_total").each(function () {
    isNaN(this.value) || y == this.value.length || (y += parseFloat(this.value));
  });

  $(".total_discount").each(function () {
    isNaN(this.value) || d == this.value.length || (d += parseFloat(this.value));
  })
  $(".total_cm").each(function () {
    isNaN(this.value) || acm == this.value.length || (acm += parseFloat(this.value));
  })

  $(".vat_return").each(function () {
    isNaN(this.value) || t_vat == this.value.length || (t_vat += parseFloat(this.value));
  })

  $(".tax_return").each(function () {
    isNaN(this.value) || t_tax == this.value.length || (t_tax += parseFloat(this.value));
  })

  //per sku discount calculation
  var invoice_discount = parseFloat($("#invoice_discount").val());
  var perc_dis = parseFloat($("#perc_discount").val());
  var pds = y * (perc_dis / 100);

  var dis_by_sku = price_item * (disc / 100);
  $("#dis_amount_" + item).val(dis_by_sku);

  $(".dis_amount").each(function () {
    isNaN(this.value) || z == this.value.length || (z += parseFloat(this.value));
  })
  var total = parseFloat($('#total_amount').val());
  var total_discount = parseFloat($('#total_discount_ammount').val());
  var shipping_cost = parseFloat($('#shipping_cost').val()) ? parseFloat($('#shipping_cost').val()) : 0;
  var commission = parseFloat($('#commission').val()) ? parseFloat($('#commission').val()) : 0;
  var total_commission = parseFloat($('#total_commission').val()) ? parseFloat($('#total_commission').val()) : 0;
  var dc = parseFloat($('#dc').val()) ? parseFloat($('#dc').val()) : 0;
  var invoice_discount = parseFloat($('#invoice_discount').val()) ? parseFloat($('#invoice_discount').val()) : 0;
  


  var invoice_value = (total - shipping_cost) + total_discount + commission + total_commission;
  // var c_invoice_value=total+commission+total_commission;




  var sale_cm = commission / invoice_value * r;
  var sku_wise_t_cm = sale_cm + acm;


  var sale_discount = invoice_discount / invoice_value * r;
  var sale_discount_perc = pds / g * a;
  var sku_wise_t_dis = sale_discount + sale_discount_perc + d;

  

  $('#total_return').val(r);
  $('#sub_total').val(a.toFixed(2, 2));
  $('#sub_total_return').val(tpr.toFixed(2, 2));
  var sale_discount_return = (invoice_discount * tpr) / a;
  $('#sale_discount_return').val(sale_discount_return.toFixed(2, 2));
  // $('#sale_discount_perc').val(sale_discount_perc  .toFixed(2,2));
  // $('#sku_discount').val(sku_wise_t_dis.toFixed(2, 2));
  var sku_perc_discount = tpr * (Number($('#sale_discount_perc').val()) / 100);
  var sku_wise_total_discount = sku_perc_discount + sale_discount_return;
  var sku_total_price_with_discount = tpr - sku_wise_total_discount;
  // console.log(sku_perc_discount);
  $('#sku_discount').val(sku_wise_total_discount.toFixed(2, 2));
  $('#sku_total_price_with_discount').val(sku_total_price_with_discount.toFixed(2, 2));
  $('#sku_cm').val(sku_wise_t_cm.toFixed(2, 2));
  $('#total_vat').val(t_vat.toFixed(2, 2));
  $('#total_tax').val(t_tax.toFixed(2, 2));



  //Total price calculate per product
  var temp = price - (diss + cmss) + + parseInt(vat) + + parseInt(tax);
  var paya = pa_total_price - temp;
  $("#total_price_" + item).val(temp); //
  $("#payable_" + item).val(paya.toFixed(2, 2)); //





  var total_return = sales_return;
  // var sales_return = r - (sku_wise_t_dis + sku_wise_t_cm);
  var total_return = sku_total_price_with_discount + t_vat + t_tax;
  $("#sale_discount").val(sale_discount.toFixed(2, 2));
  $("#total_return").val(total_return.toFixed(2, 2));

  var rounding = Math.round(total_return) - total_return;
  $("#rounding").val(rounding.toFixed(2, 2));
  var sales_return =  Math.round(total_return);
  $("#sales_return").val(Math.round(total_return).toFixed(2));

  

  // var net_pay = (sku_wise_t_dis + sku_wise_t_cm) - r;
  var net_pay = sku_total_price_with_discount - r;
  $("#net_pay").val(net_pay.toFixed(2, 2));
  var paid_amount = parseFloat($("#paid_amount").val());


  var total_refund = total - sales_return - paid_amount;

  console.log(total, sales_return, paid_amount);
  // var total_refund = sales_return - paid_amount;
  $("#customer_ac").val(total_refund.toFixed(2, 2));

  var n_total_refund = total_refund;
  $('#adc').removeClass('d-none');

  // console.log(n_total_refund);

  // if ($("#pay_person").is(":checked")) {
  //   var n_total_refund = total_refund - dc;
  //   $('#adc').addClass('d-none');
  // } else {
  //   var n_total_refund = total_refund;
  //   $('#adc').removeClass('d-none');
  // }

  console.log(n_total_refund, Math.round(n_total_refund));


  $("#total_refund").val(Math.round(n_total_refund).toFixed(2));
  $("#dueAmmount").val(Math.round(n_total_refund).toFixed(2, 2));
  $("#refunded_amt").val(Math.round(n_total_refund).toFixed(2, 2));
  $("#re_dueAmmount").val(Math.round(n_total_refund).toFixed(2, 2));
  if (n_total_refund < 0) {
    $('.hide_tr').removeClass('d-none')
    $('.due_tr').addClass('d-none')
  } else {
    $('.hide_tr').addClass('d-none')
    $('.due_tr').removeClass('d-none')
  }


 // console.log($("#total_refund").val());


}

"use strict";
function bank_paymet(val, sl) {

  if (val == 2 || 3 || 4 || 5 || 6) {

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


"use strict";
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
    '<div class="row margin-top10"  >'
    + '<div class="col-sm-4">'
    + '<label for="payment_type" class="col-sm-5 col-form-label">Payment Type <i class="text-danger">*</i></label>'
    + '<div class="col-sm-7">'
    + '<select name="paytype[]" class="form-control" required="" onchange="bank_paymet(this.value, ' + sl + ')" tabindex="3">'
    + '<option value="1">Cash Payment</option>'
    + '<option value="2">Cheque Payment</option>'
    + '<option value="4">Bank Payment</option>'
    + ' <option value="3">Bkash Payment</option>'
    + ' <option value="5">Nagad Payment</option>'
    + ' <option value="7">Rocket Payment</option>'
    + ' <option value="6">Card Payment</option>'

    + '</select>'

    + '</div>'

    + '</div>'

    + '<div class="col-sm-4" id="bank_div_' + sl + '"  style="display:none;">'
    + ' <div class="form-group row">'
    + '<label for="bank" class="col-sm-3 col-form-label">Bank<i class="text-danger">*</i></label>'
    + ' <div class="col-sm-7">'

    + ' <input type="text" name="bank_id" class="form-control" id="bank_id_' + sl + '" placeholder="Bank">'

    + ' </div>'

    + '<div class="col-sm-1">'
    + ' <a href="#" class="client-add-btn btn btn-success" aria-hidden="true" data-toggle="modal" data-target="#cheque_info"><i class="ti-plus m-r-2"></i></a>'
    + '</div>'
    + ' </div>'

    + '</div>'



    + '<div class="col-sm-4" id="bank_div_m_' + sl + '" style="display:none;">'
    + ' <div class="form-group row">'
    + '<label for="bank" class="col-sm-5 col-form-label"> Bank <i class="text-danger">*</i></label>'
    + '<div class="col-sm-7">'
    + '<select name="bank_id_m[]" class="form-control bankpayment" id="bank_id_m_' + sl + '">'
    + bank_list

    + '</select>'


    + '</div>'


    + ' </div>'
    + '</div>'


    + '<div class="col-sm-4" style="display: none" id="bkash_div_' + sl + '">'
    + '<div class="form-group row">'
    + '<label for="bkash" class="col-sm-5 col-form-label">Bkash Number <i class="text-danger">*</i></label>'
    + '<div class="col-sm-7">'
    + '<select name="bkash_id[]" class="form-control bankpayment" id="bkash_id_' + sl + '">'
    + bkash_list

    + '</select>'

    + ' </div>'

    + '</div>'
    + '</div>'

    + '<div class="col-sm-4" style="display: none" id="nagad_div_' + sl + '">'
    + '<div class="form-group row">'
    + '<label for="nagad" class="col-sm-5 col-form-label">Nagad Number <i class="text-danger">*</i></label>'
    + '<div class="col-sm-7">'
    + '<select name="nagad_id[]" class="form-control bankpayment" id="nagad_id_' + sl + '">'
    + nagad_list
    + ' </select>'

    + '</div>'


    + '</div>'
    + ' </div>'

    + '<div class="col-sm-4" style="display: none" id="rocket_div_' + sl + '">'
    + '<div class="form-group row">'
    + '<label for="rocket" class="col-sm-5 col-form-label">Rocket Number <i class="text-danger">*</i></label>'
    + '<div class="col-sm-7">'
    + '<select name="rocket_id[]" class="form-control bankpayment" id="rocket_id_' + sl + '">'
    + rocket_list
    + ' </select>'

    + '</div>'


    + '</div>'
    + ' </div>'
    + '<div class="col-sm-4" style="display: none" id="card_div_' + sl + '">'
    + '<div class="form-group row">'
    + '<label for="card" class="col-sm-5 col-form-label">Card Type <i class="text-danger">*</i></label>'
    + '<div class="col-sm-7">'
    + '<select name="card_id" class="form-control bankpayment" id="card_id_' + sl + '">'
    + '<option value="">Select One</option>'
    + card_list
    + '</select>'


    + ' </div>'


    + ' </div>'
    + '</div>'

    + '<div class="col-sm-3"id="ammnt_' + sl + '" >'
    + '<label for="p_amount" class="col-sm-5 col-form-label"> Amount <i class="text-danger">*</i></label>'
    + '<div class="col-sm-7">'
    + '<input class="form-control p_amount" type="text" name="p_amount[]" onchange="calc_paid()" onkeyup="calc_paid()">'
    + '</div>'
    + '</div>'
    + '<div class="col-sm-1">'
    + '<a id="delete_btn" onclick="delete_row(this)" class="btn btn-danger"><i class="fa fa-trash"></i></a>'
    + '</div>'


    + '</div > '
  );
  count.val(sl + 1);
}

'use strict';
function delete_row(e) {
  e.closest('.row').remove();
}

$(document).ready(function () {
  "use strict";
  var paytype = $("#editpayment_type").val();
  if (paytype == 2) {
    $("#bank_div").css("display", "block");
  } else {
    $("#bank_div").css("display", "none");
  }

  if (paytype == 3) {
    $("#bkash_div").css("display", "block");
  } else {
    $("#bkash_div").css("display", "none");
  }

  $(".bankpayment").css("width", "100%");
});


"use strict"
function calc_paid() {
  var pt = 0;

  // var paid_amount = (parseFloat($("#paid_amount").val()) ? parseFloat($("#paid_amount").val()) : 0);

  $(".p_amount").each(function () {
    isNaN(this.value) || 0 == this.value.length || (pt += parseFloat(this.value))
  });

  $("#re_paidAmount").val((pt).toFixed(2, 2));
  $("#paidAmmount").val((pt).toFixed(2, 2));
  invoice_paidamount();
}
"use strict";
function invoice_productList_old(sl) {

  var outlet_id = $("#outlet_name").val();

  var priceClass = 're_price_item' + sl;
  var purchase_price = 're_purchase_price_' + sl;

  var available_quantity = 're_available_quantity_' + sl;
  var price = 're_price_item_' + sl;
  var unit = 're_unit_' + sl;
  var tax = 're_total_tax_' + sl;
  var serial_no = 're_serial_no_' + sl;
  var warehouse = 're_warehouse_' + sl;
  var warrenty_date = 're_warrenty_date_' + sl;
  var expiry_date = 're_expiry_date_' + sl;
  var discount_type = 're_discount_type_' + sl;
  // var rate = 're_price_item_' + sl;
  var discount = 're_discount_' + sl;
  var re_vat = 're_vat_' + sl;
  var re_tax = 're_tax_' + sl;
  var csrf_test_name = $('[name="csrf_test_name"]').val();
  var base_url = $("#base_url").val();



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
      var id = ui.item.value;
      var dataString = 'pro duct_id=' + id;
      var base_url = $('.baseUrl').val();
      var customer_id = $('#autocomplete_customer_id').val();
      $.ajax
        ({
          type: "POST",
          url: base_url + "Cinvoice/retrieve_product_data_inv",
          data: { product_id: id, customer_id: customer_id, outlet_id: outlet_id, csrf_test_name: csrf_test_name },
          cache: false,
          success: function (data) {
            var obj = jQuery.parseJSON(data);

            console.log(obj);

            //  console.log(obj)
            $('.' + priceClass).val(obj.purchase_price ? obj.purchase_price : 0.00);
            $('#' + purchase_price).html('৳' + obj.price);
            $('.' + available_quantity).val(obj.stock);
            $('.' + unit).val(obj.unit);
            $('.' + warrenty_date).val(obj.warrenty_date);
            $('.' + expiry_date).val(obj.expired_date);
            $('#' + warehouse).html(obj.warehouse);
            $('.' + price).val(obj.price);
            $('#' + re_vat).val(obj.vat);
            $('#' + re_tax).val(obj.tax);
            $('.' + tax).val(obj.tax);
            $('#txfieldnum').val(obj.txnmber);
            // $('#'+serial_no).html(obj.serial);
            // $('#'+discount_type).val(obj.discount_type);
            $('#' + discount).val(obj.discount);
            $("#stock_" + sl).val(obj.stock);
            quantity_calculate_re(sl);

          }
        });

      $(this).unbind("change");
      return false;
    }
  };

  $('body').on('keypress.autocomplete', '.productSelection', function () {
    $(this).autocomplete(options);
  });

}

"use strict";
function invoice_productList(sl) {

  var outlet_id = $("#outlet_name").val();

  var priceClass = 're_price_item_' + sl;
  var purchase_price = 're_purchase_price_' + sl;
    

    var available_quantity = 're_available_quantity_' + sl;
    var unit = 're_unit_' + sl;
    var tax = 're_total_tax_' + sl;
    var serial_no = 're_serial_no_' + sl;
    var total_price = 're_total_price_' + sl;
    var discount_type = 're_discount_type_' + sl;
    var total_price_wd = 're_total_price_wd_' + sl;
    
    var tax2 = 're_tax_' + sl;
    var vat = 're_vat_' + sl;
    var tax_percent = 're_tax_percent_' + sl;
    var vat_percent = 're_vat_percent_' + sl;
    var qnty = 're_total_qntt_' + sl;

    var csrf_test_name = $('[name="csrf_test_name"]').val();
    var base_url = $("#base_url").val();

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
            // var dataString = 'product_id=' + id;
            // var base_url = $('.baseUrl').val();

            var dataString = 'pro duct_id=' + id;
            var base_url = $('.baseUrl').val();
            var customer_id = $('#autocomplete_customer_id').val();
            

            $.ajax
                ({
                    type: "POST",
                    url: base_url + "Cinvoice/retrieve_product_data_inv",
                    data: { product_id: id, customer_id: customer_id, outlet_id: outlet_id, csrf_test_name: csrf_test_name },
                    cache: false,
                    success: function (data) {
                        var obj = jQuery.parseJSON(data);
                        // console.log(obj);
                        for (var i = 0; i < (obj.txnmber); i++) {
                            var txam = obj.taxdta[i];
                            var txclass = 'total_tax' + i + '_' + sl;
                            $('.' + txclass).val(obj.taxdta[i]);
                        }
                        // console.log(priceClass);
                        $('#' + priceClass).val(obj.price);
                        // $('#' + purchase_price).html('৳' + obj.purchase_price);

                        // $('#' + total_price).val(obj.purchase_price);
                        // $('#' + total_price_wd).val(obj.purchase_price);
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

                        //This Function Stay on others.js page
                        quantity_calculate_re(sl);

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


"use strict";
function invoice_paidamount() {
  var prb = parseFloat($("#previous").val(), 10);
  var pr = 0;
  var d = 0;
  var nt = 0;
  if (prb != 0) {
    pr = prb;
  } else {
    pr = 0;
  }
  var t = $("#re_grandTotal").val(),
    a = $("#re_paidAmount").val(),
    x = $("#paidAmmount").val(),
    tf = parseFloat($("#total_refund").val()),
    e = t - a,
    y = tf - x,
    f = e + pr,
    nt = parseFloat(t, 10) + pr,
    re_r = Math.round(nt) - nt,
    d = a - nt;
  $("#re_n_total").val(Math.round(nt).toFixed(2, 2));
  $("#re_customer_ac").val(Math.round(nt).toFixed(2, 2));
  $('#re_rounding').val(re_r.toFixed(2, 2));
  $("#dueAmmount").val(Math.round(y).toFixed(2, 2));
  if (nt < 0) {
    $('.re_hide_tr').removeClass('d-none')
    $('.re_due_cus').addClass('d-none')
  } else {
    $('.re_hide_tr').addClass('d-none')
    $('.re_due_cus').removeClass('d-none')
  }
  if (f > 0) {
    $("#re_dueAmmount").val(Math.round(f).toFixed(2, 2));

    if (a <= f) {
      $("#re_change").val(0);
    }
  } else {
    if (a < f) {
      $("#re_change").val(0);
    }
    if (a > f) {
      $("#re_change").val(d.toFixed(2, 2))
    }
    $("#re_dueAmmount").val(0)
    // $("#dueAmmount").val(0)

  }
}
function validation() {

  if ($(".chk").is(":checked") && ($("#is_replace").val() == 0 || $("#cash_return").val() == 0)) {
    $("#add_invoice").prop("disabled", false);
  } else {
    if ($(".chk").filter(":checked").length < 1) {
      $("#add_invoice").attr("disabled", true);
    }
  }

  // if ($("#is_replace").val() == 0 || $("#cash_return").val() == 0){
  //
  //   $("#add_invoice").prop("disabled", true);
  //
  // }else{
  //   $("#add_invoice").prop("disabled", false);
  // }
}
//Delete a row of table
"use strict";
function deleteRow(t) {
  var a = $("#normalinvoice > tbody > tr").length;
  if (1 == a)
    alert("There only one row you can't delete.");
  else {
    var e = t.parentNode.parentNode;
    e.parentNode.removeChild(e),
      calculateSum();
    invoice_paidamount();
    var current = 1;
    $("#normalinvoice > tbody > tr td input.productSelection").each(function () {
      current++;
      $(this).attr('id', 'product_name' + current);
    });
    var common_qnt = 1;
    $("#normalinvoice > tbody > tr td input.common_qnt").each(function () {
      common_qnt++;
      $(this).attr('id', 'total_qntt_' + common_qnt);
      $(this).attr('onkeyup', 'quantity_calculate_re(' + common_qnt + ');');
      $(this).attr('onchange', 'quantity_calculate_re(' + common_qnt + ');');
    });
    var common_rate = 1;
    $("#normalinvoice > tbody > tr td input.common_rate").each(function () {
      common_rate++;
      $(this).attr('id', 'price_item_' + common_rate);
      $(this).attr('onkeyup', 'quantity_calculate_re(' + common_qnt + ');');
      $(this).attr('onchange', 'quantity_calculate_re(' + common_qnt + ');');
    });
    var common_discount = 1;
    $("#normalinvoice > tbody > tr td input.common_discount").each(function () {
      common_discount++;
      $(this).attr('id', 'discount_' + common_discount);
      $(this).attr('onkeyup', 'quantity_calculate_re(' + common_qnt + ');');
      $(this).attr('onchange', 'quantity_calculate_re(' + common_qnt + ');');
    });
    var common_total_price = 1;
    $("#normalinvoice > tbody > tr td input.common_total_price").each(function () {
      common_total_price++;
      $(this).attr('id', 'total_price_' + common_total_price);
    });




  }
}
("use strict");
function invoice_productList_old(sl) {
  var outlet_id = $("#outlet_name").val();

  var priceClass = "price_item" + sl;

  var available_quantity = "available_quantity_" + sl;
  var unit = "unit_" + sl;
  var tax = "total_tax_" + sl;
  var serial_no = "serial_no_" + sl;
  var warehouse = "warehouse_" + sl;
  var warrenty_date = "warrenty_date_" + sl;
  var expiry_date = "expiry_date_" + sl;
  var discount_type = "discount_type_" + sl;
  var discount = "discount_" + sl;
  var csrf_test_name = $('[name="csrf_test_name"]').val();
  var base_url = $("#base_url").val();

  // Auto complete
  var options = {
    minLength: 0,
    source: function (request, response) {
      var product_name = $("#pr_name_" + sl).val();
      $.ajax({
        url: base_url + "Cinvoice/autocompleteproductsearch",
        method: "post",
        dataType: "json",
        data: {
          term: request.term,
          product_name: product_name,
          csrf_test_name: csrf_test_name,
        },
        success: function (data) {
          response(data);
        },
      });
    },
    focus: function (event, ui) {
      $(this).val(ui.item.label);
      return false;
    },
    select: function (event, ui) {
      $(this).parent().parent().find(".autocomplete_hidden_value").val(ui.item.value);
      $(this).val(ui.item.label);
      var id = ui.item.value;
      var dataString = "pro duct_id=" + id;
      var base_url = $(".baseUrl").val();
      var customer_id = $("#autocomplete_customer_id").val();
      console.log(id);
      $.ajax({
        type: "POST",
        url: base_url + "Cinvoice/retrieve_product_data_inv",
        data: {
          product_id: id,
          customer_id: customer_id,
          outlet_id: outlet_id,
          csrf_test_name: csrf_test_name,
        },
        cache: false,
        success: function (data) {
          var obj = jQuery.parseJSON(data);
          console.log(obj);

          if (parseFloat(obj.stock) == 0) {

            toastr.error('This product is out of stock!!')
            return
          } else {
            $("#replace_price_" + sl).val(obj.purchase_price);
            $("#" + discount).val(obj.discount);
            $("#stock_" + sl).val(obj.stock);

          }


        },
      });

      $(this).unbind("change");
      return false;
    },
  };

  $("body").on("keypress.autocomplete", ".productSelection", function () {
    $(this).autocomplete(options);
  });
}

("use strict");
function add_replace_row() {
  var sl = $("#inc_id").val();
  var html = "";
  html +=
    "<tr>" +
    '<td class="product_field">' +
    '<input type="text" name="product_name" onclick="invoice_productList(' +
    sl +
    ');" value="" class="form-control productSelection" required placeholder="Product Name" id="pr_name_' +
    sl +
    '" tabindex="3">' +
    '<input type="hidden" class="product_id_' +
    sl +
    ' autocomplete_hidden_value" value="" id="product_id_' +
    sl +
    '" />' +
    "</td>" +
    "<td>" +
    '<input type="text" name="sold_qty[]" id="stock_' +
    sl +
    '" class="form-control text-right available_quantity_' +
    sl +
    '" readonly="" />' +
    "</td>" +
    "<td>" +
    '<input type="text" onkeyup="replace_calculate(' +
    sl +
    ');" onchange="replace_calculate(' +
    sl +
    ');" class="total_qntt_' +
    sl +
    ' form-control text-right" id="replace_qty_' +
    sl +
    '" min="0" placeholder="0.00" tabindex="4" />' +
    "</td>" +
    ' <td><input type="text" name="replace_rate[]" onkeyup="quantity_calculate(' +
    sl +
    ');" onchange="quantity_calculate(' +
    sl +
    ');" value="" id="replace_price_' +
    sl +
    '" class="form-control text-right" min="0" tabindex="5" required="" placeholder="0.00" readonly="" /></td>' +
    "<td>" +
    '<input class="rep_total form-control text-right" type="text" id="replace_total_' +
    sl +
    '" value="" readonly="readonly" />' +
    '<input type="hidden" name="invoice_details_id[]" id="" value="" />' +
    "</td>" +
    "<td>" +
    '<button type="button" class="btn btn-sm btn-danger" onclick="delete_replace_row(this)"><i class="fa fa-minus"></i></button>' +
    "</td>" +
    "</tr>";

  $("#replaceT > tbody").append(html);
  console.log(html);
  sl++;
  $("#inc_id").val(sl);
}
"use strict";
$("#add_receiver_form").submit(function (e) {
  e.preventDefault();
  var customeMessage = $("#customeMessage_rec");
  var receiver_dropdown = $("#deli_receiver");
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
        customeMessage.addClass('alert-success').removeClass('alert-danger').html(data.message);
        receiver_dropdown.append(data.html);
        $("#add_receiver_modal").modal('hide');
        receiver_changed(receiver_dropdown[0]);
      } else {
        customeMessage.addClass('alert-danger').removeClass('alert-success').html(data.error_message);
      }
    },
    error: function (xhr) {
      alert('failed!');
    }

  });

});
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
function commision_add(val) {

  if (val == 1) {
    $('#t_comm_tr').removeClass('d-none')
    $('.comm_th').removeClass('d-none')
    $('.comm_th').addClass('d-inline')

  } else {
    $('#t_comm_tr').addClass('d-none')
    $('.comm_th').addClass('d-none')
    $('.comm_th').removeClass('d-inline')
  }

  if (val == 2) {
    $('#commission_tr').removeClass('d-none')
    $('.comm_th').removeClass('d-inline')
    $('.comm_th').addClass('d-none')
  } else {
    $('#commission_tr').addClass('d-none')
    $('.comm_th').addClass('d-inline')
    $('.comm_th').removeClass('d-none')
  }
}
"use strict";
function get_branch(courier_id) {

  var base_url = "<?= base_url() ?>";
  var csrf_test_name = $('[name="csrf_test_name"]').val();



  $.ajax({
    url: base_url + "Ccourier/branch_by_courier",
    method: 'post',
    data: {
      courier_id: courier_id,
      csrf_test_name: csrf_test_name
    },
    cache: false,
    success: function (data) {
      var obj = jQuery.parseJSON(data);
      $('.branch_id').html(obj.branch);


      $(".branch_div").css("display", "block");
      // if(courier_id == obj.courier_id ){
      //     $("#subCat_div").css("display", "block");
      // }else{
      //     $("#subCat_div").css("display", "none");
      // }
    }
  })

}

function delivery_type(val) {

  //   alert(val)
  if (val == 2) {
    var style = 'block';
    // $('.hidden_tr').removeClass('d-none');

  } else {
    var style = 'none';
    // $('.hidden_tr').addClass('d-none');

  }



  document.getElementById('courier_div').style.display = style;



}


("use strict");
function delete_replace_row(e) {
  e.closest("tr").remove();
}

("use strict");
function replace_calculate(sl) {
  var qty = $("#replace_qty_" + sl).val();

  //var qty= (parseFloat($("#replace_qty_" + sl).val()) ? parseFloat($("#replace_qty_" + sl).val()) : 0);
  var price = $("#replace_price_" + sl).val();
  var dis = $("#replace_dis_" + sl).val();
  var a = 0;

  var price = qty * price;

  $("#replace_total_" + sl).val(price.toFixed(2, 2));

  $(".rep_total").each(function () {
    isNaN(this.value) || 0 == this.value.length || (a += parseFloat(this.value));
  });

  $("#rep_total").val(a.toFixed(2, 2));

  var ret_tot = $("#grandTotal").val();

  var add_cost = $("#total_tax_ammount").val();
  $("#rep_deduction").val(add_cost);

  var x = a - ret_tot;

  $("#rep_grand").val(x.toFixed(2, 2));
  var grand = a - ret_tot;
  var paid_amount = parseFloat($("#paid_amount").val());
  var due_amount = grand - paid_amount;
  $('#due_amount').val(due_amount.toFixed(2, 2))
  // if ($("#pay_person").is(":checked")) {
  //   var grand = x+add_cost;
  // }else{
  //   var grand = ret_tot;
  //
  // }


  $("#rep_total_cost").val(grand.toFixed(2, 2));


  // if (parseFloat($("#rep_grand").val()) < 0) {
  //   toastr.error("Customer will pay " + Math.abs(parseFloat($("#rep_grand").val())));
  // } else {
  //   toastr.warning("Customer will get " + Math.abs(parseFloat($("#rep_grand").val())));
  // }
}

$(document).ready(function () {

  $("#rep_toggle").click(function () {
    $("#replace_table").toggle("fade", { direction: "right" }, 400);



    if ($("#cash_return").is(":checked")) {
      $("#cash_return").prop("checked", false);
    }

    if ($("#is_replace").val() == 0) {
      $('.due_tr').addClass('d-none')
      $('.hide_tr').removeClass('d-none')
      $("#is_replace").val(1);
    } else {
      $('.due_tr').removeClass('d-none')
      $('.hide_tr').addClass('d-none')
      $("#is_replace").val(0);
    }

    quantity_calculate(1);
  });

  $("#cash_return").click(function () {
    //  $('.due_tr').removeClass('d-none')
    if ($("#rep_toggle").is(":checked")) {
      $("#rep_toggle").trigger("click");
      $("#cash_return").prop("checked", true);
    }
  });

  ("use strict");
  $("input[type=checkbox]").each(function () {
    if (this.nextSibling.nodeName != "label") {
      $(this).after('<label for="' + this.id + '"></label>');
    }
  });

  $("#add_invoice").prop("disabled", true);
  $(".chk").click(function () {
    if ($("#is_replace").val() == 0 || $("#cash_return").val() == 0) {

      $("#add_invoice").prop("disabled", true);
      return
    }

    $("chk").prop(":checked", false)
    if ($(this).is(":checked")) {
      $("#add_invoice").prop("disabled", false);
    } else {
      if ($(".chk").filter(":checked").length < 1) {
        $("#add_invoice").attr("disabled", true);
      }
    }
  });


});



("use strict");
function checkboxcheckSreturn(sl) {
  var check_id = "check_id_" + sl;
  var total_qntt = "total_qntt_" + sl;
  var product_id = "product_id_" + sl;
  var total_price = "total_price_" + sl;
  var discount = "discount_" + sl;
  if ($("#" + check_id).prop("checked") == true) {
    document.getElementById(total_qntt).setAttribute("required", "required");
    document.getElementById(product_id).setAttribute("name", "product_id[]");
    document.getElementById(total_qntt).setAttribute("name", "product_quantity[]");
    document.getElementById(total_price).setAttribute("name", "total_price[]");
    document.getElementById(discount).setAttribute("name", "discount[]");
  } else if ($("#" + check_id).prop("checked") == false) {
    document.getElementById(total_qntt).removeAttribute("required");
    document.getElementById(product_id).removeAttribute("name", "");
    document.getElementById(total_qntt).removeAttribute("name", "");
    document.getElementById(total_price).setAttribute("name", "total_price[]");
    document.getElementById(discount).setAttribute("name", "");
  }
}

("use strict");
function quantity_calculateSreturn(item) {
  var a = 0,
    o = 0,
    d = 0,
    p = 0;
  var sold_qty = $("#sold_qty_" + item).val();
  var quantity = $("#total_qntt_" + item).val();
  var price_item = $("#price_item_" + item).val();
  var discount = $("#discount_" + item).val();
  if (parseInt(sold_qty) < parseInt(quantity)) {
    alert("Purchase quantity less than quantity!");
    $("#total_qntt_" + item).val("");
  }
  if (parseInt(quantity) > 0) {
    var price = quantity * price_item;
    var dis = price * (discount / 100);
    $("#all_discount_" + item).val(dis);

    //Total price calculate per product
    var temp = price - dis;
    $("#total_price_" + item).val(temp);

    $(".total_price").each(function () {
      isNaN(this.value) || o == this.value.length || (a += parseFloat(this.value));
    }),
      $("#grandTotal").val(a.toFixed(2, 2));
    $(".total_discount").each(function () {
      isNaN(this.value) || d == this.value.length || (d += parseFloat(this.value));
    }),
      $("#total_discount_ammount").val(d.toFixed(2, 2));
  }
}
