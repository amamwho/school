$(function(){
    // Begin the Carousel
    $('.carousel').carousel({
        interval: 5000
    })
    // End the Carousel
    // Begin ColorBox
        $(".gallery").colorbox({rel:'gallery', transition:"fade"});
        $(".intro").colorbox({iframe:true, width:"90%", height:"90%"});
    //  End ColorBox 
    // Begin Calendar
    var options = {
        events_source: 'main/eventCalendar',
        view: 'month',
        tmpl_path: 'assets/front/plugin/bootstrap-calendar/tmpls/',
        language: 'th-TH',
        tmpl_cache: false,
        //day: '2013-03-12',
        onAfterEventsLoad: function(events) {
            if(!events) {
                return;
            }
            var list = $('#eventlist');
            list.html('');

            $.each(events, function(key, val) {
                $(document.createElement('li'))
                .html('<a href="' + val.url + '">' + val.title + '</a>')
                .appendTo(list);
            });
        },
        onAfterViewLoad: function(view) {
            $('h3.calendar').text(this.getTitle());
            $('.btn-group button').removeClass('active');
            $('span[data-calendar-view="' + view + '"]').addClass('active');
        },
        classes: {
            months: {
                general: 'label'
            }
        }
    };
    var calendar = $('#calendar').calendar(options);
    $('.btn-group span[data-calendar-nav]').each(function() {
        var $this = $(this);
        $this.click(function() {
            calendar.navigate($this.data('calendar-nav'));
        });
    });

    $('.btn-group span[data-calendar-view]').each(function() {
        var $this = $(this);
        $this.click(function() {
            calendar.view($this.data('calendar-view'));
        });
    });

    $('#first_day').change(function(){
        var value = $(this).val();
        value = value.length ? parseInt(value) : null;
        calendar.setOptions({
            first_day: value
        });
        calendar.view();
    });

    $('#language').change(function(){
        calendar.setLanguage($(this).val());
        calendar.view();
    });

    $('#events-in-modal').change(function(){
        var val = $(this).is(':checked') ? $(this).val() : null;
        calendar.setOptions({
            modal: val
        });
    });
    $('#events-modal .modal-header, #events-modal .modal-footer').click(function(e){
        //e.preventDefault();
        //e.stopPropagation();
        });
    // End Calendar
    $('.img').mouseover(function(){
         $(this).children('.caption').children(".ani").animate({top:"0px"});
    });
    $('.img').mouseleave(function(){
         $(this).children('.caption').children(".ani").animate({top:"60px"});
    });
    
    $('li.dropdown').mouseover(function(){
         $(this).addClass("open");
    });
    $('li.dropdown').mouseleave(function(){
         $(this).removeClass("open");
    });
});