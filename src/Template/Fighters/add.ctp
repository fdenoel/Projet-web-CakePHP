<!-- File: src/Template/Articles/add.ctp -->

<h1>Ajouter un fighter</h1>
<?php
    echo $this->Form->create($fighter);
    echo $this->Form->control('name');
    echo $this->Form->control('coordinate_x', ['default' => '15']);
    echo $this->Form->control('coordinate_y', ['default' => '15']);
    echo $this->Form->control('level', ['default' => '1']);
    echo $this->Form->control('xp', ['default' => '0']);
    echo $this->Form->control('skill_sight', ['default' => '1']);
    echo $this->Form->control('skill_strength', ['default' => '5']);
    echo $this->Form->control('skill_health', ['default' => '2']);
    echo $this->Form->control('current_health', ['default' => '3']);
    echo $this->Form->button(__("Sauvegarder le fighter"));
    echo $this->Form->end();
?>

