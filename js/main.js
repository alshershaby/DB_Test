// fixed navbar 

$(document).ready(function() {

    // Function to change the nav-bar on scroll
    $(window).scroll(function() {
        ($(window).scrollTop() >= 80) ? (
            $('.fixed-top').addClass('scrolled'),
            $('.the-bass').addClass('scrolled'),
            $('.light-logo').addClass('d-none'),
            $('.dark-logo').removeClass('d-none')
        ) : (
            $('.fixed-top').removeClass('scrolled'),
            $('.the-bass').removeClass('scrolled'),
            $('.light-logo').removeClass('d-none'),
            $('.dark-logo').addClass('d-none')
        );
    });

    // Drop Down Function
    $('#menuButton').on('change', function() {
        ($('#menuButton').is(':checked')) ? (
            $('.the-bass').addClass('dropped')
        ) : (
            $('.the-bass').removeClass('dropped')
        );
    });

});

const typedTextSpan = document.querySelector(".typed-text");
const cursorSpan = document.querySelector(".cursor");

const textArray = ["websites", "softwares", "apps"];
const typingDelay = 200;
const erasingDelay = 100;
const newTextDelay = 500; // Delay between current and next text
let textArrayIndex = 0;
let charIndex = 0;

function type() {
    if (charIndex < textArray[textArrayIndex].length) {
        if (!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
        typedTextSpan.textContent += textArray[textArrayIndex].charAt(charIndex);
        charIndex++;
        setTimeout(type, typingDelay);
    } else {
        cursorSpan.classList.remove("typing");
        setTimeout(erase, newTextDelay);
    }
}

function erase() {
    if (charIndex > 0) {
        if (!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
        typedTextSpan.textContent = textArray[textArrayIndex].substring(0, charIndex - 1);
        charIndex--;
        setTimeout(erase, erasingDelay);
    } else {
        cursorSpan.classList.remove("typing");
        textArrayIndex++;
        if (textArrayIndex >= textArray.length) textArrayIndex = 0;
        setTimeout(type, typingDelay + 1100);
    }
}

document.addEventListener("DOMContentLoaded", function() { // On DOM Load initiate the effect
    if (textArray.length) setTimeout(type, newTextDelay + 250);
});