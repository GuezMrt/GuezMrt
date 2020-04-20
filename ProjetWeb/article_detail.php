<?php 
session_start();
 ?>
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
                    <li class="navbar-brand" style = "font-size: 40px"  href="accueil.php">ECE Ebay</li>
         
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="articles_vendeur.php">Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="articles_ajouter.php">Ajouter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="messages.php">Messages</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="Compte.php">Compte</a>
                    </li>
                </ul>
            </div>

        </nav>
            <header class="page-header header container-fluid" style = "padding-top : 90px; background-color :#B1B1B1 ">
            <div class="overlay" style = "padding-top: 90px"></div>
            <div class="description">
                <h1>Detail de l'article</h1>
   
            </div>
        </header> 
        
        <div class = "container" align = "center">
        <div class="row" style = "padding-top : 20px" >
        <?php 
            $Id_item = $_GET['id'];
            $Id_acheteur = $_SESSION['Id_acheteur'];
            $database = "piscine";
            //connectez-vous dans votre BDD
            //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
            $db_handle = mysqli_connect('localhost', 'root', 'root' );
            $db_found = mysqli_select_db($db_handle, $database);
             //si le BDD existe, faire le traitement
            if ($db_found) 
            {
             $sql = "SELECT *, photo FROM Item, Photo WHERE Item.Id_item = Photo.Id_item AND Item.Id_item = $Id_item";
           
             $result = mysqli_query($db_handle, $sql);
            
                while ($data = mysqli_fetch_assoc($result))
                    
                {
 
                    echo '    <div class="card mb-2">
                              <div class="row no-gutters" style = " height : 300px; width : 600px">
                                <div class="col-md-4" style = "height : 300px; width : 600px">
                                  <img src="img/'. $data['photo'] .' " height = "300px"  class="card-img" alt="...">
                                </div>
                                <div class="col-md-8" style = "height : 300px; width : 600px">
                                  <div class="card-body" >
                                    <h5 class="card-title">'. $data['Nom'] .'</h5>
                                    <h5>'. $data['Prix'] .'</h5>
                                    <h5>'. $data['nom_cat'] .'</h5>
                                    <p class="card-text">'. $data['Description'] .'</p>
                                    <p class="card-text"> <a href = "panier.php?id='. $data['Id_item'] .'"><input type ="submit" name="button" value="Ajouter Panier"></a><br></p>
                                  </div>
                                </div>
                              </div>
                            </div>'; 
                }
              
                 
           
         
            }//end if
            
            //si le BDD n'existe pas
            else {
             echo "Database not found";
            }//end else
    
            //fermer la connection
            mysqli_close($db_handle);
            
        ?>
        
        </div>
            </div>
        
           <footer class="page-footer fixed-bottom" >
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
