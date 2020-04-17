<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Connection d'un vendeur</title>
	
</head>
<body>
<p>Bonjour</p>
<p>Bienvenue sur notre site.</p>
<div class="content">
    <form action="connection vendeur.php" method="post">
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
					<input type="submit" value="Connection"></td>    
				</tr>   
			</table>
		</div>
    </form>
</body>
</html>
