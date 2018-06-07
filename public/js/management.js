$(document).ready(function(){
    console.log("ready");

    $('#employee_start_date').daterangepicker({
        startDate: "6/06/2018",
        singleDatePicker: true,
        showDropdowns: true
    });
});