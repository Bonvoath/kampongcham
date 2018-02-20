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
            var li = '<li class="list-group-item" data-url="' + url + '">' + text + '</li>';
            $('#menu_list').append(li);
        });
    }
})();