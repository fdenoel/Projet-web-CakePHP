<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div id="flash-<?= h($key) ?>" class="alert alert-success">
    <?= h($message) ?>
</div>
