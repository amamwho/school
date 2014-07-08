<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- BEGIN CALENDAR -->
<link rel="stylesheet" type="text/css" href="assets/cms/metronic/plugins/fullcalendar/fullcalendar/fullcalendar.css"/>
<script src="assets/cms/metronic/plugins/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
<!-- END CALENDAR -->
<!-- BEGIN PICKER -->
<link rel="stylesheet" type="text/css" href="assets/cms/metronic/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/cms/metronic/plugins/bootstrap-datetimepicker/css/datetimepicker.css"/>
<script src="assets/cms/metronic/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/cms/metronic/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script>
    jQuery(document).ready(function() {  
        $('.startdate').datetimepicker({
            autoclose: true,
            format: "dd-mm-yyyy hh:ii",
        });
        $('.enddate').datetimepicker({
            autoclose: true,
            format: "dd-mm-yyyy hh:ii",
        });
        
        $('#event_add').click(function(){
            if($('#title').val() != '' && $('#startdate').val() != '') {
                $.post("<?= site_url('cms/cms_event/insert'); ?>", { title : $('#title').val(), url : $('#url').val(), startdate : $('#startdate').val(), enddate : $('#enddate').val()}, function(data) {
                    if(data.success == 'true') {
                        $('#calendar').fullCalendar('refetchEvents');
                        $('#title').val('');
                        $('#url').val('');
                        $('#startdate').val('');
                        $('#enddate').val('');
                        alert('เพิ่มกิจกรรมเรียบร้อยแล้ว');
                    }
                }, 'json');
            } else {
                alert('กรอกข้อมูลให้ถูกต้อง!!');
            }
            return false;
        });
        
        $('#btn_cancle').click(function(){
            $('#title').val('');
            $('#url').val('');
            $('#startdate').val('');
            $('#enddate').val('');
            return false;
        });
        
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        
        var h = {};
        
        if (App.isRTL()) {
            if ($('#calendar').parents(".portlet").width() <= 720) {
                $('#calendar').addClass("mobile");
                h = {
                    right: 'title, prev, next',
                    center: '',
                    right: 'agendaDay, agendaWeek, month, today'
                };
            } else {
                $('#calendar').removeClass("mobile");
                h = {
                    right: 'title',
                    center: '',
                    left: 'agendaDay, agendaWeek, month, today, prev,next'
                };
            }                
        } else {
            if ($('#calendar').parents(".portlet").width() <= 720) {
                $('#calendar').addClass("mobile");
                h = {
                    left: 'title, prev, next',
                    center: '',
                    right: 'month,agendaWeek,agendaDay'
                };
            } else {
                $('#calendar').removeClass("mobile");
                h = {
                    left: 'title',
                    center: '',
                    right: 'prev,next,month,agendaWeek,agendaDay'
                };
            }
        }
        
        
        var initDrag = function (el) {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim(el.text()) // use the element's text as the event title
            };
            // store the Event Object in the DOM element so we can get to it later
            el.data('eventObject', eventObject);
            // make the event draggable using jQuery UI
            el.draggable({
                zIndex: 999,
                revert: true, // will cause the event to go back to its
                revertDuration: 0 //  original position after the drag
            });
        }
        
        $('#calendar').fullCalendar('destroy'); // destroy the calendar
        $('#calendar').fullCalendar({ //re-initialize the calendar
            header: h,
            slotMinutes: 15,
            //editable: true,
            //droppable: true, // this allows things to be dropped onto the calendar !!!
            /*drop: function (date, allDay) { // this function is called when something is dropped
                
                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject');
                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject);
                
                // assign it the date that was reported
                copiedEventObject.start = date;
                copiedEventObject.allDay = allDay;
                copiedEventObject.className = $(this).attr("data-class");
                
                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
                
            },*/
            eventClick: function(event){
                if(confirm('ลบกิจกรรม?')) {
                    $.post("<?= site_url('cms/cms_event/delete'); ?>", { id : event.id }, function(data) {
                        if(data.success == 'true') {
                            $('#calendar').fullCalendar('removeEvents',event._id);
                        }
                    },'json');
                }
                return false;
            },
            events: function(start, end, callback) {
                $.post("<?= site_url('cms/cms_event/genEvent'); ?>", function(data) {
                    callback(data);
                },'json');
            }
            /*events: [{
                    title: 'All Day Event',                        
                    start: new Date(y, m, 1),
                    backgroundColor: App.getLayoutColorCode('yellow')
                }, {
                    title: 'Long Event',
                    start: new Date(y, m, d - 5),
                    end: new Date(y, m, d - 2),
                    backgroundColor: App.getLayoutColorCode('green')
                }, {
                    title: 'Repeating Event',
                    start: new Date(y, m, d - 3, 16, 0),
                    allDay: false,
                    backgroundColor: App.getLayoutColorCode('red')
                }, {
                    title: 'Repeating Event',
                    start: new Date(y, m, d + 4, 16, 0),
                    allDay: false,
                    backgroundColor: App.getLayoutColorCode('green')
                }, {
                    title: 'Meeting',
                    start: new Date(y, m, d, 10, 30),
                    allDay: false,
                }, {
                    title: 'Lunch',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    backgroundColor: App.getLayoutColorCode('grey'),
                    allDay: false,
                }, {
                    title: 'Birthday Party',
                    start: new Date(y, m, d + 1, 19, 0),
                    end: new Date(y, m, d + 1, 22, 30),
                    backgroundColor: App.getLayoutColorCode('purple'),
                    allDay: false,
                }, {
                    title: 'Click for Google',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    backgroundColor: App.getLayoutColorCode('yellow'),
                    url: 'http://google.com/',
                }
            ]*/
        });
    });   
</script>
<!-- END PICKER -->
<!-- END PAGE LEVEL PLUGINS -->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green calendar">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-calendar"></i>กิจกรรม
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <form role="form" class="inline-form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="title">หัวข้อกิจกรรม*</label>
                                    <input type="text" class="form-control" name="title" id="title">
                                </div>
                                <div class="form-group">
                                    <label for="url">URL</label>
                                    <input type="text" class="form-control" name="url" id="url">
                                </div>
                                <div class="form-group">
                                    <label for="startdate">วันเวลาที่เริ่มต้น*</label>
                                    <div class="input-group date startdate">
                                        <input type="text" size="16" readonly class="form-control" name="startdate" id="startdate">
                                        <span class="input-group-btn">
                                            <button class="btn default date-set" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="enddate">วันเวลาที่เริ่มต้น</label>
                                    <div class="input-group date enddate">
                                        <input type="text" size="16" readonly class="form-control" name="enddate" id="enddate">
                                        <span class="input-group-btn">
                                            <button class="btn default date-set" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn green" id="event_add">Submit</button>
                                <button type="button" class="btn default" id="btn_cancle">Cancel</button>
                            </div>
                        </form>
                        <hr class="visible-xs"/>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <div id="calendar" class="has-toolbar">
                        </div
                    </div>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>