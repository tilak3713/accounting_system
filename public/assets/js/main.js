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









$(document).ready(function () {


    $('#discount_on_items').submit(function (e) {
        e.preventDefault();
        var method = $(this).attr('method');
        var from_url = $(this).attr('action');
        var form_data = $(this).serialize();

        $.ajax({
            type: method,
            url: from_url,
            data: form_data,
            success: function (result) {

                $('#itemsModalId').modal('hide');
                discount_item(result);

            }
        })

    });

    $('#adddiscountaccountId').submit(function (e) {
        e.preventDefault();
        var method = $(this).attr('method');
        var formurl = $(this).attr('action');
        var formdata = $(this).serialize();
        $.ajax({
            type: method,
            url: formurl,
            data: formdata,
            success: function (req) {

                discount_item(req);

                $('input[name="discount_account_id"]').val(req);

                $('#itemtableid').show('slow');


            }
        })
        return false;
    });





    // $('#editdiscountaccountId').submit(function(e){
    //     e.preventDefault();
    //     var method=$(this).attr('method');
    //     var formurl=$(this).attr('action');
    //     var formdata=$(this).serialize();
    //     $.ajax({
    //     	type:method,
    //     	url:formurl,
    //     	data:formdata,
    //     	success:function(req){

    //                  discount_item(req);


    //              $('input[name="discount_account_id"]').val(req); 

    //     		$('#itemtableid').show('slow');


    //     	}
    //     })
    //     return false;
    //   });



    $('#edit_discount_on_items').submit(function (e) {
        e.preventDefault();
        var method = $(this).attr('method');
        var form_url = $(this).attr('action');
        var form_data = $(this).serialize();
        $.ajax({
            type: method,
            url: form_url,
            data: form_data,
            success: function (result) {

                $('#itemeditModalId').modal('hide');
                discount_item(result);
            }


        })

    });




});



function editaccountdiscount(edit_id_item_description, edit_id_discount_amount, edit_id_discount_percent,account_discount_id, discount_item_id) {


    $('#edit_id_item_description').val(edit_id_item_description);
    $('#edit_id_discount_amount').val(edit_id_discount_amount);
    $('#edit_id_discount_percent').val(edit_id_discount_percent);
    $('#discount_account_id').val(account_discount_id);
    $('#discount_item_id').val(discount_item_id);
    $('#itemeditModalId').modal('show');

}





