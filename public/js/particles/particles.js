$(document).ready(function(){
    /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
    particlesJS.load('particles-js', '../../assets/mine.json', function() {
        console.log('callback - particles.js config loaded');
    });

    // var
    //     degrees = 0,
    //
    //     timer = setInterval(function(){
    //         degrees++;
    //         $('body').css('background-image', 'linear-gradient(' + degrees + 'deg, #59c173, #a17fe0, #5d26c1,#59c173)')
    //     }, 10000/360);
})