<?= $this->Form->create('Fighters', array('type' => 'file')); ?>
	<?= $this->Form->input('name', array('label' => "Nom de votre combattant")); ?>
	<?= $this->Form->input('avatar_file', array('label' => "Votre avatar (au format jpg ou png)", 'type' => 'file')); ?>
<?= $this->Form->end('Editer mon combattant'); ?>


<!-- methode prof -->
<!-- $a =$this->newFighters()

	$a->name = "Gimli";
	$a->player_id = "987654321";
	$a->coordinate_x = 1;
	$a->coordinate_y = 9;
	$a->level = 0;
	$a->xp = 0
	$a->skill_sight = 2;
	$a->skill_strength = 1;
	$a->skill_health = 3;
	$a->current_health = $a->skill_health;
	$a->skill_healthnext_action_time ='000-00-00 00:00:00';

	$this->save($a); -->