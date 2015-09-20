<?php
class Tweetie extends plxPlugin {
 
    public function __construct($default_lang){
    # Appel du constructeur de la classe plxPlugin (obligatoire)
    parent::__construct($default_lang);
    
    # Pour accéder à une page de configuration
    $this->setConfigProfil(PROFIL_ADMIN,PROFIL_MANAGER);

    # Déclaration des hooks
    $this->addHook('ThemeEndHead', 'ThemeEndHead');
    $this->addHook('ThemeEndBody', 'ThemeEndBody');
    $this->addHook('Tweetie', 'Tweetie'); //hook pour l'affichage manuel


    } 
    
    public function ThemeEndHead() { ?>
    
        <link rel="stylesheet" href="<?php echo PLX_PLUGINS ?>Tweetie/app/tweetie.min.css">

        <?php
    }


    public function Tweetie() {?>

        <div id="tweecool"></div>

      <?php 
    }


    public function ThemeEndBody(){ ?>


        <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script> 

        <script src="<?php echo PLX_PLUGINS ?>Tweetie/app/tweetie.js"></script>

        <script>
                $(document).ready(function() {
                $('#tweecool').tweecool({
                    // Your twitter username
                    username : '<?php echo $this->getParam('username');?>',

                    // Number of tweets to show
                    limit : <?php echo $this->getParam('nb');?>, 

                    // Show profile image
                    profile_image : <?php echo $this->getParam('avatar');?>, 

                    // Show tweet time
                    show_time : <?php echo $this->getParam('time');?>, 

                    // Show media
                    show_media : <?php echo $this->getParam('media');?>,

                    //values: small, large, thumb, medium 
                    show_media_size: '<?php echo $this->getParam('media_size');?>'  
                    });
                });
        </script>
        <?php
    }
      
} // class Tweetie
?>