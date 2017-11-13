'use strict';

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


document.querySelector('form').addEventListener('submit',upload);



