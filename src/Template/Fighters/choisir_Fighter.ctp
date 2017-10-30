<h1>Tous les fighters</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Pseudo</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($fighters as $fighters): ?>
    <tr>
        <td><?= $fighters->id ?></td>
        <td>
            <?= $this->Html->link($fighters->name, ['controller' => 'Arenas', 'action' => 'sight', $fighters->id]) ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>