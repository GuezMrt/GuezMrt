<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
    <head>
        
        <title>EbayECE</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script type="text/javascript"></script>
        <link href="http://fr.allfont.net/allfont.css?fonts=futura-normal" rel="stylesheet" type="text/css"/>
        <style>
        body 
        {
          
            font-family: 'Futura-Normal', arial;
        
        }
        </style>
 
    </head>
    
    <body>
    <!-- Navbar -->
       <!-- Navbar -->
        <nav class="navbar navbar-expand-sm fixed-top">
     
            <div class="searchbar fixed-top">
            <input class="search_input" type="text" name="" placeholder="Rechercher...">
                <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
            </div>
            <button style = "border: none; color: white; padding: 12px 1300px;font-size: 30px" class="btn fixed-top">
                <i class="fa fa-bars"></i>
            </button>
            <div class="container justify-content-center">
                <ul class="navbar-nav fixed-top justify-content-center">
                    <li class="navbar-brand" style = "font-size: 40px"  href="#">ECE Ebay</li>
         
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="creer_vendeur.php">Catégorie</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="Panier.php"><img src="Panier.png" style = "height:45px; width : 45px;"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Message</a>
                    </li>
                   
                </ul>
            </div>

        </nav>
        
 <header class="page-header header container-fluid" style = "padding-top: 90px; background-color :#B1B1B1 ">
            
            <div class="description">
                <a href ="Ferraille_tresor.php" style="font-size: 2em; color : #000">Ferraille ou Tresor</a>
                <a href ="Bon_musée.php" style="font-size: 2em; color : #000 ; padding: 30px 30px">Bon pour le musee</a>
                <a href ="Accessoires_VIP.php" style="font-size: 2em; color : #000">Accessoires VIP</a>
    
            </div>
        </header>
        </div>
        
        <div class="row" >
        
        <div class="col-sm" style="left : 2em">
            <img src="img/tresor.jpg" width="420px" height="320" class="rounded" alt="Torque">
            <div class="caption">
                   
                      <p style="text-align: center; color: #07D1B1; padding-top: 40px;width:420px; height:100px; background-color : #353b48"><a href="Ferraille_tresor.php"> Ferraille ou Tresor</a></p>
               
            </div>
        </div>
        
        <div class="col-sm"style="left : 2em">
            <img src="img/musee.jpg" width="420px" height="320" class="rounded" alt="Torque">
            <div class="caption">
                   
                   <p style="text-align: center; color: #07D1B1; padding-top: 40px;width:420px; height:100px; background-color : #353b48"><a href="Bon_musée.php">Bon pour le musée</a></p>
                
            </div>
        </div>
        
        <div class="col-sm"style="left : 2em">
            <img src="img/vip.jpg" width="420px" height="320" class="rounded" alt="Torque">
            <div class="caption">
              <p style="text-align: center; color: #07D1B1; padding-top: 40px;width:420px; height:100px; background-color : #353b48"><a href="Accessoires_VIP.php">Accessoires VIP</a></p> 
            </div>
        </div>
    </div>
        
               <footer class="page-footer">
         <div class="container">
         <div class="row">
         <div class="col-lg-8 col-md-8 col-sm-12">
         <h6 class="text-uppercase font-weight-bold">Information additionnelle</h6>
         <p>
         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum quam odio, quis placerat ante luctus eu.
         Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis.
             </p>
         <p>
         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum quam odio, quis placerat ante luctus eu.
         Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis.
         </p>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-12">
         <h6 class="text-uppercase font-weight-bold">Contact</h6>
         <p>
         37, quai de Grenelle, 75015 Paris, France <br>
         info@webDynamique.ece.fr <br>
         +33 01 02 03 04 05 <br>
         +33 01 03 02 05 04
         </p>
         </div>
         </div>
         <div class="footer-copyright text-center">&copy; 2019 Copyright | Droit d'auteur: webDynamique.ece.fr</div></div>
        </footer>
        
 


       
    </body>
</html>