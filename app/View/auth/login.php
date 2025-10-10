<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h3>LOGIN</h3>
    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($email ?? "", ENT_QUOTES, "UTF-8") ?>"><br>
        <input type="password" name="password" placeholder="Mot de passe"><br>
        <button type="submit">Se connecter</button>
    </form>
</body>

</html>