<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyTasks Secure</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/style.css">
</head>

<body class="bg-dark text-light">
    <header class="bg-secondary d-flex flex-column justify-content-center align-items-center text-center shadow">
        <h2><?= $header ?></h2>
        <nav class="nav justify-content-center">
            <a class="nav-link text-light" href="index.php?controller=task&action=index">Tâches</a>
            <a class="nav-link text-light" href="index.php?controller=profile&action=index">Profil</a>
            <a class="nav-link text-light" href="index.php?controller=auth&action=logout">Déconnexion</a>
        </nav>
    </header>

    <main class="container-fluid">
        <?= $content ?>
    </main>

    <footer class="bg-secondary d-flex justify-content-center align-items-center shadow">
        <p class="m-0">Footer</p>
    </footer>
</body>

</html>