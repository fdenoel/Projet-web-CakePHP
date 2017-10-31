<!-- File: src/Template/Articles/index.ctp -->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
<h1>Tous les fighters</h1>
<table class="table table-hover">
    <tr>
        <th><h5>Id</h5></th>
        <th><h5>Pseudo</h5></th>
        <th><h5>Actions</h5></th>
    </tr>

    <!-- Ici se trouve l'itération sur l'objet query de nos $articles, l'affichage des infos des articles -->

    <?php foreach ($fighter as $fighter): ?>
    <tr>
        <td><h6><?= $fighter->id ?></h6></td>
        <td>
           <h6> <?= $this->Html->link($fighter->name, ['action' => 'view', $fighter->id]) ?></h6>
        </td>
        <td>
            <h6><?= $this->Form->postLink(
                'Supprimer',
                ['action' => 'delete', $fighter->id],
                ['confirm' => 'Etes-vous sûr?'])
            ?></h6>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<div class="row">
        <div class="col-md-3"><?= $this->Html->link(
                            'Ajouter un fighter', '/Fighters/add',
                            ['class' => 'button', 'target' => '_blank']) ?></div>
        <div class="col-md-3"><?= $this->Html->link(
                            'Retour au menu', '/',
                            ['class' => 'button', 'target' => '_blank']) ?></div>
</table>
</body>
</html>

