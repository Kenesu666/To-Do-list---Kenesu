<?php
include 'config.php';

// Ajouter une tâche
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouter'])) {
    if (!empty($_POST['texte'])) {
        $texte = $_POST['texte'];
        $sql = "INSERT INTO todo (texte) VALUES (:texte)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':texte', $texte);
        $stmt->execute();
    }
    header("Location: index.php");
    exit;
}

// Supprimer une tâche
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimer'])) {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM todo WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    header("Location: index.php");
    exit;
}

// Modifier une tâche
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modifier'])) {
    if (!empty($_POST['texte']) && isset($_POST['id'])) {
        $id = $_POST['id'];
        $texte = $_POST['texte'];
        $sql = "UPDATE todo SET texte = :texte WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':texte', $texte);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    header("Location: index.php");
    exit;
}

// Sélectionner toutes les tâches pour affichage
$sql = "SELECT * FROM todo";
$result = $conn->query($sql);
?>
