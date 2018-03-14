(function(){

    initializeComponent();

    function initializeComponent()
    {
        getServicePrice(function(data){
            renderServiceType(data.ServiceType);
            renderTable(data.ServicePrices);
        });
    }

    function getServicePrice(callback)
    {
        $.ajax({
            type: 'GET',
            url: BUrl('/api/get_service_price/'+$('#id').val()),
        }).done(function(res){
            var json = JSON.parse(res);
            console.log(json);
            callback(json.Data);
        });
    }

    function renderTable(data){
        var result = '';
        var range = 1;
        $.each(data, function(index, item){
            if(item.TypeId == 1){
                result += '<tr><td class="font-M1" colspan="5">' + item.Name + '</td></tr>';
            }else{
                result += '<tr><td class="text-center">' + range + '</td><td>' + item.Name + '</td>'+
                        '<td class="text-center">' + item.PriceFormat + '</td>'+
                        '<td class="text-center">' + item.ProcessDay + ' ថ្ងៃ</td>'+
                        '<td class="text-center">' + (item.ServiceUnit == null?'':item.ServiceUnit) + '</td>'+
                        '</tr>';
                range++;
            }
        });

        $('#ltable tbody').html(result);
    }

    function renderServiceType(data){
        var ret = data.Name;
        ret += (data.ServiceLevelId == 1?' ថ្នាក់រាជធានី-ខេត្ត':'');
        ret += (data.ServiceLevelId == 2?' ថ្នាក់ក្រុង-ស្រុក-ខណ្ឌ':'');
        ret += (data.ServiceLevelId == 3?' ថ្នាក់ឃុំ-សង្កាត់':'');

        $('#sp_title').append(ret);
    }
})();