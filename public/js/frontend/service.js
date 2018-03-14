(function(){

    initializeComponent();

    function initializeComponent()
    {
        getServiceType(function(data){
            renderPanel(data);
        });
    }

    function getServiceType(callback)
    {
        $.ajax({
            type: 'GET',
            url: BUrl('/api/get_service')
        }).done(function(res){
            var json = JSON.parse(res);
            callback(json.Data);
        });
    }

    function renderPanel(data)
    {
        var result = '';
        $.each(data, function(index, item){
            result += '<tr><td colspan="3" class="font-M1">' + item.Key + '</td></tr>';
            result += renderTable(item.Value);
        });

        $('#ltable tbody').html(result);
    }

    function renderTable(data){
        var result = '';
        $.each(data, function(index, item){
            result += '<tr><td class="text-center">' + (index + 1) + '</td><td>' + item.Name + '</td>'+
                      '<td class="text-center"><a href="' + BUrl('/service/price/' + item.Id) + '" class="btn btn-outline-primary btn-sm" target="_blank">មើលតំលៃសេវា</a></td>'+
                      '</tr>';
        });

        return result;
    }
})();