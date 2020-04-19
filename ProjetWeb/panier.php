<?php 
session_start();
 ?>

<html>
    <head>
    </head>
    
    <body>
    </body>
</html>

<?php  
  //selection bdd
 $database = "piscine";    
//connection Bdd
 $db_handle = mysqli_connect('localhost', 'root', 'root');  
 $db_found = mysqli_select_db($db_handle, $database); 
 

  if ($db_found) 
    {    

        
          //ajout a la table
          $sql = "INSERT INTO Contient(Id_panier, Id_item)VALUES('$Nom', '$Prenom', '$Email', '$Adresse')"; 

          $result = mysqli_query($db_handle, $sql);     
          echo "ajout réussi." . "<br>";                                   
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
            
 $result = mysqli_query($db_handle, $sql); 
 
  while ($data = mysqli_fetch_assoc($result)) 
  {      

    echo "Informations sur l'acheteur ajouté:" . "<br>";      
    echo "ID: " . $data['Id_acheteur'] . "<br>";      
    echo "Nom: " . $data['Nom'] . "<br>";      
    echo "Prenom: " . $data['Prenom'] . "<br>";      
    echo "Email: " . $data['Email'] . "<br>";      
    echo "Adresse: " . $data['Adresse'] . "<br>";          
  }    
} 
} 
  else 
  	{    
  		echo "Database not found";   
  	}  
    
//fermer la connexion  
mysqli_close($db_handle);
  ?>