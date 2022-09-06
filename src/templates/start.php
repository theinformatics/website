<!doctype html>
<html lang="en">
  <head>
  <?php 
    session_start(); 
    include('./source/event-tracker.php'); 
    include('./source/auth.php'); 
  

    //authentication block - start
    echo "<!-- DEBUG START: ".$this->getValue('art_REQUIRED_ROLES')." --> \n";
    doesPageRequireLogin($this->getValue('art_REQUIRED_ROLES'));
    

    
  ?>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-212143051-1', 'auto');
ga('send', 'pageview');
</script>
<!-- End Google Analytics -->

    <!-- SEO -->
<!-- TEST
    <?php
     /* $seo = new rex_yrewrite_seo();
      echo $seo->getTitleTag().PHP_EOL;
      echo $seo->getDescriptionTag().PHP_EOL;
      echo $seo->getRobotsTag().PHP_EOL;
      echo $seo->getHreflangTags().PHP_EOL;
      echo $seo->getCanonicalUrlTag().PHP_EOL;*/
?>
-->
    <?php
        $aktuelle_id = $this->getValue('article_id');
        $serverName = rtrim(rex::getServer(), "/");
        $websiteName = rex::getServerName();
        //$url = rex::getUrl($aktuelle_id);
        $pagePath = rex_getUrl($aktuelle_id);

        $title  =  $this->getValue ('art_META_TITLE');
        $metaDescription  =  $this->getValue ('art_META_DESCRIPTION');
        $metaKeywords  =  $this->getValue ('art_META_KEYWORDS');
        $ogDescription  =  $this->getValue ('art_OG_DESCRIPTION');
        $ogImage  =  $serverName.'/media/'.$this->getValue ('art_OG_IMAGE');

        
        
        $ogUrl = $serverName.''.$pagePath; 
        echo '<!-- DEBUG: '.$serverName.' ; '.$pagePath.' '.$aktuelle_id.'-->';
        $ogSiteName = "The Informatics";
        
       
        //validations and defaults
        if($title == ""){
          $title = "Hello, World!"; //toDo Get from Home
        }

        if($metaDescription == ""){
          //toDo Get from Home
          $metaDescription = "The Internet! Infinite expanses! Infinite amount of trash! A small group of computer scientists and nerds have come together to configure all parents and grandparents’ laptops at Christmas! So be aware! The Informatics will nestle in your ear canal like a porn popup on your brother-in-law’s laptop! Punk Rock, Computer, Nerds and Rock’n’Roll! That’s the mix that The Informatics is made of!";
        } 

        if ($ogDescription == "" AND $metaDescription != "" ) {
          //toDo Get from Home
          $ogDescription = $metaDescription;
        }

        if ($metaKeywords == "") {
          //toDo Get from Home
          $metaKeywords = "IT, Computer, Engineering, Nerds, Punk, Rock, Rock n Roll, Düsseldorf, Internet, PC, Windows, Configuration, Informatics, The Informatics";
        }
        
        if($ogImage == $serverName.'/media/') {
          $ogImage = $serverName.'/media/'."logo-space.jpg";
        }



    ?>

    <meta name="description" content="<?php echo $metaDescription;?>"/>
    <meta name="keywords" content="<?php echo $metaKeywords;?>"/>
    <meta name="author" content="<?php echo $websiteName;?>"/>
    <meta name="copyright" content="<?php echo $websiteName;?>"/>
    <meta name="robots" content="index,follow"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="expires" content="0"/>
    <!-- Social Media -->
    <meta property="og:title" content="<?php echo $title;?>"/>
    <meta property="og:description" content="<?php echo $ogDescription;?>">
    <meta property="og:url" content="<?php echo $ogUrl;?>">
    <meta property="og:type" content="article"/>
    <meta property="og:site_name" content="<?php echo $ogSiteName;?>" />
    <meta property="og:image" content="<?php echo $ogImage;?>"/>

    <meta itemprop="name" content="<?php echo $title;?>"/>
    <meta itemprop="image" content="<?php echo $ogImage;?>"/>
    <meta itemprop="type" content="article"/>
    <meta itemprop="url" content="<?php echo $ogUrl;?>"/>

    <meta name="twitter:title" content="<?php echo $title;?>"/>
    <meta name="twitter:description" content="<?php echo $ogDescription;?>"/>
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image:src" content="<?php echo $ogImage;?>"/>
    <meta name="twitter:site" content="@the_informatics"/>



    <!-- webfonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $serverName."/css/VT323/VT323.css";?>"">
    <link rel="stylesheet" href="<?php echo $serverName."/css/main.css";?>">

    

    <title><?php echo $title; ?></title>

    <!-- GS:FANCYBOX2-JS-ENDE --><link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#000"
    },
    "button": {
      "background": "#f1d600"
    }
  },
  "content": {
    "message": "Cookies all around. Also on this website Cookies are thoughtfully used to track every step of you. But believe us, we are professionals. To be honest, as long as we don't have a marketing department nobody checks the analytics. We just enjoy coding.",
    "dismiss": "All clear!",
    "link": "Tell me more...",
    "href": "https://www.theinformatics.de/cookies"
  }
})});
</script>
  </head>
  <body>
    <div class="abc">

    <header>
       
        <div class="header-logo text-center fixed-top">
            <img src="<?php echo $serverName.'/img/web-logo-100.png';?>"/>
        </div>
       
    </header>

    <!-- Mobile Navigation -->
	<nav class="navbar  k-mobile navbar-dark k-dark fixed-top">
        <a class="navbar-brand" href="#"><img src="<?php echo $serverName; ?>/img/web-logo-100.png" width="250px"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarsExample01">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="redaxo://1">ROOT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="redaxo://2">MEETUPS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="redaxo://3">DOCS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="redaxo://4">CLI</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="redaxo://5">CONTACT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="redaxo://6">REPOS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="redaxo://13">IMPRESSUM</a>
            </li>
            
            
           
          </ul>
         </div>
      </nav>
      <!-- Mobile Navigation -->	
        <nav class="navbar navbar-expand-lg navbar-light fixed-top mynav">
            <div class="container">
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="redaxo://1">ROOT <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="redaxo://2">MEETUPS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="redaxo://3">DOCS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="redaxo://4">CLI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="redaxo://5">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="redaxo://6">REPOS</a>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
    
    <main>
        
        REX_ARTICLE[]
        
    
    </main>
    <div class="push"></div>
</div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 text-right">
                    <ul class ="footer-links">
                        <li class="footer-link"><a href="redaxo://5">Contact</a> </li>
                        <li class="footer-link"><a href="redaxo://13">Impressum</a> </li>
<li class="footer-link"><a href="redaxo://26">Press</a> </li>

                        <?php
                          if (userIsLoggedIn())
                          {
                            echo '<li class="footer-link"><a href="redaxo://20">Logout</a> </li>';
                            echo '<li class="footer-link"><a href="redaxo://18">Intern</a> </li>';
                          }
                        ?>
                    </ul>
                </div>
                <div class=" col-xl-6 text-right">
                    <ul class ="social-items">
                         
                        <li class="social-item"> <a href="https://www.facebook.com/TheInformaticsBand" target="_blank"><img src="<?php echo $serverName.'/img/facebook-square.png';?>"></a></li>
                        <li class="social-item"> <a href="https://www.instagram.com/theinformaticsband" target="_blank"><img src="<?php echo $serverName.'/img/instagram-square.png';?>"></a></li>
                        <li class="social-item"> <a href="https://www.youtube.com/channel/UCCZL1sPJhgz2rI1x7sgudVg/featured" target="_blank"><img src="<?php echo $serverName.'/img/youtube-square.png';?>"></a></li>
                        <li class="social-item"> <a href="https://twitter.com/the_informatics" target="_blank"><img src="<?php echo $serverName.'/img/twitter-square.png';?>"></a></li>
                        <li class="social-item"> <a href="https://www.tiktok.com/@the_informatics" target="_blank"><img src="img/tiktok-square.png"></a></li>
                        <li class="social-item"> <a href="https://open.spotify.com/artist/5zTcaNp5dCwyrwUvfFFNM8?si=YtYhT6n9TciPTmHYbC7elQ" target="_blank"><img src="img/spotify-square.png"></a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    
    
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>