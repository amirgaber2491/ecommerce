function check_all(){
    $('input[class="checkedIds"]:checkbox').each(function (){
        if ($('input[class*="checkAll"]:checkbox:checked').length === 0){
            $(this).prop('checked', false);

        }else {
            $(this).prop('checked', true);
        }
    })
}
$(document).on('change', '.checkedIds',function () {
    if ($('.checkedIds:checked').length === $('.checkedIds').length) {
        $('.checkAll').prop('checked', true);
    } else {
        $('.checkAll').prop('checked', false);
    }
})
let test = false;
$(document).on('click', '.deleteAll', function (){
    let id_checked = $('input[class = "checkedIds"]:checkbox:checked').length;
    if (id_checked > 0){
        $('#deleteAllModel').modal('show');
        $('#record_count').text(id_checked);
        test = true;
    }else {
        $('#preventDefaultModel').modal('show');
    }

});

$('#saveDelete').on('click', function (){
    if (test){
        $('#formData').submit();
    }
});


