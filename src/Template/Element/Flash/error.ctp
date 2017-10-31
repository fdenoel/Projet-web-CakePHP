<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div id="flash-<?= h($key) ?>" class="alert alert-danger">
    <?= h($message) ?>
</div>