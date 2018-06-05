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
        console.log(empID);
        // $.get('/event/' + empID, function(response) {
        //     console.log(response);
        // });
        employeeEvents = $('#employee_event_list').DataTable({
            "dom": 'lBrtip',
            ajax: {
                "url": "/event/" + empID,
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
                {'data': 'start_date'},
                {'data': 'end_date'}
            ],
            destroy: true
        });


    });


});