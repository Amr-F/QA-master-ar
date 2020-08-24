function get(url)
{
        return $.ajax({
            type: "GET",
            async : true,
            url: url,
            dataType: "JSON"
        });
}

function edit(data,url,id)
{
    url = url + '/' + id;
    return $.ajax({
        type: "PUT",
        url: url,
        data: data,
        dataType: "JSON"
    });
}

function deleteData(url,id)
{
    getUrl = url;
    url = url + '/' + id;
    return $.ajax({
        type: "DELETE",
        async : true,
        url: url,
        dataType: "JSON"
    });
}

function create(url,data)
{
    return $.ajax({
        type: "POST",
        url: url,
        async: true,
        data: data,
        dataType: "JSON"});
}