$(document).ready(function () {
    var music = document.getElementById('music');
    music.volume = 0.5;
    $("#volume").slider({
        min: 0,
        max: 100,
        value: 50,
        range: "min",
        slide: function(event, ui) {
            setVolume(ui.value / 100);
        }
    });

    function setVolume(myVolume) {
        music.volume = myVolume;
    }
});