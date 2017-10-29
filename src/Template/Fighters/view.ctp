<!-- File: src/Template/Articles/view.ctp -->

<h2>Pseudo : <?= h($fighter->name) ?><h2>
<h2>Coordonée en x : <?= h($fighter->coordinate_x) ?></h2>
<h2>Coordonée en y : <?= h($fighter->coordinate_y) ?></h2>
<h2>Level : <?= h($fighter->level) ?></h2>
<h2>Xp : <?= h($fighter->xp) ?></h2>
<h2>Points de vue : <?= h($fighter->skill_sight) ?></h2>
<h2>Points de force : <?= h($fighter->skill_strength) ?></h2>
<h2>Points de vie : <?= h($fighter->skill_health) ?></h2>
<h2>Vie actuel : <?= h($fighter->current_health) ?></h2>