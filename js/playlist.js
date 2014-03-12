
var xmlhttp;
var xRequests = [];
var song_ids = new Array();
var song_titles = new Array();
var song_artists = new Array();
var playlist = new Array();

function getPlaylist(){  
  var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        if (xhr.readyState==4 && xhr.status==200) {
            console.log("ready state = 4");
            json = JSON.parse(xhr.responseText);
            songs = json.songs;

            // Past
            var past_arty = document.getElementById("past_art");
            past_arty.src = songs[0].artwork;
            past_arty.style.opacity = "0.5";

            // Present
            var curr_art = document.getElementById("current_art");
            curr_art.src = songs[1].artwork;
            document.getElementById("playingtitle").innerHTML = "<font color='white' face='arial' size='200'><b>"+(songs[1].title)+"</b></font>";
            document.getElementById("playingartist").innerHTML = "<font color='white' face='arial' size='200'><b>"+(songs[1].name)+"</b></font>";

            // Future
            var future_art = document.getElementById("future_art");
            future_art.src = songs[2].artwork;
            future_art.style.opacity = "0.5";

            // Distant Future
            var future_future_art = document.getElementById("future_future_art");
            future_future_art.src = songs[3].artwork;
            future_future_art.style.opacity = "0.25";
        }
    };

    xhr.open("GET", "proxy.php?action=song", true);
    xhr.timeout = 4000;
    xhr.ontimeout = function () { console.log("Timed out!!!"); }
    xhr.send();
} 

setInterval(getPlaylist(), 60000);