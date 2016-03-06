<?php
$class = '';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<div class="alert alert-<?= h($class) ?> alert-dismissible has-icon" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <?= h($message) ?>
</div>