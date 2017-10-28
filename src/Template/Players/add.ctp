
<!-- src/Template/Players/add.ctp -->

<div class="users form">
<?= $this->Form->create($player) ?>
    <fieldset>
        <legend><?= __('Ajouter un utilisateur') ?></legend>
        <?= $this->Form->control('email') ?>
        <?= $this->Form->control('password') ?>
   </fieldset>
<?= $this->Form->button(__('Envoyer')); ?>
<?= $this->Form->end() ?>
</div>
