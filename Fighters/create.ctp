<!-- src/Template/fighters/addfighter.ctp -->
<?php

echo $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'create']));
echo $this->Form->control('pseudo');
echo $this->Form->button('Submit', array('type'=>'submit'));
echo $this->Form->end();

?>
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
<br>
ok addfighter.ctp
<br>

