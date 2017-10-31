<!-- src/Template/Users/login.ctp -->
<div class="users form">
</br>
<?= $this->Flash->render('positive') ?>
<?= $this->Flash->render('negatif') ?>
<?php echo $this->Form->create('BoostCake', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well'
)); ?>
<fieldset>
<legend><?= __("Merci de rentrer vos nom d'utilisateur et mot de passe") ?></legend>
<?= $this->Form->control('email', array(
		'placeholder' => 'Email'
	)) ?>
<?= $this->Form->control('password', array(
		'placeholder' => 'Mot de passe'
	)) ?>
</fieldset>
<button type="submit" class="btn btn-default">Se connecter</button>
<?= $this->Form->end() ?>
</div>

