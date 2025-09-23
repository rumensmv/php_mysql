<?php 
session_start();

include_once('variables.php');
include_once('functions.php');

if (isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['LOGGED_USER']);
    header('Location: index.php');
    exit;
}

if (isset($_SESSION['LOGGED_USER'])){
    $loggedUser = ['email' => $_SESSION['LOGGED_USER'] ];
}
?>

<!-- On se connecte à MySQL -->
<?php include_once('mysql.php'); ?>

<!-- Si tout va bien, on peut continuer -->
<?php
// On récupère tout le contenu de la table recipes
$sqlQuery = 'SELECT * FROM recipes WHERE is_enabled = 1';
$recipesStatement = $db->prepare($sqlQuery);
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();
?>

<!-- On affiche chaque recette une à une -->
<?php foreach ($recipes as $recipe) : ?>
    <p><?php echo $recipe['author']; ?> </p>
<?php endforeach; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Page d'accueil</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
<div class="container">

    <!-- Navigation -->
    <?php include_once('header.php'); ?>

    <!-- Inclusion du formulaire de connexion -->
    <?php include_once('login.php'); ?>

    <h1>Site de Recettes !</h1>

    <!-- Si l'utilisateur existe, on affiche les recettes -->
    <?php if (isset($loggedUser)): ?>
        <?php foreach (getRecipes($recipes) as $recipe) : ?>
            <article>
                <h3><?php echo $recipe['title']; ?> </h3>
                <div><?php echo $recipe['recipe']; ?> </div>
                <i><?php echo displayAuthor($recipe['author'], $users); ?> </i>
            </article>
        <?php endforeach ?>
        <p>
            <a href="index.php?logout=1" class="btn btn-danger">Se deconnecter</a>
        </p>
    <?php endif; ?>
</div>

<?php include_once('footer.php'); ?>
</body>
</html>
