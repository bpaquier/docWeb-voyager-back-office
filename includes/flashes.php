<?php foreach (getFlashes() as  $flash) :
    ?>
    <div class="alert alert-<?=$flash["type"]?>">
        <?= $flash["message"] ?>
    </div>
<?php endforeach; ?>
