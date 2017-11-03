
// Tee funktio 'showImages', joka
// lataa kuvat.json tiedoston, joka sisältää näytettävät kuvat taulukkona

// tee silmukka joka lisää merkkijonoon (string) jokaisesta kuvasta alla olevan HTML:n
/*
`<li>
    <figure>
        <a href="img/original/filename.jpg"><img src="img/thumbs/filename.jpg"></a>
        <figcaption>
            <h3>Title</h3>
        </figcaption>
    </figure>
</li>`
*/
// Silmukan jälkeen tulosta HTML-koodi (output) <ul>-elementin sisälle innerHTML:n avulla

"use strict";



const showImages = () => {
	fetch('kuvat.json')
	.then((response)=>{
		return response.json();
	})
	.then((json)=>{
		console.log(json);
		let html = '';
		json.forEach((kuva)=>{
		html += `<li>
					<figure>
			        		<a href="img/original/${kuva.mediaUrl}"><img src="img/thumbs/${kuva.mediaThumb}"></a>
			       			 <figcaption>
			           			 <h3>${kuva.mediaTitle}</h3>
			        		 </figcaption>
			    		</figure>
					</li>`;
					});


		//lisää ladatun HTML-sisällön <ul> elementin sisälle
		const ul = document.querySelector('ul');
		ul.innerHTML = html;
	})

  
};
showImages();

 