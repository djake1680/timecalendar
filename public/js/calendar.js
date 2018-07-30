$(document).ready(function(){

    var employeeEvents;

    $('#event_delete').on("click", function(e) {
        e.preventDefault();
        let eventid = this.getAttribute('eventid');
        $.ajax({
            url: '/events/' + eventid,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: deleteSuccess
        });
    });

    function deleteSuccess(data) {
        refreshCalendar("#editEventModal");
    }

    $('#employee-search-list').select2({
        placeholder: {
            id: "-1",
            placeholder: "Select an employee"
        }
    });

    $('#employee-search-list').select2({
        selectOnClose: true
    }).on('change', function(e) {
        let empID = $(this).val();
        employeeEvents = $('#employee_event_list').DataTable({
            "dom": 'lBrtip',
            ajax: {
                "url": "/events/" + empID,
                "type": "GET",
                "data": function(d) {
                    console.log(d);
                },
            },
            buttons: [
                'excel', 'pdf', 'print'
            ],
            columns: [
                {'data': 'request_type'},
                {'data': 'start',
                    render: function(data, type, row) {
                        let start = moment(data, "YYYY-MM-DD").format('M/DD/YYYY');
                        return start;
                    }
                },
                {'data': 'end',
                    render: function(data, type, row) {
                        let end = moment(data, 'YYYY-MM-DD').subtract(1, 'days').format('M/DD/YYYY');
                        return end;
                    }
                }
            ],
            destroy: true
        });
    });

    function refreshCalendar(modal) {
        $('#calendar').fullCalendar('removeEventSource', "calendar/events");
        $('#calendar').fullCalendar('addEventSource', "calendar/events");
        if($(modal).is(':visible')) {
            $(modal).modal('hide');
        }
    }

    $('#calendar').fullCalendar({
        editable: true,
        eventDurationEditable: true,
        nextDayThreshold: "00:00:00",
        selectable: true,
        selectHelper: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: {
            url: 'calendar/events'
        },
        eventRender: function(event, element, view) {
            element.css('color', 'white');
           if(event.request_type === "sick") {
               element.css('background-color', '#33cc00');
           }
        },
        select: function(start, end, allDay) {
            start = $.fullCalendar.formatDate(start, "MM/DD/YYYY");
            end = start;
            $("#addEventModal").modal("show");
            $(".event-modal-title").html("Add Time Off");

            $('#dateStart').daterangepicker({
               startDate: start,
               singleDatePicker: true,
               showDropdowns: true
            });

           $('#dateEnd').daterangepicker({
               startDate: end,
               singleDatePicker: true,
               showDropdowns: true
           });
       },
       eventClick: function(event, jsEvent, view) {
           let eventStart = moment(event.start).format("MM/DD/YYYY");
           let eventEnd = moment(event.end).subtract(1, "days").format("MM/DD/YYYY");
           let eventTitle = event.title;
           let requestType = event.request_type.split("_");
           let upperRequestType = "";
           for(let i = 0; i < requestType.length; i++) {
               upperRequestType += requestType[i].charAt(0).toUpperCase() + requestType[i].slice(1) + " ";
           }

           document.getElementById("edit_event_form").action = "http://timecalendar.test/events/" + event.id;
           document.getElementById("event_delete").setAttribute("eventid", event.id);
           // put together time off request string


           $("#edit-form-employee-name").html(" <p>" + eventTitle + "</p>");
           $("#edit-form-employee-name").append(" <input type='hidden' name='employee_search_list' value='"+ event.employee_id +"'/>");
           $("#editEventModal").modal("show");
           $(".edit-event-modal-title").html("Edit Time Off");
           $("#edit_time_category_select").html(upperRequestType.trim());
           $("#edit_time_category_select").append("<input type='hidden' name='request_type' value='"+ event.request_type +"'/>");

           $('#editDateStart').daterangepicker({
               startDate: eventStart,
               singleDatePicker: true,
               showDropdowns: true
           });

           $('#editDateEnd').daterangepicker({
               startDate: eventEnd,
               singleDatePicker: true,
               showDropdowns: true
           });
       },
       eventDrop: function(event, delta, row) {
           var eventStart = moment(event.start).format("YYYY-MM-DD");
           var eventEnd = moment(event.end).format("YYYY-MM-DD");

           $.post("calendar/event_drop", { _token: $('meta[name=csrf-token]').attr('content'), eventStart: eventStart, eventEnd: eventEnd, id: event.id }, function(response) {
               refreshCalendar("#addEventModal");
               $('#employee_event_list').DataTable().ajax.reload();
           });
        },
        eventResize: function(event) {
            var eventEnd = moment(event.end).format("YYYY-MM-DD");
            $.post("calendar/resize", {_token: $('meta[name=csrf-token]').attr('content'), eventEnd: eventEnd, id: event.id }, function(response){
                refreshCalendar("#addEventModal");
                $('#employee_event_list').DataTable().ajax.reload();
            });
        }
    });


});