"use strict";

// tee funktio 'showImages', joka
// lisää ladatun HTML-sisällön <ul> elementin sisälle
const showImages = () => {
	fetch('kuvat.html').then((response)=>{
		return response.text();
	}).then((text)=>{
		console.log(text);
		//lisää ladatun HTML-sisällön <ul> elementin sisälle
		const ul = document.querySelector('ul');
		ul.innerHTML = text;
	})

  
};
showImages();

