<!DOCTYPE html>
<html lang="fr">

        <head>
            <meta charset="utf-8" />
            <?php
                $this->assign('title', 'Page d\'accueil');
                echo $this->Html->css('bootstrap.min.css');
                echo $this->Html->css('style.css');
                echo $this->Html->script([
                'jquery-1.12.4.min.js',
                'bootstrap.min.js']);
            ?>
        </head>

<body>

    <div class="bg">
        <p>hello test css bckgrd</p>
    </div>

    <p class="py-5 text-center">This example creates a full page background image. Try to resize the browser window to see how it always will cover the full screen (when scrolled to top), and that it scales nicely on all screen sizes.</p>

    <!-- SCRIPTS -->
    <script type="text/javascript" src="../../js/compiled.min.js"></script>

    <div class="container">

      <div class="prez">
        <h1>Bienvenu sur WebArena</h1>
            <p>
                C'est un jeu de combat dans lequel le joueur crée son combattant et affronte d'autres joueurs dans une arène pour gagner de l'expérience et des niveaux.</br>
                En progressant à travers les niveaux, le combattant voit ses caractéristiques augmenter et peut gagner de l'équipement.</br>
                Le joueur peut créer autant de combattants qu'il souhaite, mais si celui-ci viens à tomber au combat, il disparaitera definitivement.
            </p>
      </div>

      <div class='regles'>
            <h3>Règles du jeu</h3>
            <p>
                Tous les combattants sont placés sur l'arène et doivent survivres au milieux des monstres, des pieèges et des autres combattants.</br>
                Il peut soit se déplacer, soit attaquer. A chaque attaque, le combattant obtient de l'experience.</br>
                4 points d'experience garantissent un niveau supplémentaire, le joueur peut alors choisir d'augmenter l'une des ces caractéristiques: la vue, la force ou les points de vie.
                Ces derniers sont ensuitent remonté au maximum.
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
