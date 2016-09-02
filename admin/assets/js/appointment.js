$(document).ready(function () {
    pick_date();
    $("#book_app_form").validate({
        rules: {
            dr_list: {
                required: true,
            },
            app_date: {
                required: true,
            },
            p_list: {
                required: true,
            },
            app_time: {
                required: true,
            },
        },
        messages: {
            dr_list: {
                required: "Please select doctor",
            },
            app_date: {
                required: "Please select the appointment date",
            },
            p_list: {
                required: "Please select patient",
            },
            app_time: {
                required: "Please select time"
            },
        }
    });
});
function pick_date()
{
    var nowDate = new Date();
    var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
    $('#app_date').datepicker({
        daysOfWeekDisabled: [0, 7],
        startDate: today
    });
}
function chk_for_appointment()
{
    remove_op_color();
    var dr_id = $("#dr_list option:selected").val();
    var app_date = $("#app_date").val();
    if (dr_id && app_date)
    {
        $('#app_time').prop('disabled', false);
        $.ajax({
            url: SITE_URL+"appointment/chk_available_appointment",
            type: "POST",
            data: {id: dr_id, app_date: app_date},
            success: function (data) {
                if (data)
                {
                    var obj = jQuery.parseJSON(data);
                    if (obj.disabled_ap_time_list)
                    {
                        $.each(obj.disabled_ap_time_list, function (key, value) {
                            $('#app_time option[value="' + value.ap_time + '"]').css('background-color', 'red')
                            $('#app_time option[value="' + value.ap_time + '"]').prop('disabled', true);
                            //console.log(key + ": " + value.ap_time);
                        });
                    }
                    else
                    {
                        remove_op_color();
                    }
                }
            }
        });
    }
    else
    {
        $('#app_time').prop('disabled', true);
    }
}
function remove_op_color()
{
    $("#app_time option").each(function () {
        this.disabled = false;
        if (this.value == 'Select Time')
        {
            this.selected = true;
            this.disabled = false;
        }
        $(this).css('background-color', 'white');
    });
}