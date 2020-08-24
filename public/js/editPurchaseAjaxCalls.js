$(function () {

    const pageUrl = window.location.pathname;
    var id = pageUrl.match(/\d+/);
    const url = 'http://localhost:8000';
    const getBills = url + '/api/purchase/' + id + '/bills';
    const editPurchase = url + '/api/purchase/' + id;
    const getBillnumber = url + '/api/numb/bills';
    const deletePurchase = url + '/api/purchase';
    const deleteBill = url + '/api/bill/' + id;
    var div = $('#records');
    var eq = 0;
    var prev = "";
    var counter = 0;
    var billNumb = id[0];

    get(getBills).done(function (data) 
    {  
        eq = parseFloat(data) - 1;
    })

    $(document).keypress(
        function(event){
            if (event.which == '13') {
                event.preventDefault();
            }
        });

        div.on('focusin',' :input[name="quantity"]',function (e)
        {
            prev = $(this).val();
        });
    
        $(':input[name="item_name"]').trigger('change');

        div.on('change',' :input[name="item_name"]',function (e)
        {
            e.stopPropagation();
            var element = $(this);
            fetchRecords(element.val()).done(function (data)
            {
                var parent = div.find('tr').eq(eq);
                parent.find(' :input[name="code"]').val(data.id);
                parent.find(' :input[name="purchase_price"]').val(data.purchase_price);
                parent.find(' :input[name="quantity"]').focus();
            })
        });
    
        div.on('click','#deleteRow',function (e) 
        {  
            e.preventDefault();
            e.stopPropagation();
            var parent = $(this).parents('tr:first');
            var code = parent.find(' :input[name="code"]').val();
            var total =  parseFloat(parent.find(' :input[name="total"]').val());
            if(!isNaN(total))
            {
                var totalBill = parseFloat($('input[name="total_bill"]').val());   
                var cash = parseFloat($('input[name="cash"]').val());
                var newTotal = totalBill - total;
                $('input[name="total_bill"]').val(newTotal);
                $('input[name="credit"]').val(newTotal - cash );
                create(deleteBill,{'item_id' : code}).done(function () 
                {  
                    parent.remove();
                });
            }
            parent.remove();
        })

        div.on('keyup',' :input[name="quantity"]',function (e)
        {
            e.stopPropagation();
            var element = $(this);
            if(e.keyCode == 13)
            {
                var parent = element.parents('tr:first');
                var price = parent.find(' :input[name="purchase_price"]').val();
                if(!element.val().trim())
                {
                    element.val(1);
                }
                else
                {
                    if(prev == element.val())   
                    {
                        counter = 1;
                    }
                    else
                    {
                        prev = element.val();
                        counter = 0;
                    }
                }
                var total = price * element.val();
                parent.find(' :input[name="total"]').val(total);
                setTotal(div);
                var cash = parseFloat( $('input[name="cash"]').val() );
                $('input[name="credit"]').val(getTotal(div) - cash);
                if(counter == 1)
                {
                    eq = eq + 1;
                    $('#records').append('<tr>' + parent.html());
                    $('#records').find(':input[name="item_name"]').eq(eq).focus();
                    var parent = div.find('tr').eq(eq);
                    parent.find(' :input[name="code"]').val("");
                    parent.find(' :input[name="purchase_price"]').val("");
                    parent.find(' :input[name="quantity"]').val("");
                    parent.find(' :input[name="total"]').val("");
                    parent.find('option:selected') .removeAttr("selected");
                    parent.find('option[name="select"]').attr("selected","selected");
                    counter = 0;
                }
                else
                {
                    counter = counter + 1;
                }
            }
        });

        $('form').on('keyup',' :input[name="cash"]', function () {
            var cash  = parseFloat($(this).val());
            var credit = 0;
            var total = parseFloat($('input[name="total_bill"]').val());
            if(isNaN(cash))
            {
                credit = total;
            }
            else
            {
                credit = total - cash;
            }
            $('input[name="credit"]').val(credit);
        });

        div.on('keyup',' :input[name="purchase_price"]',function (e)
        {
            e.stopPropagation();
            var element = $(this);
            if(e.keyCode == 13)
            {
                var parent = element.parents('tr:first');
                var quantity = parent.find(' :input[name="quantity"]').val();
                var total =  element.val() * quantity;
                parent.find(' :input[name="total"]').val(total);
                setTotal(div);
                $('input[name="cash"]').val(getTotal(div) - $('input[name="credit"]').val());
            }
        });
    
    

        $('#delete').on('click',function (e) 
        {  
            e.stopPropagation();
            e.preventDefault();
            deleteData(deletePurchase,id).done(function()
            {
                location.replace("/purchases/index");
            }).fail(function()
            {            });
        });

        $('form').on('click','#submit',function (e) {
            e.preventDefault();
            e.stopPropagation();
            var records = [];
            var supplier = $(":input[name='supplier_name']").val();
            var billDate = $(":input[name='bill_date']").val();
            var cash = $(":input[name='cash']").val();
            var total = $(":input[name='total_bill']").val();
            var credit = $(":input[name='credit']").val();
            div.find('tr').each(function ()
            {
                records.push(
                    {
                        'bill_id' : billNumb,
                        'item_id' : $(this).find(' :input[name="code"]').val(),
                        'price': $(this).find(' :input[name="purchase_price"]').val(),
                        'quantity' :  $(this).find(' :input[name="quantity"]').val()
                    }
                )
            });
    
            var purchase =
                {
                    'supplier_id' : supplier,
                    'bill_date' : billDate,
                    'total' : total,
                    'billNumber' : billNumb
                };
    
            var data =
                {
                    'records' : records,
                    'purchase' : purchase,
                    'cash' : cash,
                    'credit' : credit,
                    'supplier_id' : supplier
                };

            console.log(data);
    
            create(editPurchase,data).done(function (data)
            {
                location.replace("/purchases/index");
            })
    
        });

});

div.on('keyup',' :input[name="purchase_price"]',function (e)
{
    e.stopPropagation();
    var element = $(this);
    if(e.keyCode == 13)
    {
        var parent = element.parents('tr:first');
        var quantity = parent.find(' :input[name="quantity"]').val();
        var total =  element.val() * quantity;
        parent.find(' :input[name="total"]').val(total);
        setTotal(div);
        $('input[name="credit"]').val(getTotal(div) - $('input[name="cash"]').val());
    }
});


function getTotal(div)
{
    var total = 0;
    div.find(' :input[name="total"]').each(function ()
    {
        total = total + parseFloat($(this).val());
    })

    return total;
}

function setTotal(div)
{
    var total = getTotal(div);
    $('input[name="total_bill"]').val(total);
}

function fetchRecords(id){
    return $.ajax({
        url: '/getItem/'+id,
        type: 'get',
        dataType: 'json'
    });
}