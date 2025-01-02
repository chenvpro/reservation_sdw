<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Mon titre par défaut' ?></title>
    <!-- <link rel="stylesheet" href="/assets/style.css"> -->
</head>
<body>
    <header>
        <h1><?= $headerTitle ?></h1>
        <a href="/activity/show"></a>
    </header>
    <?= $content ?? '<p>Aucun contenu à afficher</p>' ?>
</body>
</html>