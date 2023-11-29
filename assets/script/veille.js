// Slide
document.getElementById('next').onclick = function () {
  let lists = document.querySelectorAll('.item');
  document.getElementById('slide').appendChild(lists[0]);
}

document.getElementById('prev').onclick = function () {
  let lists = document.querySelectorAll('.item');
  document.getElementById('slide').prepend(lists[lists.length - 1]);
}

//RSS

//Ecoute du changement de veille
 const Titres = document.getElementsByClassName("soulignage");
 Array.from(Titres).forEach(function(element) {
  element.addEventListener('click', function() {
      Array.from(Titres).forEach(function(el) {
          //el.classList.remove('soulig');
          el.id = '';
      });
      element.id = 'activeTitre';
      AffichageRSS();
  });
});

//Affichage du flux RSS
function AffichageRSS() {
  const Titre = document.getElementById("activeTitre");
  let rssFeedUrl = "";

  if (Titre.innerText === "Blockchain"){
    rssFeedUrl = 'https://www.zdnet.fr/feeds/rss/';
  }else{
    rssFeedUrl = 'https://www.lemondeinformatique.fr/flux-rss/thematique/le-monde-du-cloud-computing/rss.xml';
  }

  let feedContent = document.getElementById("slide");

  fetch(`https://api.rss2json.com/v1/api.json?rss_url=${rssFeedUrl}`)
    .then(response => {
      const contentType = response.headers.get('content-type');

      if (contentType && contentType.includes('application/json')) {
        return response.json(); // La réponse est au format JSON
      } else if (contentType && contentType.includes('application/xml')) {
        return response.text(); // La réponse est au format XML
      } else {
        throw new Error('Type de contenu non pris en charge');
      }
    })
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
          const mediaContent = (item.enclosure.link != undefined) ? `style="background-image: url(${item.enclosure.link});"` : `style="background-image: url('./assets/images/VeilleImgDefault.jpeg');"`;

          Remplissage += (`
            <div class="item" ${mediaContent}">
                    <div class="content">
                        <div class="name">${title}</div>
                        <div class="des">
                          ${description}<br>
                          <div id='date'>${date}</div>
                        </div>
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
}

AffichageRSS();
/*
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
handleScreenSizeChange(mediaQuery);*/