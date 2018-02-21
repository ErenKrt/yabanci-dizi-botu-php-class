
<?php
error_reporting(0);
require_once("../class.php");
$bot= new epbot();

$deneme= $bot->sonlar();
//print_r($dizi);
if(isset($_GET["t"])){
$t= $_GET["t"];
  if($t=="0"){
    ?>
    <!DOCTYPE html>
    <html lang="en" >

    <head>
      <meta charset="UTF-8">
      <title>Yabancı Dizi PHP Bot / Class</title>
      <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
      <link rel="stylesheet" href="css/style.css">

    </head>

    <body>
      <?php
      for($i=0; $i<count($deneme); $i++){
        echo "<a href='izle.php?isim=".$bot->seourl($deneme[$i][adi]." ".$deneme[$i][epadi])."' target='_blank'>".$deneme[$i][adi]."-".$deneme[$i][epadi]." | ".$deneme[$i][tarih]."<br><img src='../resim.php?url=".$deneme[$i][resim]."' height='200' width='200'></a><hr>";
      }
    ?>
    </body>
    </html>
    <?php
  }elseif($t=="1"){
    header("Content-Type: text/plain");
    print_r($deneme);
  }elseif($t=="2"){
    ?>
    <textarea style="width: 1062px;
    height: 166px; min-height:166px; max-height:166px; min-width: 1062px; max-width:1062px;border:0px;" ><?php echo "<?php"; ?>

    $deneme= $bot->sonlar();

    for($i=0; $i<count($deneme); $i++){
      echo "<a href='izle.php?isim=".$bot->seourl($deneme[$i][adi]." ".$deneme[$i][epadi])."' target='_blank'>".$deneme[$i][adi]."-".$deneme[$i][epadi]." | ".$deneme[$i][tarih]."<br><img src='../resim.php?url=".$deneme[$i][resim]."' height='200' width='200'></a><hr>";
    }
?></textarea>
    <?php
  }
}else{
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Yabancı Dizi PHP Bot / Class</title>
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <?php
  for($i=0; $i<count($deneme); $i++){
    echo "<a href='izle.php?isim=".$bot->seourl($deneme[$i][adi]." ".$deneme[$i][epadi])."' target='_blank'>".$deneme[$i][adi]."-".$deneme[$i][epadi]." | ".$deneme[$i][tarih]."<br><img src='../resim.php?url=".$deneme[$i][resim]."' height='200' width='200'></a><hr>";
  }
  ?>
</body>
</html>
<?php
}
?>
