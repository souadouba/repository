window.onscroll = function() {
    myfunction();
}
let util = document.getElementById("util");
let sticky = navbar.offsetTop;

function myfunction() {
    if(window.pageYOffset >= sticky) {
        navbar.classList.add("sticky");
    }

    else {
        navbar.classList.remove("sticky");
    }
}