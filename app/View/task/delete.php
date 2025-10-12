<?php
$header = "Delete";
ob_start();
?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-warning text-center">
                <p>Confirmation de suppression</p>
                <p class="mb-0">Voulez-vous vraiment supprimer la tâche <strong><?= htmlspecialchars($task["title"]) ?></strong> ?</p>
            </div>
            <div class="d-flex justify-content-center gap-3">
                <form method="POST" action="index.php?controller=task&action=delete&id=<?= $task['id'] ?>">
                    <button type="submit" class="btn btn-danger">Oui</button>
                </form>
                <form method="POST" action="index.php?controller=task&action=index">
                    <button type="submit" class="btn btn-secondary">Non</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    $content = ob_get_clean();
    require __DIR__ . "/../layout.php";
    ?>