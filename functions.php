<?php
function displayAuthor(string $authorEmail, array $users): string {
    foreach($users as $user) {
        if ($user['email'] === $authorEmail) {
            return $user['full_name'] . ' (' . $user['age'] . ' ans)';
        }
    }
    return "Auteur inconnu";
}

function getValidRecipes(array $recipes): array {
    $validRecipes = [];
    foreach($recipes as $recipe) {
        if (isset($recipe['enabled']) && $recipe['enabled']) {
            $validRecipes[] = $recipe;
        }
    }
    return $validRecipes;
}
?>
