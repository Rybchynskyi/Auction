// Set the date we're counting down to
var startDate = new Date("Oct 19, 2022 16:40:01").getTime();
var countDownDate = new Date("Oct 19, 2022 17:40:20").getTime();

// Update the count down every 1 second
var x = setInterval(function() {
    // Doday`s date
    var now = new Date().getTime();

    if (now < startDate) {
        var distance = startDate - now;

    }
    else if (now > startDate) {
        document.getElementById('text_before').classList.add("d-none");
        document.getElementById('text_after').classList.remove("d-none");
        document.getElementById('bids_quant').classList.remove("d-none");

        document.getElementById('timer_start').classList.remove("d-none");
        //show buttons
        document.getElementById('bid-btn-1').classList.remove("d-none");
        document.getElementById('bid-btn-2').classList.remove("d-none");
        var distance = countDownDate - now;
    }

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