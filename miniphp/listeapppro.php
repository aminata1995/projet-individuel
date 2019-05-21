<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../miniphp/stylepro.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap//js/bootstrap.min.js">
    <?php
include("menu.php");
?>
</head>
<body>
 <p>
<form class="form" action="listeapppro.php" method="POST"><br><br>
<label for="psw+repeat"><b>nom promo</b></label>
<p>
    <input type="text" placeholder="mettez le nom de la promo" name="code" required><br><br>
    <button type="submit" class="registerbtn" name="lister">lister</button>
</form>
<?php
 echo "<table class='table5'>";
 echo "<tr>
 <th>code promo</th>
 <th>code</th>
 <th>nom</th>
 <th>prenom</th>
 <th>date de naissance</th>
 <th>telephone</th>
 <th>email</th>
 <th>statut</th>
 </tr> "; 
 if(isset($_POST["lister"])){
$code=$_POST["code"];
$liste=fopen("apprenants.txt","r");
    while(!feof($liste)){
        $ligne=fgets($liste);
        $col=explode(",",$ligne);
        if($code==$col[0])  {
            echo "<tr><td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]</td><td>$col[4]</td><td>$col[5]</td><td>$col[6]</td><td>$col[7]</td></tr>";
        }
    }
    echo"</table>";
    fclose($tab);          
}                
               
            


?>
</body>
</html>