<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];
    $utilisateur_id = $_SESSION['user_id'];

    $query = "INSERT INTO voitures (marque, modele, annee, prix, description, utilisateur_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssidsi", $marque, $modele, $annee, $prix, $description, $utilisateur_id);
    $stmt->execute();

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une voiture</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <img src="images/logo.png" alt="Logo">
        <h1>Estimation Voiture</h1>
    </header>
    <h1>Ajouter une nouvelle voiture</h1>
    <form method="POST">
        <input type="text" name="marque" placeholder="Marque" required>
        <input type="text" name="modele" placeholder="Modèle" required>
        <input type="number" name="annee" placeholder="Année" required>
        <input type="number" name="prix" placeholder="Prix" required>
        <textarea name="description" placeholder="Description"></textarea>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
