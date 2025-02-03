const imagesInput = document.getElementById('images');
const imagePreviewContainer = document.getElementById('imagePreview');
const form = document.getElementById('habitationForm');

imagesInput.addEventListener('change', () => {
    imagePreviewContainer.innerHTML = '';
    const files = Array.from(imagesInput.files);

    files.forEach(file => {
        const reader = new FileReader();
        reader.onload = () => {
            const img = document.createElement('img');
            img.src = reader.result;
            imagePreviewContainer.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
});

form.addEventListener('submit', (e) => {
    e.preventDefault();
    const quartier = document.getElementById('quartier').value;
    alert(`Habitation dans le quartier "${quartier}" ajoutée avec succès !`);
    form.reset();
    imagePreviewContainer.innerHTML = '';
});