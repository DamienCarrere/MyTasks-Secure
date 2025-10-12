<?php
$header = "Delete";
?>
<p>Voulez-vous vraiment supprimer la tâche <?= htmlspecialchars($task["title"]) ?>?</p>
<form method="POST" action="index.php?controller=task&action=delete&id=<?= $task['id'] ?>">
    <button type="submit">Oui</button>
</form>
<form method="POST" action="index.php?controller=task&action=index">
    <button type="submit">Non</button>
</form>

<?php
$content = ob_get_clean();
require __DIR__ . "/../layout.php";
?>