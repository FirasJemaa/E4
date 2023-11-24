//import 'script/js';

document.getElementById('next').onclick = function () {
  let lists = document.querySelectorAll('.item');
  document.getElementById('slide').appendChild(lists[0]);
}

document.getElementById('prev').onclick = function () {
  let lists = document.querySelectorAll('.item');
  document.getElementById('slide').prepend(lists[lists.length - 1]);
}


const rssFeedUrl = 'https://www.zdnet.fr/feeds/rss/';
let feedContent = document.getElementById("slide");

fetch(`https://api.rss2json.com/v1/api.json?rss_url=${rssFeedUrl}`)
  .then(response => response.json())
  .then(data => {
    if (data.status === 'ok') {
      const items = data.items;
      let Remplissage = "";

      // Affichez les titres, les dates et les liens vers les articles du flux RSS
      for (const item of items) {
        const title = item.title;
        const date = item.pubDate;
        const description = item.description;
        const link = item.link;
        const mediaContent = item.enclosure ? `style="background-image: url(${item.enclosure.link});"` : `style="background: black);"`;

        Remplissage += (`
            <div class="item" ${mediaContent}">
                    <div class="content">
                        <div class="name">${title}</div>
                        <div class="des">${description}</div>
                        <a href="${link}">Voir plus</a>
                    </div>
            </div> `
        );
      }
      feedContent.innerHTML = Remplissage;
    } else {
      console.error('Erreur lors de la récupération du flux RSS.');
    }
  })
  .catch(error => {
    console.error('Erreur lors de la requête AJAX.', error);
  });


function handleScreenSizeChange(event) {
  let Images = document.querySelectorAll(".item");
  
  if (event.matches) {
     
     Images.forEach(function (element) {
       element.style.visible = 'none';
      });
      console.log("Écran inférieur à 550 pixels");
  } else {
    console.log("Écran supérieur ou égal à 550 pixels");
  }
}

// Ajouter un écouteur d'événements pour détecter les changements de taille d'écran
const mediaQuery = window.matchMedia('(max-width: 550px)');
mediaQuery.addListener(handleScreenSizeChange);

// Appel initial de la fonction pour vérifier la taille de l'écran au chargement de la page
handleScreenSizeChange(mediaQuery);