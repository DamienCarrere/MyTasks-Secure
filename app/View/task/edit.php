<?php
$header = "Edit";
ob_start();
?>

<div class="container mt-4">
    <h4 class="mb-4">Modifier: <?= htmlspecialchars($task["title"]) ?></h4>

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
            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($task["title"]) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3"><?= htmlspecialchars($task["description"]) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Date d'échéance</label>
            <input type="datetime-local" name="due_date" class="form-control" value="<?= htmlspecialchars($task["due_date"]) ?>">
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="index.php?controller=task&action=index" class="btn btn-secondary">Retour</a>
    </form>
</div>


<?php
$content = ob_get_clean();
require __DIR__ . "/../layout.php";
?>