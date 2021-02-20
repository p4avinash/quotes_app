var set_year = () =>{
    var currentTime = new Date();
    var year = currentTime.getFullYear();
    var current_year = document.querySelector('.year').append(year);
}

set_year();