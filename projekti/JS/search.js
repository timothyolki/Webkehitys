'use strict';

var httpRequest = new XMLHttpRequest();


httpRequest.addEventListener('load', clipsLoaded);
httpRequest.open('GET', 'https://api.twitch.tv/kraken/search/streams?query=' + getParameterByName("clipsearch")); //tähän riville haku, hakee annetun sanan perusteella
httpRequest.setRequestHeader('Client-ID', 'twju3nujb0re80iedmtl9ritk3kig2');
httpRequest.setRequestHeader('Accept', 'application/vnd.twitchtv.v5+json');
httpRequest.send();

function getParameterByName(name, url) {
  if (!url) url = window.location.href;
  name = name.replace(/[\[\]]/g, "\\$&");
  var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
      results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}


function clipsLoaded() {
  var clipList = JSON.parse(httpRequest.responseText);
  const streams  = clipList.streams;
  console.log(clipList);
  let html = '';
  streams.forEach((clip) => {
    html += `<li>
    <a href="#" data-clip="${clip.channel.name}"><img src="${clip.preview.medium}"></a>
    <p>${clip.channel.name}</p>
 
</li>`;
    document.querySelector('#tulokset').innerHTML = html;
    teeLinkit();
  });
}


const teeLinkit = () => {
  const linkit = document.querySelectorAll('#tulokset a');
  linkit.forEach((linkki) => {
    linkki.addEventListener('click', (evt) => {
      evt.preventDefault();
      const channelid = linkki.dataset.clip;
      haekanava(channelid);
    })

  })
};

const haekanava = (channelid) => {
  const myHeaders = new Headers();
  myHeaders.append('Client-ID', 'twju3nujb0re80iedmtl9ritk3kig2');
  myHeaders.append('Accept', 'application/vnd.twitchtv.v5+json');
  const asetukset = {
    headers: myHeaders
  };
  const url = 'https://api.twitch.tv/kraken/clips/top?limit=10&channel='+channelid;

  fetch(url, asetukset)
  .then((tulos) => {
    console.log(tulos);
    return tulos.json();
  })
  .then( (json) => {
    console.log(json);
    channelLoaded(json);
  });

};


const channelLoaded = (clipList) => {
  const clipsDisplay = document.getElementById('clips-display');
  clipsDisplay.innerHTML = '';

  clipList.clips.forEach(function(clip, index, array) {
    console.log(clip);
    const html = `<a href="${clip.url}"><img src="${clip.thumbnails.medium}"><p>${clip.title}</p></a>`;
    const clipItem = document.createElement('div');
    clipItem.innerHTML = html;
    clipsDisplay.appendChild(clipItem);
  });
};