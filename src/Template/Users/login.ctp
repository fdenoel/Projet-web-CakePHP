<!-- src/Template/Users/login.ctp -->
<div class="users form">
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
<fieldset>
<legend><?= __("Merci de rentrer vos nom d'utilisateur et mot de passe") ?></legend>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>
</fieldset>
<button type="submit" class="btn btn-default">Se connecter</button>
<?= $this->Form->end() ?>
</div>
