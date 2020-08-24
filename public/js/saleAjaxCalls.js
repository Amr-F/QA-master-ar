
function getajaxCall(url)
{
    return $.ajax({
        type: "GET",
        url: url,
        data: "data",
        dataType: "JSON"
    });
}


function fetchRecords(id){
    return $.ajax({
        url: '/getItem/'+id,
        type: 'get',
        dataType: 'json'
    });
}

$(function () {

    const url = 'http://localhost:8000';
    const getnames = url + '/api/name/items';
    const getInvoicenumber = url + '/api/numb/invoices';
    const store = url + '/api/sale';
    var div = $('#records');
    var elementUrl = url + '/js/element.html';
    var eq = 0;
    var counter = 0;
    var invoiceNumb = 0;


    get(getInvoicenumber).done(function (data)
    {
        invoiceNumb = data['sale_numb'];
        var count = data['count'];
        $(':input[name="invoice_numb"]').val(count);
    })
        .fail(function (response)
        {
            console.log(response.responseText);
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
            parent.find(' :input[name="sale_price"]').val(data.sale_price);
            parent.find(' :input[name="quantity_in_inventory"]').val(data.quantity);
            parent.find(' :input[name="quantity"]').focus();
        })
    });

    div.on('focusin',' :input[name="quantity"]',function (e)
    {
        prev = $(this).val();
    });

    div.on('click','#deleteRow',function (e) 
    {  
        e.preventDefault();
        e.stopPropagation();
        var parent = $(this).parents('tr:first');
        var total =  parseFloat(parent.find(' :input[name="total"]').val());
        if(!isNaN(total))
        {
            var totalBill = parseFloat($('input[name="total_invoice"]').val());   
            var cash = parseFloat($('input[name="cash"]').val());
            var newTotal = totalBill - total;
            $('input[name="total_invoice"]').val(newTotal);
            $('input[name="credit"]').val(newTotal - cash );
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
            var price = parent.find(' :input[name="sale_price"]').val();
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
            $('input[name="cash"]').val(getTotal(div));
            if(counter == 1)
            {
                eq = eq + 1;
                $('#records').append('<tr>' + parent.html());
                $('#records').find(':input[name="item_name"]').eq(eq).focus();
                counter = 0;
            }
            else
            {
                counter = counter + 1;
            }
        }
    });

    div.on('keyup',' :input[name="sale_price"]',function (e)
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


    $('form').on('keyup',' :input[name="cash"]', function () {
        var cash  = parseFloat($(this).val());
        var credit = 0;
        var total = parseFloat($('input[name="total_invoice"]').val());
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

    $(document).keypress(
        function(event){
            if (event.which == '13') {
                event.preventDefault();
            }
        });

    $('form').submit(function (e) {
        e.preventDefault();
        var records = [];
        var customer = $(":input[name='customer_name']").val();
        var invoiceDate = $(":input[name='invoice_date']").val();
        var cash = $(":input[name='cash']").val();
        var total = $(":input[name='total_invoice']").val();
        var credit = $(":input[name='credit']").val();
        div.find('tr').each(function ()
        {
            records.push(
                {
                    'invoice_id' : invoiceNumb,
                    'item_id' : $(this).find(' :input[name="code"]').val(),
                    'price': $(this).find(' :input[name="sale_price"]').val(),
                    'quantity' :  $(this).find(' :input[name="quantity"]').val()
                }
            )
        });

        var sale =
            {
                'customer_id' : customer,
                'invoice_date' : invoiceDate,
                'total' : total,
                'invoiceNumber' : invoiceNumb
            };

        var data =
            {
                'records' : records,
                'sale' : sale,
                'cash' : cash,
                'credit' : credit,
                'customer_id' : customer
            };

        create(store,data).done(function (data)
        {
            location.replace("/sales/create");
        })

    });
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
    $('input[name="total_invoice"]').val(total);
}
