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
        <nav class="navbar navbar-expand-sm">
     
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
                        <a class="nav-link" href="connexion_vendeur.php">Vendeur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="connexion_admin.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="connexion_acheteur.php">Acheteur</a>
                    </li>
                </ul>
            </div>

        </nav>
        
        <header class="page-header header container-fluid">
            <div class="overlay"></div>
            <div class="description">
                <h1>Bienvenue sur ECE Ebay !</h1>
                <p>
                    Un site où vous pouvez vendre et acheter des Trésors, des objets pour musée ou encore des accessoires VIP
                </p> 
            </div>
        </header> 
        </div>
        <div class="content" align="center">
<div class="content">
    <form action="connexion_admin.php" method="post">
        <p>Veuillez entrer vos identifiants pour vous connecter:<p/>
        <div class="center">
            <table>    
			<tr>
				<td>Pseudo:</td>     
				<td><input type="text" name="Pseudo"></td>    
			</tr>    
			<tr>     
				<td>Email:</td>     
				<td><input type="password" name="Email"></td>    
			</tr>
			<tr>     
				<td colspan="2" align="center">                                
					<input type="submit" value="Connection" name="button"></td>    
				</tr>   
			</table>
		</div>
         </form>
        </div>
   
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
$Pseudo = isset($_POST["Pseudo"])? $_POST["Pseudo"] : "";  
$Email = isset($_POST["Email"])? $_POST["Email"] : "";  
 $sql = "SELECT * FROM vendeur";   
        if ($Pseudo != "") 
        {     
  //on cherche si l'acheteur existe deja
          $sql .= " WHERE Pseudo LIKE '%Admin%'";     
          if ($Email != "") 
         {      
           $sql .= " AND Email LIKE '%Admin@edu.ece.fr%'";     
         }    
       }    
      $result = mysqli_query($db_handle, $sql);    
      if (mysqli_num_rows($result) != 0) 
        {    
            while ($data = mysqli_fetch_assoc($result)) 
  {      
    //recupération des cariables de session
  $_SESSION['Pseudo']=$Pseudo;
  $_SESSION['Id_vendeur']=$data['Id_vendeur'];
  $_SESSION['Email']=$Email;
  echo "ID: " . $_SESSION['Id_vendeur'] . "<br>";
  echo '<a href="accueil_admin.php">Connexion</a>';
}
}
}
        }  
     else
        {
          echo "Mauvais identifiant " . "<br>";
        }
	
	
?>
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