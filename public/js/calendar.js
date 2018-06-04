$(document).ready(function(){

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
        $.get('/event/' + empID, function(response) {
            console.log(response);
        });

    });

});