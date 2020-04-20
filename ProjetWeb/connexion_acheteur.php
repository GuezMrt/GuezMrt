<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Connection d'un acheteur</title>
 
            <title>EbayECE</title>
          
        <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
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
    <form action="connexion_acheteur.php" method="post">
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
                    <li class="navbar-brand" style = "font-size: 40px"  ><a href="accueil.php" style = "text-decoration: none; color: white">ECE Ebay</a></li>
         
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="creer_vendeur.php">Vendeur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Creer_acheteur.php">Acheteur</a>
                    </li>
                   
                </ul>
            </div>

        </nav>
        
        <header class="page-header header container-fluid" style = "padding-top: 90px; background-color :#B1B1B1 ">
            <div class="overlay" style = "padding-top: 90px"></div>
            <div class="description">
                <h1>Bienvenue acheteur !</h1>
   
            </div>
        </header> 
<div class="content" align="center">
    
        <p>Veuillez entrer vos identifiants pour vous connecter:<p/>
        <div class="center">
            <table>    
            <tr>
                <td>Nom:</td>     
                <td><input type="text" name="Nom"></td>    
            </tr>    
            <tr>     
                <td>Prenom:</td>     
                <td><input type="text" name="Prenom"></td>    
            </tr>
            <tr>     
                <td>Email (password):</td>     
                <td><input type="password" name="Email"></td>    
            </tr>
            <tr>     
                <td colspan="2" align="center">                                
                    <input type="submit" value="Connection" name="button"></td>    
                </tr>   
            </table>
        </div>
        
        <?php
// récupère les données du formulaire

//Connexion à la Base de Données
 $database = "piscine";    
//connection Bdd
 $db_handle = mysqli_connect('localhost', 'root', 'root');  
 $db_found = mysqli_select_db($db_handle, $database); 
if ($_POST["button"]) 
 {   
  if ($db_found) 
    {    
$Prenom = isset($_POST["Prenom"])? $_POST["Prenom"] : "";
$Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
$Email = isset($_POST["Email"])? $_POST["Email"] : "";  
$sql = "SELECT * FROM acheteur";   
        if ($Prenom != "") 
        {     
  //on cherche si le vendeur existe
          $sql .= " WHERE Prenom LIKE '%$Prenom%'";     
          if ($Nom != "") 
         {      
           $sql .= " AND Nom LIKE '%$Nom%'";
           if ($Email != "") 
         {      
           $sql .= " AND Email LIKE '%$Email%'";   
         }       
         }    
          } 
      $result = mysqli_query($db_handle, $sql); 
      if (mysqli_num_rows($result) != 0) 
        {    
  while ($data = mysqli_fetch_assoc($result)) 
  {      
    //recupération des cariables de session
  $_SESSION['Prenom']=$Prenom;
  $_SESSION['Id_acheteur']=$data['Id_acheteur'];
  $_SESSION['Nom']=$Nom;
  $_SESSION['Email']=$Email;
echo '<a href="accueil_acheteur.php">Connexion</a>';

}
          
   
}
}
}       
        else
        {
          echo "Mauvais identifiant " . "<br>";
        }
    
    
?>
    </div>
    <header class="page-header header container-fluid"  style ="background-color : #B1B1B1 ">
            
            <div class="description" >
                <h1>Je suis nouveau ici</h1>
   
            </div>
        </header> 
    
    <div class="content " style ="background-color : #DBFFE2; height: 500px; padding-top : 150px" align="center">
      <button type="submit" formaction= "http://localhost/ProjetWeb/Creer_acheteur.php">S'inscrire</button>
        
    </div>
         </form>
        
   


     
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