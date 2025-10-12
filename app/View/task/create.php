<?php
$header = "Create";
?>
<form method="POST">
    <label>Titre</label>
    <input type="text" name="title">
    <label>Description</label>
    <input type="text" name="description">
    <label>Date d'échéance</label>
    <input type="datetime-local" name="due_date">
    <button type="submit">Créer la tâche</button>
</form>

<?php if (!empty($is_done)): ?>
    <p style="color:green;"><?= htmlspecialchars($is_done) ?></p>
<?php endif; ?>

<?php if (!empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


<?php
$content = ob_get_clean();
require __DIR__ . "/../layout.php";
?>