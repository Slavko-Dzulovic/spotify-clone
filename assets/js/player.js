document.addEventListener("DOMContentLoaded", function (event) {

    var music = document.getElementById('music'); // id for audio element
    var duration; // Duration of audio clip
    var pButton = document.getElementById('pButton'); // play button

    var nextButton = document.getElementById('nextButton');
    var prevButton = document.getElementById('prevButton');

    var playhead = document.getElementById('playhead'); // playhead
    var timeline = document.getElementById('timeline'); // timeline

// timeline width adjusted for playhead
    var timelineWidth = timeline.offsetWidth - playhead.offsetWidth;

// play button event listenter
    pButton.addEventListener("click", play);
    nextButton.addEventListener("click", playFromQueue);
    prevButton.addEventListener("click", playFromQueueBack);

// timeupdate event listener
    music.addEventListener("timeupdate", timeUpdate, false);

// makes timeline clickable
    timeline.addEventListener("click", function (event) {
        moveplayhead(event);
        music.currentTime = duration * clickPercent(event);
    }, false);

// returns click as decimal (.77) of the total timelineWidth
    function clickPercent(event) {
        return (event.clientX - getPosition(timeline)) / timelineWidth;

    }

// makes playhead draggable
    playhead.addEventListener('mousedown', mouseDown, false);
    window.addEventListener('mouseup', mouseUp, false);

// Boolean value so that audio position is updated only when the playhead is released
    var onplayhead = false;

// mouseDown EventListener
    function mouseDown() {
        onplayhead = true;
        window.addEventListener('mousemove', moveplayhead, true);
        music.removeEventListener('timeupdate', timeUpdate, false);
    }

// mouseUp EventListener
// getting input from all mouse clicks
    function mouseUp(event) {
        if (onplayhead == true) {
            moveplayhead(event);
            window.removeEventListener('mousemove', moveplayhead, true);
            // change current time
            music.currentTime = duration * clickPercent(event);
            music.addEventListener('timeupdate', timeUpdate, false);
        }
        onplayhead = false;
    }

// mousemove EventListener
// Moves playhead as user drags
    function moveplayhead(event) {
        var newMargLeft = event.clientX - getPosition(timeline);

        if (newMargLeft >= 0 && newMargLeft <= timelineWidth) {
            playhead.style.marginLeft = newMargLeft + "px";
        }
        if (newMargLeft < 0) {
            playhead.style.marginLeft = "0px";
        }
        if (newMargLeft > timelineWidth) {
            playhead.style.marginLeft = timelineWidth + "px";
        }
    }

// timeUpdate
// Synchronizes playhead position with current point in audio
    function timeUpdate() {
        var playPercent = timelineWidth * (music.currentTime / duration);
        playhead.style.marginLeft = playPercent + "px";
        if (music.currentTime == duration) {
            pButton.className = "";
            pButton.className = "play";
        }

        var currDuration = music.currentTime; //song is object of audio.  song= new Audio();

        var sec = new Number();
        var min = new Number();
        currsec = Math.floor(currDuration);
        currmin = Math.floor(currsec / 60);
        currmin = currmin >= 10 ? currmin : '0' + currmin;
        currsec = Math.floor(currsec % 60);
        currsec = currsec >= 10 ? currsec : '0' + currsec;

        var maxDuration = duration;

        var sec = new Number();
        var min = new Number();
        sec = Math.floor(maxDuration);
        min = Math.floor(sec / 60);
        min = min >= 10 ? min : '0' + min;
        sec = Math.floor(sec % 60);
        sec = sec >= 10 ? sec : '0' + sec;

        document.getElementById('song-current-time').innerHTML = currmin + ":" + currsec + "/" + min + ":" + sec;
    }

//Play and Pause
    function play() {

        // start music
        if (music.paused) {
            music.play();
            // remove play, add pause
            pButton.className = "";
            pButton.className = "pause";
        } else { // pause music
            music.pause();
            // remove pause, add play
            pButton.className = "";
            pButton.className = "play";
        }
    }

    function playFromQueue() {
        if (sessionStorage.getItem("queue") != null) {
            var stored = JSON.parse(sessionStorage.getItem("queue"));

            if (stored[0].track_id == document.getElementById('song-id').getAttribute("value")) {
                var track = stored[0];
                stored.shift();
                stored.push(track);
            }
            var track = stored[0];

            sessionStorage.setItem("queue", JSON.stringify(stored));
            setNewSong(track);
        }
    }

    function playFromQueueBack() {
        if (sessionStorage.getItem("queue") != null) {
            var stored = JSON.parse(sessionStorage.getItem("queue"));
            var n = stored.length;
            if (stored[n - 1].track_id == document.getElementById('song-id').getAttribute("value")) {
                var track = stored[n - 1];
                stored.pop();
                stored.unshift(track);
            }
            var track = stored[n - 1];
            sessionStorage.setItem("queue", JSON.stringify(stored));
            setNewSong(track);
        }
    }

    music.addEventListener("ended", playFromQueue);

// Gets audio file duration
    music.addEventListener("canplaythrough", function () {
        duration = music.duration;
    }, false);

// getPosition
// Returns elements left position relative to top-left of viewport
    function getPosition(el) {
        return el.getBoundingClientRect().left;
    }

    /* DOMContentLoaded*/
});