<?php
// Déclaration du tableau des recettes en tableaux associatifs
$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => ' ',
        'author' => 'mickael.andrieu@exemple.com',
        'enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => ' ',
        'author' => 'mickael.andrieu@exemple.com',
        'enabled' => false,
    ],
    [
        'title' => 'Escalope milanaise',
        'recipe' => ' ',
        'author' => 'mathieu.nebra@exemple.com',
        'enabled' => true,
    ]
];
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
        <?php foreach($recipes as $recipe): ?>
            <?php if($recipe['enabled']): ?>
                <li>
                    <div class="title"><?php echo $recipe['title']; ?></div>
                    <div class="author">Auteur : <?php echo $recipe['author']; ?></div>
                    <div><?php echo $recipe['recipe']; ?></div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</body>
</html>
