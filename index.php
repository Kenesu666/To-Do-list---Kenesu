<?php
include 'action.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ma Liste de Tâches</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      margin-bottom: 20px;
      color: #333;
    }

    form {
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      color: #666;
    }

    input[type="text"] {
      width: calc(100% - 100px);
      padding: 10px;
      margin-right: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button[type="submit"] {
      background-color: #4CAF50;
      color: white;
    }

    button[type="submit"]:hover {
      background-color: #45a049;
    }

    button[type="submit"]:last-child {
      background-color: #f44336;
    }

    button[type="submit"]:last-child:hover {
      background-color: #da190b;
    }

    .task-container {
      margin-bottom: 10px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f9f9f9;
    }

    .task-container form {
      display: inline;
    }

    .task-container input[type="text"] {
      width: calc(100% - 200px);
      margin-right: 10px;
      border: none;
      border-bottom: 1px solid #ccc;
      font-size: 16px;
    }

    .task-container button {
      padding: 5px 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Ajouter une tâche</h2>
    <form method="POST">
      <label for="texte">Veuillez entrer une tâche :</label>
      <input name="texte" type="text" required>
      <button type="submit" name="ajouter">Ajouter</button>
    </form>

    <h2>Liste des tâches</h2>
    <?php foreach ($result as $row) { ?>
      <div class="task-container">
        <form method="POST">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
          <input type="text" name="texte" value="<?php echo htmlspecialchars($row['texte']); ?>" required>
          <button type="submit" name="modifier">Modifier</button>
          <button type="submit" name="supprimer">Supprimer</button>
        </form>
      </div>
    <?php } ?>
  </div>
</body>
</html>
