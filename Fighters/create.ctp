<!-- src/Template/fighters/addfighter.ctp -->

<div class="fighters form">
	<?= $this->Form->create($fighter) ?>
	    <fieldset>
	        <legend><?= __('Add Fighter') ?></legend>
	        <?= $this->Form->control('pseudo') ?>
	   </fieldset>
	<?= $this->Form->button(__('Submit')); ?>
	<?= $this->Form->end() ?>
</div> 
<!--
<html>
	<body>

		<form action="FightersTable.php" method="get">

		  Pseudo: <input type="text" name="pseudo"><br>

		  <input type="submit" value="Submit">
		  Welcome <?php echo $_GET["pseudo"]; ?><br>
		  $newPseudo = $_GET["pseudo"];
		  <?php echo $newPseudo; ?>

		</form>
		
	</body>
</html>  -->

ok addfighter ctp

