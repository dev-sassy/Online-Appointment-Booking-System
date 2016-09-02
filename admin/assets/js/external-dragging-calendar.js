$(document).ready(function () {
    fetch_data();
    if (json_events)
    {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            eventLimit: true, // for all non-agenda views
            editable: true,
            events: JSON.parse(json_events),
            eventClick: function (calEvent, jsEvent, view) {
                disp_detail(calEvent, jsEvent, view);
            },
            // events: JSON.parse('[{"id":"1","title":"New Event","start":"2016-08-29T09:00:00+05:30","end":"2016-08-29T09:00:00+05:30","allDay":false}]'),
            timeFormat: 'H(:mm)'
        });
    }
    else
    {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            editable: true,
            timeFormat: 'H(:mm)'
        });
    }
});

function fetch_data()
{
    $('.disp').empty();
    var doctor = $('#dr_list').val();
    $.ajax({
        url: SITE_URL + 'users/staff/fetch_all_appointment',
        type: 'POST',
        //data: 'type=fetch',
        data: {dr_id: doctor},
        async: false,
        success: function (response) {
            json_events = response;
            $('#calendar').fullCalendar('removeEvents');
            if (json_events)
            {
                $('#calendar').fullCalendar('addEventSource', JSON.parse(json_events));
            }
            $('#calendar').fullCalendar('refetchEvents')
            // console.log(json_events);
        }
    });
}

function disp_detail(calEvent, jsEvent, view)
{
    var doctor = $('#dr_list').val()
    $.ajax({
        url: SITE_URL + 'users/staff/app_detail',
        type: 'POST',
        //data: 'type=fetch',
        data: {date: calEvent.start.format("YYYY-MM-DD"), doctor: doctor},
        async: false,
        beforeSend: function () {
            $('.disp').empty();
        },
        success: function (response) {
            if (response)
            {
                var obj = jQuery.parseJSON(response);
                if (obj)
                {
                    $.each(obj, function (key, value) {
                        $('.disp').append('<div class="form-group clearfix">\n\
                                                <div class="col-md-12">\n\
                                                Doctor Name :<b>' + value.dr_username + '</b><br>\n\
                                                Patient Name :<b>' + value.p_fname + ' ' + value.p_fname + '</b><br>\n\
                                                Appointment Date :<b>' + value.ap_date + '</b><br>\n\
                                                Appointment Time :<b>' + value.ap_time + '</b><br>\n\
                                                <div>\n\
                                            </div>');
                        // console.log(key + ": " + value.dr_username);
                    });
                }
            }

        }
    });
}


       