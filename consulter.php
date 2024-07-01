<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "voiture_estimation");

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

$sql = "SELECT marque, modele, annee, kilometrage, carburant, boite_de_vitesse, prix_estimatif, image_path FROM voitures";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Voitures</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Liste des Voitures Estimées</h1>
    </header>
    <ul>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li>";
                echo "<img src='" . $row["image_path"] . "' alt='Image de " . $row["marque"] . " " . $row["modele"] . "'>";
                echo "<div>";
                echo "<h2>" . $row["marque"] . " " . $row["modele"] . "</h2>";
                echo "<p>Année: " . $row["annee"] . "</p>";
                echo "<p>Kilométrage: " . $row["kilometrage"] . " km</p>";
                echo "<p>Carburant: " . $row["carburant"] . "</p>";
                echo "<p>Boîte de vitesse: " . $row["boite_de_vitesse"] . "</p>";
                echo "<p>Prix estimatif: " . $row["prix_estimatif"] . " euros</p>";
                echo "</div>";
                echo "</li>";
            }
        } else {
            echo "0 résultats";
        }
        $conn->close();
        ?>
    </ul>
</body>
</html>
