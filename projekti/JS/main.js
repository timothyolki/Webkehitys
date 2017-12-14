const httpRequest = new XMLHttpRequest();

httpRequest.addEventListener('load', clipsLoaded);
httpRequest.open('GET', 'https://api.twitch.tv/kraken/clips/top?limit=10&channel=playoverwatch');
httpRequest.setRequestHeader('Client-ID', 'twju3nujb0re80iedmtl9ritk3kig2');
httpRequest.setRequestHeader('Accept', 'application/vnd.twitchtv.v5+json');
httpRequest.send();

function clipsLoaded() {
  const clipsDisplay = document.getElementById('clips-display');
  const clipList = JSON.parse(httpRequest.responseText);

  clipList.clips.forEach((clip, index, array) => {
    clipItem = document.createElement('div');
    clipItem.innerHTML = clip.embed_html;
    clipItem.querySelector('iframe').src = `${clipItem.querySelector('iframe').src}&autoplay=false`;
    clipsDisplay.appendChild(clipItem);
  });
}


/*var nav = document.getElementById('access_nav'),
    body = document.body;

nav.addEventListener('click', function(e) {
  body.className = body.className? '' : 'with_nav';
  e.preventDefault();
});
*/
//ei pakosti toimi v
/*
var channel = "monstercat";
$( document ).ready( function() {
  $.ajax( {
    dataType: "jsonp",
    type: "GET",
    url: "https://api.twitch.tv/kraken/channels/" + channel,
    success: function( data ) {
      var title = data.status;
      $( "#streamtitle" ).html( title );
    }
  });
});
*/
//hakutesti
const haku = sana => {

  httpRequest.addEventListener('load', clipsLoaded);
  httpRequest.open('GET', `https://api.twitch.tv/kraken/search/streams?query=${sana}`); //tähän riville haku, hakee annetun sanan perusteella
  httpRequest.setRequestHeader('Client-ID', 'twju3nujb0re80iedmtl9ritk3kig2');
  httpRequest.setRequestHeader('Accept', 'application/vnd.twitchtv.v5+json');
  httpRequest.send();
};


const nappi = document.querySelector('#hakunappi');
nappi.addEventListener('click', () => {
  const hakusana = document.querySelector('#clipsearch').value;
  haku(hakusana);

});

// MODAL
const modal = document.getElementById('myModal');

// Get the button that opens the modal
const btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
const span = document.getElementsByClassName("close")[0];


// When the user clicks on the button, open the modal
btn.onclick = () => {
  modal.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
span.onclick = () => {
  modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = event => {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

function openTab(evt, tabName) {
  let i;
  let tabcontent;
  let tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}


// sivulla on p elementti 'message', jossa olisi tarkoitus näyttää palvelimen vastaus
// valitse se, ja tallenna muuttujaan
const viesti=(evt)=>{
  document.getElementByID('message');
}
// tee funktio 'upload', joka
// - estää lomakkeen lähetyksen
// - kirjoittaa 'message' elementtiin 'Upload in progress...'
// - hakee lomakkeesta file kentän
// - tekee FormData -olion ja lisää käyttäjän valitseman tiedoston siihen
// - lähettää tiedoston fetch -metodilla osoitteeseen 'upload.php'
// - kun tiedoston lähetys on valmis, kirjoittaa palvelimen vastauksen 'message' elementtiin
const upload= (evt)=>{
  evt.preventDefault();
  console.log("Heippa");
  document.getElementById('message').innerHTML = "Upload in progress";

  document.getElementById('fileToUpload').elements
  const input = document.querySelector('input[type="file"]');
  // tehdään FormData -objekti
  const data = new FormData();
  // lisätään tiedosto FormData -objektiin.
  // Huomaa että files on taulukko. Voit siis lähettää useampia tiedostoja.
  data.append('fileToUpload', input.files[0]);
  // tehdään olio asetuksille
  const settings = {
    method: 'POST',
    body: data
  };
  // käynnistetään fetch. Tässä tapauksessa palvelin kertoo
  // uploudin onnistumisen/epäonnistumisen tekstillä. Voi olla myös esim json.
  fetch('upload.php', settings).then((response) => {
    return response.text();
  }).then((text) => {
    document.getElementById('message').innerText = text;
  });


}

// tee tapahtumakuuntelija, joka kutsuu 'upload' funktiota, kun lomake lähetetään


document.querySelector('#imgform').addEventListener('submit',upload);
