<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIST</title>
</head>

<body>
    <h3>LIST</h3>

    <a href="index.php?controller=task&action=create">Ajouter une tâche</a>
    <br><br>

    <?php if (empty($tasks)): ?>
        <p>Aucune tâche pour le moment.</p>
    <?php else: ?>
        <table cellpadding="6">
            <thead>
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
                            <?= $task["done"] ? "✅" : "⏳" ?>
                            <form method="POST" action="index.php?controller=task&action=toggleDone" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                <input type="hidden" name="done" value="<?= $task['done'] ? 1 : 0 ?>">
                                <button type="submit">[Basculer]</button>
                            </form>
                        </td>
                        <td>
                            <a href="index.php?controller=task&action=edit&id=<?= $task['id'] ?>">✏️ Modifier</a> |
                            <a href="index.php?controller=task&action=delete&id=<?= $task['id'] ?>">🗑️ Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <br>
    <a href="index.php?controller=profile&action=index">Retour profil</a>
</body>

</html>