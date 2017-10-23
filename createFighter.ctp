<?= $this->Form->create('Fighters', array('type' => 'file')); ?>
	<?= $this->Form->input('name', array('label' => "Nom de votre combattant")); ?>
	<?= $this->Form->input('avatar_file', array('label' => "Votre avatar (au format jpg ou png)", 'type' => 'file')); ?>
<?= $this->Form->end('Editer mon combattant'); ?>