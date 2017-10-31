<!DOCTYPE html>
<html lang="fr">

        <head>
            <meta charset="utf-8" />
            <?php
                $this->assign('title', 'Page d\'accueil');
                echo $this->Html->css('bootstrap.min.css');
                echo $this->Html->css('bootstrap.css');
                echo $this->Html->script([
                'jquery-1.12.4.min.js',
                'bootstrap.min.js']);
                 
            ?>
        </head>

<body>

    <!-- SCRIPTS -->
    <script type="text/javascript" src="../../js/compiled.min.js"></script>

    <div class="jumbotron">


        <div class="row ">
            <div class="col-md-2">
            </div>
             <div class="col-md-8">
                <?php echo $this->Html->image('webarenaHome.png', array('alt' => 'CakePHP', 'border' => '0', 'data-src' => 'holder.js/100%x100')); ?>
             </div>
        </div>

      <div class="prez">
        <h2 class = "h2">Bienvenu sur WebArena</h2>
            <p.lead>
                C'est un jeu de combat dans lequel le joueur crée son combattant et affronte d'autres joueurs dans une arène pour gagner de l'expérience et des niveaux.</br>
                En progressant à travers les niveaux, le combattant voit ses caractéristiques augmenter et peut gagner de l'équipement.</br>
                Le joueur peut créer autant de combattants qu'il souhaite, mais si celui-ci viens à tomber au combat, il disparaitera definitivement.
            </p>
      </div>

      <div class='regles'>
            <h2 class = "h2">Règles du jeu</h2>
            <p.lead>
                Tous les combattants sont placés sur l'arène et doivent survivres au milieux des monstres, des pieèges et des autres combattants.</br>
                Il peut soit se déplacer, soit attaquer. A chaque attaque, le combattant obtient de l'experience.</br>
                4 points d'experience garantissent un niveau supplémentaire, le joueur peut alors choisir d'augmenter l'une des ces caractéristiques:</br>
                <dd><kbd>la vue</kbd></dd>
                <dd><kbd>la force</kbd></dd>
                <dd><kbd>les points de vie</kbd></dd>
                Ces derniers sont ensuitent remontés au maximum.
            </p>

        </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
