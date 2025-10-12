<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <h3>REGISTER</h3>
    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="name" placeholder="Nom" value="<?= htmlspecialchars($name ?? "", ENT_QUOTES, "UTF-8") ?>"><br>
        <input type="text" name="firstname" placeholder="Prénom" value="<?= htmlspecialchars($firstname ?? "", ENT_QUOTES, "UTF-8") ?? "" ?>"><br>
        <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($email ?? "", ENT_QUOTES, "UTF-8") ?>"><br>
        <input type="password" name="password" placeholder="Mot de passe"><br>
        <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe"><br>
        <button type="submit">S'inscrire</button>
    </form>
    <a href="index.php?controller=auth&action=login">Se connecter</a>

</body>

</html>