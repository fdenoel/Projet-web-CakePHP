<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('bootstrap.css') ?> <!-- Changer pour le CSS (par exemple faire le bootstrap) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    <?= $this->fetch('meta') ?> 
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?php $this->assign('title', 'Projet_Php');?> <!-- Change le titre en haut à gauche "Projet_Php"-->
    <?php echo $this->Html->link($this->Html->tag('span','',['class' => 'glyphicon glyphicon-home']).' Acceuil',['controller' => '/'],['class' => 'btn btn-default', 'role' => 'button' , 'escape' => false]);?>
    <?php echo $this->Html->link($this->Html->tag('span','',['class' => 'glyphicon glyphicon-play']).' Jouer',['controller' => 'Fighters', 'action' => 'choisirfighter'],['class' => 'btn btn-default', 'role' => 'button' , 'escape' => false]);?>
    <?php echo $this->Html->link($this->Html->tag('span','',['class' => 'glyphicon glyphicon-eye-open']).' Page fighter',['controller' => 'Fighters', 'action' => 'index'],['class' => 'btn btn-default', 'role' => 'button' , 'escape' => false]);?>
    <?php echo $this->Html->link($this->Html->tag('span','',['class' => 'glyphicon glyphicon-calendar']).' Journal',['controller' => 'Events', 'action' => 'affichage'],['class' => 'btn btn-default', 'role' => 'button' , 'escape' => false]);?>
    <?php echo $this->Html->link($this->Html->tag('span','',['class' => 'glyphicon glyphicon-plus']).' Ajouter joueur',['controller' => 'Users', 'action' => 'add'],['class' => 'btn btn-default', 'role' => 'button' , 'escape' => false]);?>
    <?php echo $this->Html->link($this->Html->tag('span','',['class' => 'glyphicon glyphicon-user']).' Login',['controller' => 'Users', 'action' => 'login'],['class' => 'btn btn-default', 'role' => 'button' , 'escape' => false]);?>
    <?php echo $this->Html->link($this->Html->tag('span','',['class' => 'glyphicon glyphicon-off']).' Logout',['controller' => 'Users', 'action' => 'logout'],['class' => 'btn btn-default', 'role' => 'button' , 'escape' => false]);?>
    
</head>
<body>
    <!-- Si vous voulez qu'un menu soit rendu pour toutes vos vues, incluez le ici -->
    <!--<nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><a target="_blank" href="https://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="https://api.cakephp.org/3.0/">API</a></li>
            </ul>
        </div>
    </nav> -->
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <!-- C'est ici que je veux voir mes vues être rendues -->
        <?= $this->fetch('content') ?>
    <!-- Ajoute un footer pour chaque page rendue -->
    </div>
    <footer class="panel-footer" >
            <p>Groupe : SI2-02 </p>
            <p>Option : AF</p>
            <p>Auteurs : BIOY Guillaume, DENOEL Florent, VINOT DE LARMINAT Benoît</p>
            <p>Lien GIThub : https://github.com/fdenoel/Projet-web-CakePHP</p>    
    </footer>

</body>
</html>
