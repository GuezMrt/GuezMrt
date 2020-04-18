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
        
        <div class="row">
        <?php 
            $Id_item = $_GET['id'];
            
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
                    echo '<div class="col-lg-4 col-md-6 mb-4" >'; 
                    echo '<div class="card h-80">';
                    echo '<a href="#"><img class="card-img-top" src="img/'. $data['photo'] .' " alt=""></a>';
                    echo '<div class="card-body"> <h4 class="card-title"><a href="#">'. $data['Nom'] .'</a></h4>';
                   
                    // pour recuperer l'id dans articles_detais.php => $IdDelItem = $_GET['id'];
                    echo '<h5>'. $data['Prix'] .'</h5>';
                    echo '<p class="card-text"> '. $data['Description'] .'</p></div>';
                    echo '<div class="card-footer"><small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small></div>';
                    echo '<a href = "panier.php?id='. $data['Id_item'] .'"><input name="button" value="Panier"></a><br>';
                 
                    echo'</div>';
                    echo'</div>';
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
        
        
       
 
        
       
        
    </body>

</html>


