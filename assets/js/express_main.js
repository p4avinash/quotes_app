var currentTime = new Date();
var year = currentTime.getFullYear();
$('.year').text(year);

$( document ).ready(function() {
    var base_url = $('#base_url').val()

    $('#register_btn').on('click',function() {
        location.href = `${base_url}Express_main/register`
    })

    $('#login_btn').on('click', function(){
        location.href = `${base_url}Express_main/login`
    })
});
