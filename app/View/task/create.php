<?php
$header = "Create";
ob_start();
?>


<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if (!empty($is_done)): ?>
                <div class="alert alert-success"><?= htmlspecialchars($is_done) ?></div>
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

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Titre</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Date d'échéance</label>
                    <input type="datetime-local" name="due_date" class="form-control">
                </div>

                <div class="d-flex justify-content-center gap-2">
                    <button type="submit" class="btn btn-primary">Créer la tâche</button>
                    <a href="index.php?controller=task&action=index" class="btn btn-secondary">Retour</a>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
require __DIR__ . "/../layout.php";
?>