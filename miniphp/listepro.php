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
<br>
<br>
<br>
<?php
  $tab=fopen("promo.txt","r");
  echo "<table class='table5'>";
  echo "<tr>
  <th>code</>
  <th>nom</th>
  <th>mois</th>
  <th>annee</th>
  <th>effectif</th>
  </tr> ";
  while(!feof($tab)){
    $text=fgets($tab);
    $col=explode(",",$text);
    $app=fopen("apprenants.txt","r");
    $j=0;
    $C=file("apprenants.txt");
    while(!feof($app)){
      for($i=0;$i<count($C);$i++){
        $code[$i]=strtok($C[$i],",");
        if($code[$i]==$col[0]){
          $j++;
        }
      }break;
      
    }
   echo "<tr><td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]</td><td>$j</td></tr>";
    //echo $j;
    fclose($app);
  }
  echo"</table>";
     fclose($tab); 


    
?>


    
</body>
</html>