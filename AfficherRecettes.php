<?php
include 'recettes.php';

function isValidRecipe(array $recipe) : bool {
    return isset($recipe['is_enabled']) && $recipe['is_enabled'];
}

function getRecipes(array $recipes) : array {
    $validRecipes = [];
    foreach($recipes as $recipe) {
        if (isValidRecipe($recipe)) {
            $validRecipes[] = $recipe;
        }
    }
    return $validRecipes;
}

function displayAuthor(string $authorEmail, array $users) : string {
    foreach($users as $user) {
        if ($user['email'] === $authorEmail) {
            return $user['full_name'] . ' (' . $user['age'] . ' ans)';
        }
    }
    return "Auteur inconnu";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Affichage des recettes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Affichage des recettes</h1>
    <ul>
        <?php foreach(getRecipes($recipes) as $recipe): ?>
            <li>
                <div class="title"><?php echo $recipe['title']; ?></div>
                <div class="author">Auteur : <?php echo displayAuthor($recipe['author'], $users); ?></div>
                <div class="recipe-text"><?php echo !empty($recipe['recipe']) ? $recipe['recipe'] : 'Recette non disponible'; ?></div>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
