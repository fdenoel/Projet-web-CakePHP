<!-- src/Template/Users/add.ctp -->
<?= $this->Flash->render('positive') ?>
<?= $this->Flash->render('negatif') ?>
</br>
<?php echo $this->Form->create($user, array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well'
)); ?>
<fieldset>
<legend><?= __('Ajouter un utilisateur') ?></legend>
<?= $this->Form->control('email', array(
		'placeholder' => 'Email'
	)) ?>
<?= $this->Form->control('password',  array(
		'placeholder' => 'Mot de passe'
	)) ?>
</fieldset>
<button type="submit" class="btn btn-default" >Ajouter</button>
<?= $this->Form->end() ?>



