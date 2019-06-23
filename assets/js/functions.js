function setNewSong(jsonNumera, play = true) {
    var music = document.getElementById('music');
    var pButton = document.getElementById('pButton'); // play button

    document.getElementById('song-id').setAttribute("value", jsonNumera.track_id);
    document.getElementById('song-url').setAttribute('src', jsonNumera.ref_fajla);
    document.getElementById('song-name').innerText = jsonNumera.naziv;
    document.getElementById('song-author').innerText = jsonNumera.ime + " " + jsonNumera.prezime;
    document.getElementById('song-cover').setAttribute('src', jsonNumera.ref_omot);
    document.getElementById("music").load();
    music.currentTime = 0;

    if(play)
    {
        music.play();
        // remove play, add pause
        pButton.className = "";
        pButton.className = "pause";
    }
}

function trackExistInQueue(obj, list) {
    var i;
    for (i = 0; i < list.length; i++) {
        if (list[i].track_id === obj.track_id) {
            return true;
        }
    }

    return false;
}

function addToQueue(jsonNumera) {
    if (sessionStorage.getItem("queue") != null) {
        var stored = JSON.parse(sessionStorage.getItem("queue"));

        if(trackExistInQueue(jsonNumera, stored) === false)
        {
            stored.push(jsonNumera);
            sessionStorage.setItem("queue", JSON.stringify(stored));
        }

    } else {
        var notStored = [];
        notStored.push(jsonNumera);
        sessionStorage.setItem("queue", JSON.stringify(notStored));
        setNewSong(jsonNumera);
    }
}

function deleteQueue() {
    sessionStorage.removeItem("queue");
}

