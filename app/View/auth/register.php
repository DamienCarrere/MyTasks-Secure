<?php
$header = "Register";
ob_start();
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <input type="text" name="name" placeholder="Nom" value="<?= htmlspecialchars($name ?? "", ENT_QUOTES, "UTF-8") ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="text" name="firstname" placeholder="Prénom" value="<?= htmlspecialchars($firstname ?? "", ENT_QUOTES, "UTF-8") ?? "" ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($email ?? "", ENT_QUOTES, "UTF-8") ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="password" name="password" placeholder="Mot de passe" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" class="form-control">
                </div>
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </div>
            </form>
            <div class="text-center">
                <a href="index.php?controller=auth&action=login" class="text-light">Se connecter</a>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . "/../layout.php";
?>