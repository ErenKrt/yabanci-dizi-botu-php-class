<?php
//    ________                          ___  ____         _
//   |_   __  |                        |_  ||_  _|       / |_
//   | |_ \_| _ .--.  .---.  _ .--.    | |_/ /    _ .--.`| |-'
//   |  _| _ [ `/'`\]/ /__\\[ `.-. |   |  __'.   [ `/'`\]| |
//  _| |__/ | | |    | \__., | | | |  _| |  \ \_  | |    | |,
// |________|[___]    '.__.'[___||__]|____||____|[___]   \__/
/**
 * Class Yabancı Dizi Bot PHP / Class
 * @author Eren Kurt (ErenKrt)
 * @mail kurteren07@gmail.com
 * @İnstagram ep.eren
 * @date 30.10.2018
 */
 
require '../class.php';
use eperen\yabancidizi;
$dizi = new yabancidizi();

if(isset($_GET["url"])){
  if($_GET["url"]!=""){
    require "sabitler/header.php";

    $dizisayfasi= $dizi->dizisayfa($_GET["url"]);

    ?>
    <!-- single -->
    <div class="single-page-agile-main">
    <div class="container">
    		<!-- /w3l-medile-movies-grids -->
    			<div class="agileits-single-top">
    				<ol class="breadcrumb">
    				  <li><a href="#">Dizi</a></li>
    				  <li class="active"><?php echo $dizisayfasi["adi"]; ?></li>
    				</ol>
    			</div>
    			<div class="single-page-agile-info">

         <div class="show-top-grids-w3lagile">
    				<div class="col-sm-12 single-left">
    					<div class="song">

    						<div class="col-sm-6 video-grid-single-page-agileits">
    							<div data-video="dLmKio67pVQ" id="video"> <img src="resim.php?url=<?php echo base64_encode($dizisayfasi["resim"]); ?>" alt="" class="img-responsive" /> </div>
    						</div>
                <div class="col-sm-6 pull-right">
                  <h1><?php echo $dizisayfasi["adi"]; ?></h1>
                  <br>
                  <h4><?php echo $dizisayfasi["aciklama"]; ?></h4>
                  <br>
                    <ul>
                      <li><h4>Yapım Yılı: <?php echo $dizisayfasi["detaylar"]["yapimyili"]; ?></h4></li>
                      <li><h4>Tür: <?php echo $dizisayfasi["detaylar"]["tur"]; ?></h4></li>
                      <li><h4>Süre: <?php echo $dizisayfasi["detaylar"]["sure"]; ?></h4></li>
                      <li><h4>Ülke: <?php echo $dizisayfasi["detaylar"]["yapimulke"]; ?></h4></li>
                      <li><h4><?php echo $dizisayfasi["detaylar"]["yonetmen"]; ?></h4></li>
                    <ul>
                      <br><br>
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <?php
                        for ($i=1; $i < count($dizisayfasi["sezonlar"]); $i++) {
                          ?>
                          <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#sezon<?php echo $i; ?>" role="tab" aria-controls="home" aria-selected="true"><?php echo $i; ?>.Sezon</a>
                          </li>
                          <?php
                        }
                        ?>

                      </ul>

                      <div class="tab-content" id="myTabContent">
                        <?php for ($i=1; $i < count($dizisayfasi["sezonlar"]); $i++){ ?>

                          <div class="tab-pane fade" role="tabpanel" id="sezon<?php echo $i; ?>" >
                            <?php
                            for ($a=0; $a <count($dizisayfasi["sezonlar"][$i]); $a++) {
                              ?>
                              <ul>
                                <li><a href="izle.php?url=<?php echo $dizisayfasi["sezonlar"][$i][$a]["url"]; ?>"><?php echo $dizisayfasi["sezonlar"][$i][$a]["bolum"]; ?> | <?php echo $dizisayfasi["sezonlar"][$i][$a]["adi"]; ?></a></li>
                              </ul>
                              <?php
                            }
                          ?>
                        </div>
                        <?php }
                        ?>

                      </div>
                </div>

    					</div>

    					<div class="clearfix"> </div>

    				</div>


    			</div>
    <?php
    require "sabitler/footer.php";
  }else{
    exit;
  }
}else{
  exit;
}
