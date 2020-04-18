    	
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
                    <li class="navbar-brand" style = "font-size: 40px"  href="#">ECE Ebay</li>
         
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Vendeur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Acheteur</a>
                    </li>
                </ul>
            </div>

        </nav>
        
        <header class="page-header header container-fluid" style="margin-top : 90px">
            <div class="overlay"></div>
            <div class="description">
                <h1>Creer un compte acheteur !</h1>
            </div>
        </header> 
        
<form action="Creer_acheteur.php" method="post"> 
            <?php  
//recupération des info de pages php
$Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";  
$Prenom = isset($_POST["Prenom"])? $_POST["Prenom"] : "";  
$Email = isset($_POST["Email"])? $_POST["Email"] : "";  
$Adresse = isset($_POST["Adresse"])? $_POST["Adresse"] : "";
$Num_tel = isset($_POST["Num_tel"])? $_POST["Num_tel"] : "";

$Numero_de_telephone = isset($_POST["Numero_de_telephone"])? $_POST["Numero_de_telephone"] : "";  
$Adresse1 = isset($_POST["Adresse1"])? $_POST["Adresse1"] : "";  
$Adresse2= isset($_POST["Adresse2"])? $_POST["Adresse2"] : "";  
$Ville = isset($_POST["Ville"])? $_POST["Ville"] : "";  
$Code_postale = isset($_POST["Code_postale"])? $_POST["Code_postale"] : "";
$Pays = isset($_POST["Pays"])? $_POST["Pays"] : "";

$Numero_carte = isset($_POST["Numero_carte"])? $_POST["Numero_carte"] : "";
$Code_securite = isset($_POST["Code_securite"])? $_POST["Code_securite"] : "";
$Nom_proprietaire = isset($_POST["Nom_proprietaire"])? $_POST["Nom_proprietaire"] : ""; 
$Prenom_proprietaire = isset($_POST["Prenom_proprietaire"])? $_POST["Prenom_proprietaire"] : ""; 
$Date_expiration = isset($_POST["Date_expiration"])? $_POST["Date_expiration"] : "";
$Type = isset($_POST["Type"])? $_POST["Type"] : ""; 
$Sold = isset($_POST["Sold"])? $_POST["Sold"] : "";
$Seuil = isset($_POST["Seuil"])? $_POST["Seuil"] : "";

 

 
  //selection bdd
 $database = "piscine";    
//connection Bdd
 $db_handle = mysqli_connect('localhost', 'root', 'root');  
 $db_found = mysqli_select_db($db_handle, $database); 
 
 if ($_POST["button"]) 
 {   
  if ($db_found) 
    {    
      $sql = "SELECT * FROM acheteur";   
        if ($Nom != "") 
        {     
  //on cherche si l'acheteur existe deja
          $sql .= " WHERE Nom LIKE '%$Nom%'";     
          if ($Prenom != "") 
         {      
           $sql .= " AND Prenom LIKE '%$Prenom%'";     
         }    
       }    
      $result = mysqli_query($db_handle, $sql);    
       //regarder s'il y a un résultat    
       if (mysqli_num_rows($result) != 0) 
        {    
          echo "Acheteur existe deja";  
       
        } 
        else 
        { 
          //ajout a la table
          $sql = "INSERT INTO acheteur(Nom, Prenom, Email, Adresse)VALUES('$Nom', '$Prenom', '$Email', '$Adresse')";

          $result = mysqli_query($db_handle, $sql);     
                                       
          //on affiche l'acheteur ajouté     
          $sql = "SELECT * FROM acheteur";     
          if ($Nom != "") 
          {     
          //on cherche l'achteur ajouté    
 	          $sql .= " WHERE Nom LIKE '%$Nom%'";      
 	          if ($Prenom != "")
            {       
 		         $sql .= " AND Prenom LIKE '%$Prenom%'";
                  
 	          }     
        }     
    $result = mysqli_query($db_handle, $sql); 
    while ($data = mysqli_fetch_assoc($result) ) 
    {
            $Id_acheteur = $data['Id_acheteur']; 
    }

   
         $sql = "INSERT INTO livraison(Numero_de_telephone, Adresse1, Adresse2, Ville, Code_postale, Pays, Id_acheteur)
         VALUES('$Numero_de_telephone', '$Adresse1', '$Adresse2', '$Ville', '$Code_postale', '$Pays', '$Id_acheteur')";
   $result = mysqli_query($db_handle, $sql); 
            
                  //on affiche l'acheteur ajouté     
          $sql = "SELECT * FROM acheteur";     
          if ($Nom != "") 
          {     
          //on cherche l'achteur ajouté    
 	          $sql .= " WHERE Nom LIKE '%$Nom%'";      
 	          if ($Prenom != "")
            {       
 		         $sql .= " AND Prenom LIKE '%$Prenom%'";
                  
 	          }     
        }     
    $result = mysqli_query($db_handle, $sql); 
    while ($data = mysqli_fetch_assoc($result) ) 
    {
            $Id_acheteur = $data['Id_acheteur'];
                       
                    
    }
             

            
        $sql = "INSERT INTO carte(Numero_carte, Code_securite, Nom_proprietaire, Prenom_proprietaire, Date_expiration, Type, Sold, Seuil, Id_acheteur)
         VALUES('$Numero_carte', '$Code_securite', '$Nom_proprietaire', '$Prenom_proprietaire', '$Date_expiration', '$Type', '$Sold', '$Seuil', '$Id_acheteur')";
   $result = mysqli_query($db_handle, $sql); 
                          
            //on affiche l'acheteur ajouté     
          $sql = "SELECT * FROM acheteur";     
          if ($Nom != "") 
          {     
          //on cherche l'achteur ajouté    
 	          $sql .= " WHERE Nom LIKE '%$Nom%'";      
 	          if ($Prenom != "")
            {       
 		         $sql .= " AND Prenom LIKE '%$Prenom%'";
                  
 	          }     
        }     
    $result = mysqli_query($db_handle, $sql); 
    while ($data = mysqli_fetch_assoc($result) ) 
    {
            $Id_acheteur = $data['Id_acheteur'];
                       
                    
    }
             

            
        $sql = "INSERT INTO Panier(Id_acheteur)VALUES('$Id_acheteur')";
   $result = mysqli_query($db_handle, $sql); 
    
 

        //header
            echo'<a href = "connexion_acheteur.php">connexion</a>';
        } 

      
} 
  else 
  	{    
  		echo "Database not found";   
  	}  

}    
   
//fermer la connexion  
mysqli_close($db_handle);
  ?> 
 <div class="container-fluid">
  <div class="container-fluid">
        <div class="row" style="height : 350px; ">
        <div class="col-sm" >
        
		<table>    
			<tr>
				<td>Nom :</td>     
				<td><input type="text" name="Nom"></td>
            
			</tr> 
            <tr> </tr>
            <tr> </tr>
             
			<tr>     
				<td>Prenom:</td>     
				<td><input type="text" name="Prenom"></td>    
			</tr>    
			<tr>     
				<td>Adresse:</td>     
				<td><input type="text" name="Email"></td>    
			</tr>    
			<tr>     
				<td>Email:</td>     
				<td><input type="text" name="Adresse"></td>    
			</tr>    
	
	       
			</table>  
		
       
            
    </div> <div class="col-sm">
            	  
		<table>    
			<tr>
				<td>Adresse ligne 1 :</td>     
				<td><input type="text" name="Adresse1"></td>    
			</tr>    
			<tr>     
				<td>Adresse ligne 2 :</td>     
				<td><input type="text" name="Adresse2"></td>    
			</tr>    
			<tr>     
				<td>Ville : </td>     
				<td><input type="text" name="Ville"></td>    
			</tr>    
			<tr>     
				<td>Code Postale : </td>     
				<td><input type="text" name="Code_postale"></td>    
			</tr> 
            <tr>     
				<td>Pays : </td>     
				<td><input type="text" name="Pays"></td>    
			</tr> 
            <tr>     
				<td>Numero de telephone : </td>     
				<td><input type="text" name="Numero_de_telephone"></td>    
			</tr> 
           
           
            
		   
		
			</table>  
		 
        </div>
            
    <div class="col-sm" >
        
            	  
		<table>    
		 
			<tr>     
				<td>Numero de carte : </td>     
				<td><input type="text" name="Numero_carte"></td>    
			</tr>  
            <tr>     
				<td>Code de securite : </td>     
				<td><input type="text" name="Code_securite"></td>    
			</tr> 
			<tr>     
				<td>Nom  : </td>     
				<td><input type="text" name="Nom_proprietaire"></td>    
			</tr> 
            <tr>     
				<td>Prenom : </td>     
				<td><input type="text" name="Prenom_proprietaire"></td>    
			</tr> 
			<tr>     
				<td>Date d'expiration : </td>     
				<td><input type="text" name="Date_expiration"></td>    
			</tr> 
            
            	<tr>
                
                    <td>Type de paiement : </td>     
				    <td><input type="text" name="Type"></td> 
			</tr> 
             <tr>     
				<td>Sold : </td>     
				<td><input type="text" name="Sold"></td>    
			</tr> 
            <tr>     
				<td>Seuil : </td>     
				<td><input type="text" name="Seuil"></td>    
			</tr> 
            
            
            
		   
		
			</table>  
		
        </div>
            
    
        </div>
       <div class="row" style="height:100px;">
                   

                    <div class="col-lg" style = "padding-left : 1140px">
                        <input type = "submit" name = "button" value = "Creer"  style="background-color:#3EE5CA; padding : 20px 50px;">
                    </div>


           
        </div>
            </div>
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
