<!-- src/Template/Users/add.ctp -->
<div class="users form">
<?= $this->Form->create($user) ?>
<fieldset>
<legend><?= __('Ajouter un utilisateur') ?></legend>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>
</fieldset>
<?= $this->Form->button(__('Ajouter')); ?>
<?= $this->Form->end() ?>
</div>

