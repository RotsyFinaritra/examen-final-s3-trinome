function afficherListeProgressivement(boutonId, listeId, intervalle = 500) {
  // Récupère les éléments du DOM
  const bouton = document.getElementById(boutonId);
  const liste = document.getElementById(listeId);
  const elements = liste.getElementsByTagName("li");

  let isOpen = false; // État pour savoir si la liste est ouverte ou fermée

  // Lorsque le bouton est cliqué
  bouton.addEventListener("click", function () {
    if (isOpen) {
      // Ferme progressivement la liste
      bouton.classList.remove("actif");
      let index = elements.length - 1;
      const interval = setInterval(function () {
        if (index >= 0) {
          elements[index].style.display = "none"; // Cache l'élément courant
          index--;
        } else {
          clearInterval(interval); // Arrête l'intervalle une fois que la liste est complètement cachée
          liste.style.display = "none"; // Cache complètement la liste après la fermeture
          isOpen = false; // La liste est maintenant fermée
        }
      }, intervalle);
    } else {
      // Affiche la liste d'abord si elle est cachée
      liste.style.display = "block";
      bouton.classList.add("actif");

      // Réinitialise les éléments à "none" avant de commencer à les afficher progressivement
      for (let i = 0; i < elements.length; i++) {
        elements[i].style.display = "none";
      }

      let index = 0;

      // Affiche chaque élément progressivement
      const interval = setInterval(function () {
        if (index < elements.length) {
          elements[index].style.display = "list-item"; // Affiche l'élément courant
          index++;
        } else {
          clearInterval(interval); // Arrête l'intervalle une fois que la liste est complètement affichée
          isOpen = true; // La liste est maintenant ouverte
        }
      }, intervalle); // Intervalle entre chaque élément
    }
  });
}

function chargerContenuDepuisPHP(divId, fichierPHP) {
  // Sélectionne le bouton et le div où le contenu sera chargé
  const div = document.getElementById(divId);

  // Ajoute un écouteur d'événement sur le bouton
  // bouton.addEventListener("click", function () {
  // Utilisation de fetch pour récupérer le contenu du fichier PHP
  fetch(fichierPHP)
    .then((response) => response.text()) // Récupère la réponse en texte
    .then((data) => {
      // Remplace le contenu du div par la réponse du fichier PHP
      div.innerHTML += data;
    })
    .catch((error) => {
      console.error("Erreur lors du chargement du fichier:", error);
    });
  // });
}

function changerContenuDepuisPHP(divId, fichierPHP) {
  const div = document.getElementById(divId);

  // Vérifie que le div possède au moins deux enfants avant de tenter de supprimer
  if (div.children.length >= 2) {
    div.children[1].remove(); // Supprime le deuxième enfant (index 1)
  }

  // Utilisation de fetch pour récupérer le contenu du fichier PHP
  fetch(fichierPHP)
    .then((response) => response.text())
    .then((data) => {
      // Ajouter le nouveau contenu
      div.innerHTML += data;
    })
    .catch((error) => {
      console.error("Erreur lors du chargement du fichier:", error);
    });
}

