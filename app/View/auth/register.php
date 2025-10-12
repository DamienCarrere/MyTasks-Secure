<?php
$header = "Register";
?>
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

<?php
$content = ob_get_clean();
require __DIR__ . "/../layout.php";
?>