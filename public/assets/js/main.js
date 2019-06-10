/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    //add expense tax calculations
    $('#expense_tax_type').change(function () {
        var expense_tax_type = Number($(this).val());
        var expense_amount_without_tax = Number($('#expense_amount_without_tax').val());
        if ($(this).val() === "" || $(this).val() === "undefined" || $(this).val() === null) {
            $('#expense_tax_amount').val('');
            $('#expense_amount_with_tax').val('');
            return false;
        } else {

            if ($('#expense_amount_without_tax').val() === "" || $('#expense_amount_without_tax').val() === "undefined" || $('#expense_amount_without_tax').val() === null) {
                $(this).val('');
                alert('Please enter amount');
                return false;
            } else if (isNaN($('#expense_amount_without_tax').val())) {
                $(this).val('');
                alert('Please enter numberic value.');
                return false;
            } else {
                var taxamount = (expense_amount_without_tax * expense_tax_type / 100);
                $('#expense_tax_amount').val(taxamount.toFixed(2));
                $('#expense_amount_with_tax').val((taxamount + expense_amount_without_tax).toFixed(2));

//                $("#expense_tax_amount").attr("value", taxamount.toFixed(2));
//                $("#expense_amount_with_tax").attr("value", (taxamount + expense_amount_without_tax).toFixed(2));
            }

        }

    });
    $('#expense_amount_without_tax').change(function () {
        if (isNaN($('#expense_amount_without_tax').val())) {
            $(this).val('');
            alert('Please enter numberic value.');
            return false;
        } else {
            var newvalue = Number($(this).val());
            newvalue = newvalue.toFixed(2);
            $(this).val(newvalue);
            $('#expense_tax_amount').val('');
            $('#expense_tax_type').val('');
            $('#expense_amount_with_tax').val('');
        }
    })

});

