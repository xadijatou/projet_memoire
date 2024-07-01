<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Estimation Voiture</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Bienvenue sur Estimation Voiture</h1>
    </header>
    <nav>
        <ul>
            <li><a href="estimation.php">Estimer votre voiture</a></li>
            <li><a href="consulter.php">Consulter les véhicules</a></li>
            <li><a href="ajouter_info.php">Ajouter des informations</a></li>
        </ul>
    </nav>
    <section class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="voiture.webp" alt="Slide 1"></div>
        <div class="swiper-slide"><img src="toyota.png" alt="Slide 2"></div>
        <div class="swiper-slide"><img src="images/slide3.jpg" alt="Slide 3"></div>
        <!-- Ajoutez autant de diapositives que nécessaire avec les images de votre choix -->
    </div>
    <!-- Ajoutez les boutons de navigation si nécessaire -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</section>

<!-- Inclure le fichier JavaScript de Swiper -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialisation du diaporama -->
<script>
    var swiper = new Swiper('.swiper-container', {
        // Optionnel: Configuration supplémentaire comme le mode de navigation, la pagination, etc.
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>

    <section>
        <h2>Estimation gratuite et rapide</h2>
        <p>Recevez une estimation gratuite de votre voiture en ligne.</p>

    </section>
</body>
</html>
