document.addEventListener("DOMContentLoaded", function() {
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let slides = document.getElementById("sliderActivite").getElementsByTagName("img");
            // Cacher toutes les images
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            // Passer à l'image suivante
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            // Afficher l'image actuelle
            slides[slideIndex-1].style.display = "block";
            // Appel récursif après 2 secondes
            setTimeout(showSlides, 2000); // Change l'image toutes les 2 secondes
        }
    }
);






