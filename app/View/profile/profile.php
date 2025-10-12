<?php
$header = "Profile";
ob_start();
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 pt-5">
            <h4 class="mb-4 text-center">Mon profil</h4>
            <?php if (!empty($_SESSION["passwordUpdated"])): ?>
                <p class="alert alert-success"><?= htmlspecialchars($_SESSION["passwordUpdated"], ENT_QUOTES, "UTF-8") ?></p>
                <?php unset($_SESSION["passwordUpdated"]); ?>
            <?php endif; ?>
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
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

            <form method="POST" action="index.php?controller=profile&action=update">
                <div class="mb-3">
                    <label class="form-label">Nom :</label>
                    <input type="text" name="name" value="<?= htmlspecialchars($name, ENT_QUOTES, "UTF-8") ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Prénom :</label>
                    <input type="text" name="firstname" value="<?= htmlspecialchars($firstname, ENT_QUOTES, "UTF-8") ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email :</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($email, ENT_QUOTES, "UTF-8") ?>" class="form-control">
                </div>
                <div class="d-flex justify-content-center mb-4">
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>


        <div class="col-md-6 pt-5">
            <h4 class="mb-4 text-center">Changer mon mot de passe:</h4>

            <?php if (!empty($_SESSION["passwordUpdated"])): ?>
                <div class="alert alert-success"><?= htmlspecialchars($_SESSION["passwordUpdated"], ENT_QUOTES, "UTF-8") ?></div>
                <?php unset($_SESSION["passwordUpdated"]); ?>
            <?php endif; ?>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="index.php?controller=profile&action=changePassword">
                <div class="mb-3">
                    <label class="form-label">Ancien mot de passe :</label>
                    <input type="password" name="currentPassword" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nouveau mot de passe :</label>
                    <input type="password" name="newPassword" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirmer le mot de passe :</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
                <div class="d-flex justify-content-center mb-4">
                    <button type="submit" class="btn btn-warning">Changer le mot de passe</button>
                </div>
            </form>
        </div>
    </div>


    <div class="text-center pt-5">
        <a href="index.php?controller=auth&action=logout" class="btn btn-danger">Se déconnecter</a>
    </div>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . "/../layout.php";
?>