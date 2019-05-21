<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylepro.css">
    <?php
include("menu.php");
?>
</head>
<body>

    
<form class="form"action="inscription.php" method="POST" >
    <p>CODE
    <input type="text" name="code" id="log" placeholder="CODE">
    <p>NOM
    <input type="text" name="nom" id="log" placeholder="NOM">
    <p>PRENOM
    <input type="text" name="prenom" id="log" placeholder="PRENOM">
    <p>  DATE DE NAISS
    <input type="date" name="date" id="log" placeholder="date">
    <p>TELEPHONE
    <input type="number" name="num" id="log" placeholder="telephone">
    <p>MAIL
    <input type="email" name="email" id="log" placeholder="email">
    <p>STATUT
    <select class="statut" name="statut">

    <option type="" value="" name=""></option>
    <option type="text" value="exclu" name="exclu">exclu</option>
    <option type="text" value="abandon" name="abandon">abandon</option>
	<option type="text" value="present" name="abandon">présent</option>
    </select>
    
<?php 
echo"<select name='pro'>";
$tab=fopen("promo.txt","r");
while(!feof($tab)){
    $text=fgets($tab);
    $col=explode(",",$text);
    echo"<option type='text' value='$col[0]'>$col[1]</option>";
}
    echo"</select>";
?>
   <p>
<button type="submit" class="registerbtn" name="inscrit">INSCRIRE</button>
</form>
    <?php
    if(isset($_POST["inscrit"])){
        $code=$_POST["code"];
        $nm=$_POST["nom"];
        $pn=$_POST["prenom"];
        $date=$_POST["date"];
        $num=$_POST["num"];
        $mail=$_POST["email"];
        $sta=$_POST["statut"];
        $co=$_POST['pro'];
        if($ajout = fopen("apprenants.txt","a")){
            fwrite($ajout, "\n".$co.",".$code.",".$nm.",".$pn.",".$date.",".$num.",".$mail.",".$sta."," );
        }
        fclose($ajout);
        
    }
        $tab=fopen("apprenants.txt","r");
        echo "<table class='table5'>";
         echo "<tr><th>code promo</th><th>code</th><th>nom</th><th>prenom</th><th>date de naissance</th><th>telephone</th><th>email</th><th>statut</th></tr> "; 
        while(!feof($tab)){
       $text=fgets($tab);
       $col=explode(",",$text);
       echo "<tr><td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]</td><td>$col[4]</td><td>$col[5]</td><td>$col[6]</td><td>$col[7]</td></tr>";
        }
        echo"</table>";
        fclose($tab); 
        
    ?>
    
</body>
</html>