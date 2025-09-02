<?php

// Déclaration du tableau des recettes
$recipes = [
    ['Cassoulet', 'Mettez les haricots, la viande et laissez mijoter...', 'mickael.andrieu@exemple.com', true],
    ['Couscous', 'Préparez la semoule, les légumes et la viande...', 'mickael.andrieu@exemple.com', false],
];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Affichage des recettes</title>
</head>
<body>
    <h1>Liste des recettes</h1>
    <ul>
        <?php for ($lines = 0; $lines <= 1; $lines++): ?>
            <li>
                <?php echo $recipes[$lines][0] . ' (Auteur : ' . $recipes[$lines][2] . ')'; ?>
            </li>
        <?php endfor; ?>
    </ul>
</body>
</html>
