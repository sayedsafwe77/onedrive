let time_div = document.querySelector('.time_dev');
var myModal = new bootstrap.Modal(document.querySelector(".modal"), {});
let modal_btn = document.querySelector('.modal-btn');
console.log(myModal);
document.querySelector('.modal-body').textContent = period_msg;
modal_btn.addEventListener('click', continueWork);
if (isEnd == 'true') {
    myModal.show();
}
displayTime(true)

function displayTime(first = false) {
    if (isEnd === 'true') {
        // let answer = confirm('time up would you like to continue');
        // if (answer) {
        //     window.location.reload();
        // }
        return;
    }
    if (!first) {
        getCurrentTime();
    }
    console.log(hours, minutes, seconds);
    document.querySelector('.time_hour').innerHTML = hours;
    document.querySelector('.time_minutes').innerHTML = minutes;
    document.querySelector('.time_second').innerHTML = seconds;
}

function continueWork(params) {
    myModal.hide();
    window.location.href = location.origin + location.pathname + '?refresh=true'
}

function refreshTime() {
    var url = window.location.href;
    if (url.indexOf('?') > -1) {
        url += '&refresh=1'
    } else {
        url += '?refresh=1'
    }
    window.location.href = url;
    // window.location.reload();

}

function getCurrentTime() {
    if (seconds == 0) {
        seconds = 59;
        if (minutes == 0) {
            minutes = 59;
            if (hours == 0) {
                // let answer = confirm('time up would you like to continue');
                // if (answer) {
                //     window.location.reload();
                // } else {
                // }
                clearInterval(counter_id);
            } else {
                hours--;
            }
        } else {
            minutes--;
        }
    } else {
        seconds--;
    }
}

let counter_id = setInterval(displayTime, 1000);