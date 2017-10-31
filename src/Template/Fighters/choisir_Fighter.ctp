<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
<div class="container">
	<h1>Tous les fighters</h1>
<table class="table table-hover">
    <tr class="active">
        <th><h5>Id</h5></th>
        <th><h5>Pseudo</h5></th>
    </tr>

    <?php foreach ($fighters as $fighters): ?>
    <tr class="active">
        <td><h6><?= $fighters->id ?></h6></td>
        <td>
            <h6><?= $this->Html->link($fighters->name, ['controller' => 'Arenas', 'action' => 'sight', $fighters->id]) ?></h6>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
</div>
</body>
</html>





