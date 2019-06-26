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


var i = 0;
function toggle() {
    if (i == 0) {
        document.getElementById("menu").style.left = 0;
        i = 1;
        document.getElementById("hamburger").style.background = '#1C1C1E';
    }
    else {
        document.getElementById("menu").style.left = '-100%';
        i = 0;
        document.getElementById("hamburger").style.background = '#2ecc71';
        i = 0;
    }
}
$(document).ready(function () {
    $('.toggle').click(function () {
        $('.toggle').toggleClass('active');
    });
});

$(document).ready(function () {
    /*$('.fa-peace').click(function () {
        $('.ffa').fadeToggle("slow");
      });*/
    $('[data-toggle="tooltip"]').tooltip();

    $('.album-list').click(function () {
        $(this).parent().find(".album-song-list").fadeToggle("fast");
    });
});

$(window).on("load", function () {
    $(".loader-wrapper").fadeOut("slow");
    $(".album-song-list").fadeOut("fast");
});