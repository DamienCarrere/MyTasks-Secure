<?php
$header = "Login";
?>

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
<a href="index.php?controller=auth&action=register">S'inscrire</a>

<?php
$content = ob_get_clean();
require __DIR__ . "/../layout.php";
?>