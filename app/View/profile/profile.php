<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>

<body>
    <h3>PROFIL</h3>

    <label>Nom :</label>
    <p><?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?></p>
    <label>Prénom :</label>
    <p><?= htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8') ?></p>
    <label>Email :</label>
    <p><?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?></p>

</body>

</html>