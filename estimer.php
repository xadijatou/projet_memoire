<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    $kilometrage = $_POST['kilometrage'];
    $carburant = $_POST['carburant'];
    $boite_de_vitesse = $_POST['boite_de_vitesse'];
    
    // Ne pas traiter l'image si elle n'est pas nécessaire

    // Connexion à la base de données
    $conn = new mysqli("localhost", "root", "", "voiture_estimation");

    if ($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }

    // Calculer le prix estimatif
    $prix_estimatif = (10000 - ($annee - 2000) * 500 - $kilometrage * 0.1);

    // Insérer les données dans la base
    $sql = "INSERT INTO voitures (marque, modele, annee, kilometrage, carburant, boite_de_vitesse, prix_estimatif, utilisateur_id, description) 
    VALUES ('$marque', '$modele', $annee, $kilometrage, '$carburant', '$boite_de_vitesse', $prix_estimatif, 1, 'Description ici')";

    if ($conn->query($sql) === TRUE) {
        echo "Estimation réussie: " . $prix_estimatif . " euros.";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
