<?php
include 'variables.php';
include 'functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon site de recettes</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <!-- L'en-tête -->
        <?php include 'header.php'; ?>

        <!-- Le corps -->
        <div id="corps">
            <h1>Liste des recettes</h1>
            <?php foreach(getValidRecipes($recipes) as $recipe): ?>
                <article>
                    <h3><?php echo $recipe['title']; ?></h3>
                    <div><?php echo !empty($recipe['recipe']) ? $recipe['recipe'] : 'Recette non disponible'; ?></div>
                    <i><?php echo displayAuthor($recipe['author'], $users); ?></i>
                </article>
            <?php endforeach; ?>
        </div>

        <!-- Le pied de page -->
        <?php include 'footer.php'; ?>

    </body>
</html>
