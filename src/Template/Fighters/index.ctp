<!-- File: src/Template/Articles/index.ctp -->

<h1>Tous les fighters</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Pseudo</th>
        <th>Actions</th>
    </tr>

    <!-- Ici se trouve l'itération sur l'objet query de nos $articles, l'affichage des infos des articles -->

    <?php foreach ($fighter as $fighter): ?>
    <tr>
        <td><?= $fighter->id ?></td>
        <td>
            <?= $this->Html->link($fighter->name, ['action' => 'view', $fighter->id]) ?>
        </td>
        <td>
            <?= $this->Form->postLink(
                'Supprimer',
                ['action' => 'delete', $fighter->id],
                ['confirm' => 'Etes-vous sûr?'])
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>