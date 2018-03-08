(function(){
    initializeComponent();
    function initializeComponent()
    {
        $('body').on('click', '.card span.clickable', function(e){
            var $this = $(this);
            if(!$this.hasClass('collapsed')) {
                $this.parents('.card').find('.card-block').slideUp();
                $this.addClass('collapsed');
                $this.find('i').removeClass('fa-chevron-down').addClass('fa-chevron-right');
            } else {
                $this.parents('.card').find('.card-block').slideDown();
                $this.removeClass('collapsed');
                $this.find('i').removeClass('fa-chevron-right').addClass('fa-chevron-down');
            }
        });

        $('body').on('click', '#btnaddlink', function(){
            var url = $('#linkmenuurl').val();
            var text = $('#linkmenutext').val();
            var request = {
                name: text,
                url: url,
                menu_type: 4
            };
            saveChange(request, function(){
                var li = '<li class="list-group-item" data-url="' + url + '">' + text + '</li>';
                $('#menu_list').append(li);
            });
        });
    }

    function saveChange(request, callback){
        $.ajax({
            type: 'POST',
            url: burl + '/admin/menu/store',
            data: request,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        }).done(function(res){
            //var json = $.parseJSON(res);
            //console.log(json);
            console.log(res);
            callback();
        });
    }
})();