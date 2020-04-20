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
            <header class="page-header header container-fluid" style = "padding-top: 90px; background-color :#B1B1B1 ">
            <div class="overlay" style = "padding-top: 90px"></div>
            <div class="description">
                <h1>Panier de toi !</h1>
   
            </div>
        </header> 
<?php  
        
  //selection bdd
 $database = "piscine";    
//connection Bdd
 $db_handle = mysqli_connect('localhost', 'root', 'root');  
 $db_found = mysqli_select_db($db_handle, $database); 
  
$Id_item = $_GET['id'];
      echo'item : '. $Id_item .'<br>';
      //recupération de l'id panier en fonction de l'acheteur connecté
      $Id_acheteur = $_SESSION['Id_acheteur'];
      echo'acheteur : '. $Id_acheteur .'<br>';
         

  if ($db_found) 
    {    
        $sql = "SELECT *, Id_panier FROM Acheteur, Panier WHERE Acheteur.Id_acheteur = Panier.Id_acheteur AND Acheteur.Id_acheteur = $Id_acheteur";
        $result = mysqli_query($db_handle, $sql); 
         while ($data = mysqli_fetch_assoc($result)) 
          {      
              //echo'panier '. $data['Id_panier'] .'<br>';
             
             $Id_panier = $data['Id_panier'];
             echo 'panier'. $Id_panier .'<br>';
             echo'item'. $Id_item . '<br>';
             
               
        }
      
      $sql = "INSERT INTO Contient(Id_panier, Id_item)VALUES('$Id_panier', '$Id_item')";
      $result = mysqli_query($db_handle, $sql); 
      
      $sql = "SELECT * FROM Contient";
        $result = mysqli_query($db_handle, $sql);
        while ($data = mysqli_fetch_assoc($result)) 
          {      
              //echo'panier '. $data['Id_panier'] .'<br>';
              echo'acheteur '. $data['Id_acheteur'] .'<br>';
            echo 'item'. $data['Id_item'] .'<br>';
             echo 'panier '. $data['Id_panier'] .'<br>';
            
             
               
        }
        
 
    } 

  else 
  	{    
  		echo "Database not found";   
  	}  
  
//fermer la connexion  
mysqli_close($db_handle);
  ?>
    </body>
</html>
