function getajaxCall(url) 
{  
    return $.ajax({
        type: "GET",
        url: url,
        data: "data",
        dataType: "JSON"
    });
}

$(function () {

    const url = 'localhost:8000';
    const getnames = url + '/api/name/items';

});

