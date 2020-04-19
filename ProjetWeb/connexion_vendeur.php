<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Connection d'un vendeur</title>
 
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
    <form action="connexion_vendeur.php" method="post">
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
                <h1>Bienvenue vendeur !</h1>
   
            </div>
        </header> 
<div class="content" align="center">
    
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
					<input type = "submit" href = "acceuil_vendeur.php" value="Connection" style = "background-color:#353b48 ; color: #fff; padding : 5px 30px"></td>    
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

$Pseudo = isset($_POST["Pseudo"])? $_POST["Pseudo"] : "";  
$Email = isset($_POST["Email"])? $_POST["Email"] : "";  
$sql = "SELECT * FROM Vendeur";   
        if ($Pseudo != "") 
        {     
  //on cherche si le vendeur existe
          $sql .= " WHERE Pseudo LIKE '%$Pseudo%'";     
          if ($Email != "") 
         {      
           $sql .= " AND Email LIKE '%$Email%'";   
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
            }
          
     
          echo'<a href = "acceuil_vendeur.php">acceuil</a>';
        }    
        else
        {
          echo 'Mauvais identifiant   <br>';
        }
       
	
	
?>
    </div>
         </form>
        
   


     <header class="page-header header container-fluid"  style ="background-color : #B1B1B1 ">
            
            <div class="description" >
                <h1>Je suis nouveau ici</h1>
   
            </div>
        </header> 
    
    <div class="content " style ="background-color : #DBFFE2; height: 500px; padding-top : 150px" align="center">
        <a href = "creer_vendeur.php"><input value="S'inscrire" style = "background-color:#353b48 ; color: #fff; padding : 7px 35px"></a>
            
       
        
    </div>
    
    </body>
    </html>
