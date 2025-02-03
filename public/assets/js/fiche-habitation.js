const imagesContainer = document.querySelector('.carousel-images');
const prevButton = document.getElementById('prev');
const nextButton = document.getElementById('next');

let currentIndex = 0;

prevButton.addEventListener('click', () => {
    currentIndex = (currentIndex > 0) ? currentIndex - 1 : 2;
    updateCarousel();
});

nextButton.addEventListener('click', () => {
    currentIndex = (currentIndex < 2) ? currentIndex + 1 : 0;
    updateCarousel();
});

function updateCarousel() {
    imagesContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
}

function editHabitation() {
    alert('Modifier l\'habitation !');
}

function deleteHabitation() {
    const confirmation = confirm('Êtes-vous sûr de vouloir supprimer cette habitation ?');
    if (confirmation) {
        alert('Habitation supprimée !');
    }
}