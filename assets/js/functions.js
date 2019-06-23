function setNewSong(jsonNumera) {
    var music = document.getElementById('music');
    var pButton = document.getElementById('pButton'); // play button

    document.getElementById('song-url').setAttribute('src', jsonNumera.ref_fajla);
    document.getElementById('song-name').innerText = jsonNumera.naziv;
    document.getElementById('song-author').innerText = jsonNumera.ime + " " + jsonNumera.prezime;
    document.getElementById('song-cover').setAttribute('src', jsonNumera.ref_omot);
    document.getElementById("music").load();
    music.currentTime = 0;

    console.log(sessionStorage.getItem("loggedIn"));

    music.play();
    // remove play, add pause
    pButton.className = "";
    pButton.className = "pause";
}