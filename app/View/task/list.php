<?php
$header = "List";
ob_start();
?>

<div class="h-100 d-flex flex-column">
    <div class="d-flex justify-content-center align-items-center mb-3 pt-3">
        <a href="index.php?controller=task&action=create" class="btn btn-primary">+ Ajouter une tâche</a>
    </div>

    <div class="flex-grow-1 overflow-auto">
        <?php if (empty($tasks)): ?>
            <div class="alert alert-info text-center">Aucune tâche pour le moment.</div>
        <?php else: ?>
            <table class="table table-dark table-striped table-hover">
                <thead class="table-secondary">
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Échéance</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><?= htmlspecialchars($task["title"]) ?></td>
                            <td><?= htmlspecialchars($task["description"]) ?></td>
                            <td><?= htmlspecialchars($task["due_date"]) ?></td>
                            <td>
                                <form method="POST" action="index.php?controller=task&action=toggleDone" class="d-inline">
                                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                    <input type="hidden" name="done" value="<?= $task['done'] ? 1 : 0 ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-light">
                                        <?= $task["done"] ? "✔️" : "❌" ?>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="index.php?controller=task&action=edit&id=<?= $task['id'] ?>" class="btn btn-sm btn-warning">✏️</a>
                                <a href="index.php?controller=task&action=delete&id=<?= $task['id'] ?>" class="btn btn-sm btn-danger">🗑️</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . "/../layout.php";
?>