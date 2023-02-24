// Get the button by ID
var back_to_top_button = document.getElementById("back_to_top");

// When the user scrolls down 100px from the top of the page, show the button
window.onscroll = function () { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        back_to_top_button.style.display = "block";
    } else {
        back_to_top_button.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the page
function backToTop() {
    var body = $("html, body");
    body.stop().animate({ scrollTop: 0 }, 500, "swing", function () {
    });
    console.log("Back to top animation has finished.");
}