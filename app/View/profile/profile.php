<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>

<body>
    <h3>PROFIL</h3>

    <form method="POST" action="index.php?controller=profile&action=update">
        <label>Nom :</label>
        <input type="text" name="name" value="<?= htmlspecialchars($name, ENT_QUOTES, "UTF-8") ?>">

        <label>Prénom :</label>
        <input type="text" name="firstname" value="<?= htmlspecialchars($firstname, ENT_QUOTES, "UTF-8") ?>">

        <label>Email :</label>
        <input type="email" name="email" value="<?= htmlspecialchars($email, ENT_QUOTES, "UTF-8") ?>">

        <button type="submit">Mettre à jour</button>
    </form>
    <?php if (!empty($errorsP)): ?>
        <ul>
            <?php foreach ($errorsP as $errorP): ?>
                <li><?= htmlspecialchars($errorP, ENT_QUOTES, "UTF-8") ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <?php if (!empty($_SESSION["profileUpdated"])): ?>
        <p style="color: green;"><?= htmlspecialchars($_SESSION["profileUpdated"], ENT_QUOTES, "UTF-8") ?></p>
        <?php unset($_SESSION["profileUpdated"]); ?>
    <?php endif; ?>

    <h4>Changer mon mot de passe</h4>
    <form method="POST" action="index.php?controller=profile&action=changePassword">

        <label>Ancien mot de passe :</label>
        <input type="password" name="currentPassword">

        <label>Nouveau mot de passe :</label>
        <input type="password" name="newPassword">

        <label>Confirmer le mot de passe :</label>
        <input type="password" name="password_confirmation">

        <button type="submit">Changer le mot de passe</button>
    </form>

    <?php if (!empty($_SESSION["passwordUpdated"])): ?>
        <p style="color: green;"><?= htmlspecialchars($_SESSION["passwordUpdated"], ENT_QUOTES, "UTF-8") ?></p>
        <?php unset($_SESSION["passwordUpdated"]); ?>
    <?php endif; ?>
    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <br>

    <a class="logout" href="index.php?controller=auth&action=logout">🚪 Se déconnecter</a>
</body>

</html>