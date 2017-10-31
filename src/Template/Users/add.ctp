<!-- src/Template/Users/add.ctp -->
<?= $this->Form->create($user) ?>
<fieldset>
<legend><?= __('Ajouter un utilisateur') ?></legend>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>
</fieldset>
<button type="submit" class="btn btn-default">Ajouter</button>
<?= $this->Form->end() ?>



