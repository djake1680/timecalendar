$(document).ready(function(){

    var employeeEvents;

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
                    console.log(d);;
                },
            },
            buttons: [
                'excel', 'pdf', 'print'
            ],
            columns: [
                {'data': 'request_type'},
                {'data': 'start'},
                {'data': 'end'}
            ],
            destroy: true
        });
    });

    function refreshCalendar() {
        $('#calendar').fullCalendar('removeEventSource', "calendar/events");
        $('#calendar').fullCalendar('addEventSource', "calendar/events");
        if($("#addEventModal").is(':visible')) {
            modal.modal('toggle');
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
           var eventStart = moment(event.start).format("MM/DD/YYYY");
           var eventEnd = moment(event.end).subtract(1, "days").format("MM/DD/YYYY");

           $("#addEventModal").modal("show");
           $(".event-modal-title").html("Edit Time Off");

           $('#dateStart').daterangepicker({
               startDate: eventStart,
               singleDatePicker: true,
               showDropdowns: true
           });

           $('#dateEnd').daterangepicker({
               startDate: eventEnd,
               singleDatePicker: true,
               showDropdowns: true
           });
       },
       eventDrop: function(event, delta, row) {
            console.log(event);
           var eventStart = moment(event.start).format("YYYY-MM-DD");
           var eventEnd = moment(event.end).format("YYYY-MM-DD");
           console.log("eventStart", moment(event.start).format("YYYY-MM-DD"));
           console.log("eventEnd", moment(event.end).format("YYYY-MM-DD"));

           $.post("calendar/event_drop", { _token: $('meta[name=csrf-token]').attr('content'), eventStart: eventStart, eventEnd: eventEnd, id: event.id }, function(response) {
               console.log(response);
               refreshCalendar();
           });
        },
        eventResize: function(event) {
            var eventEnd = moment(event.end).format("YYYY-MM-DD");
            console.log(event);
            $.post("calendar/resize", {_token: $('meta[name=csrf-token]').attr('content'), eventEnd: eventEnd, id: event.id }, function(response){
                console.log(response);
                refreshCalendar();
            });
        }
    });


});