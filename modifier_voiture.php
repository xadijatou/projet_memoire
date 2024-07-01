<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM voitures WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $voiture = $result->fetch_assoc();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];

    $query = "UPDATE voitures SET marque = ?, modele = ?, annee = ?, prix = ?, description = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssidsi", $marque, $modele, $annee, $prix, $description, $id);
    $stmt->execute();

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une voiture</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <img src="images/logo.png" alt="Logo">
        <h1>Estimation Voiture</h1>
    </header>
    <h1>Modifier la voiture</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $voiture['id']; ?>">
        <input type="text" name="marque" placeholder="Marque" value="<?php echo $voiture['marque']; ?>" required>
        <input type="text" name="modele" placeholder="Modèle" value="<?php echo $voiture['modele']; ?>" required>
        <input type="number" name="annee" placeholder="Année" value="<?php echo $voiture['annee']; ?>" required>
        <input type="number" name="prix" placeholder="Prix" value="<?php echo $voiture['prix']; ?>" required>
        <textarea name="description" placeholder="Description"><?php echo $voiture['description']; ?></textarea>
        <button type="submit">Modifier</button>
    </form>
</body>
</html>
