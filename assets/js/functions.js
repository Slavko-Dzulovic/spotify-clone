function setNewSong(jsonNumera) {
    var music = document.getElementById('music');
    var pButton = document.getElementById('pButton'); // play button

    document.getElementById('song-id').setAttribute("value", jsonNumera.id);
    document.getElementById('song-url').setAttribute('src', jsonNumera.ref_fajla);
    document.getElementById('song-name').innerText = jsonNumera.naziv;
    document.getElementById('song-author').innerText = jsonNumera.ime + " " + jsonNumera.prezime;
    document.getElementById('song-cover').setAttribute('src', jsonNumera.ref_omot);
    document.getElementById("music").load();
    music.currentTime = 0;

    music.play();
    // remove play, add pause
    pButton.className = "";
    pButton.className = "pause";
}

function addToQueue(jsonNumera)
{
    if(sessionStorage.getItem("queue") != null)
    {
        var stored = JSON.parse(sessionStorage.getItem("queue"));
        
        if(!stored.includes(jsonNumera))
        {
            stored.push(jsonNumera);
            sessionStorage.setItem("queue", JSON.stringify(stored));
        }
    }
    else
    {
        var notStored = [];
        notStored.push(jsonNumera);
        sessionStorage.setItem("queue", JSON.stringify(notStored));
    }
}

function deleteQueue()
{
    sessionStorage.removeItem("queue");
}

