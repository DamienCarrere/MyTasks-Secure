<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>
    <h3>EDIT</h3>

    <h4>Tâche: <?= htmlspecialchars($task["title"]) ?></h4>
    <form method="POST">
        <label>Titre</label>
        <input type="text" name="title" value="<?= htmlspecialchars($task["title"]) ?>">
        <label>Description</label>
        <textarea type=" text" name="description"><?= htmlspecialchars($task["description"]) ?></textarea>
        <label>Date d'échéance</label>
        <input type="datetime-local" name="due_date" value="<?= htmlspecialchars($task["due_date"]) ?>">
        <button type="submit">Modifier la tâche</button>
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
    <br>
    <a href="index.php?controller=task&action=index">Mes Tâches</a>
</body>

</html>