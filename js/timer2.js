// Set the date we're counting down to
var countDownDate = new Date("Oct 12, 2022 19:59:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now an the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="demo"
    document.getElementById("days_left").innerHTML = "⏳ " + days;

    document.getElementById("timer").innerHTML = " ⏰ " + hours + ":" + minutes + ":" + seconds;

    // If the count down is over, write some text
    if (distance < 0) {
        clearInterval(x);

        document.getElementById('bid-btn-1').remove();
        document.getElementById('bid-btn-2').remove();
        document.getElementById('timer_start').remove();
        document.getElementById('bid-content').innerHTML = '';
        document.getElementById('timer_end').style.display = 'block';
    }
}, 0);