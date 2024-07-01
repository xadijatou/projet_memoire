<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    $kilometrage = $_POST['kilometrage'];
    $carburant = $_POST['carburant'];
    $boite_de_vitesse = $_POST['boite_de_vitesse'];
    $description = $_POST['description'];

    // Connexion à la base de données
    $conn = new mysqli("localhost", "root", "", "voiture_estimation");

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }

    // Insérer les données dans la base
    $sql = "INSERT INTO voitures (marque, modele, annee, kilometrage, carburant, boite_de_vitesse, description) 
            VALUES ('$marque', '$modele', $annee, $kilometrage, '$carburant', '$boite_de_vitesse', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "Informations ajoutées avec succès.";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
