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

require 'sabitler/header.php';
?>

<!-- //banner -->
<!-- banner-bottom -->
	<div class="banner-bottom">
		<h4 class="latest-text w3_latest_text">Popüler Diziler</h4>
		<div class="container">
			<div class="w3_agile_banner_bottom_grid">
				<div id="owl-demo" class="owl-carousel owl-theme">
					<?php
					$populerdiziler= $dizi->populer();
					for ($i=0; $i <count($populerdiziler); $i++) {
						?>
						<div class="item">
							<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
								<a href="dizi.php?url=<?php echo $populerdiziler[$i]["urlname"]; ?>" class="hvr-shutter-out-horizontal"><img src="resim.php?url=<?php echo base64_encode($populerdiziler[$i]["resim"]); ?>" title="<?php echo $populerdiziler[$i]["isim"]; ?>" class="img-responsive" alt=" " />
									<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
								</a>
								<div class="mid-1 agileits_w3layouts_mid_1_home">
									<div class="w3l-movie-text">
										<h6><a href="dizi.php?url=<?php echo $populerdiziler[$i]["urlname"]; ?>"><?php echo $populerdiziler[$i]["isim"]; ?></a></h6>
									</div>
									<div class="mid-2 agile_mid_2_home">
										<p><?php echo $populerdiziler[$i]["tur"]; ?></p>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="ribben">
									<p><?php echo $populerdiziler[$i]["puan"]; ?></p>
								</div>
							</div>
						</div>
						<?php
					}
					?>

				</div>
			</div>
		</div>
	</div>

<!-- //banner-bottom -->
<div class="general_social_icons">
	<nav class="social">
		<ul>
			<li class="w3_dribbble"><a href="#">Ep.Eren <i class="fa fa-instagram"></i></a></li>
		</ul>
  </nav>
</div>

<!-- general -->
	<div class="general">
		<h4 class="latest-text w3_latest_text">Yeni Eklenen Dizi Bölümleri</h4>
		<div class="container">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
						<div class="w3_agile_featured_movies">
							<?php
							$sayfa=1;
							$yenieklenenler= $dizi->yeni(35,$sayfa);

							for ($i=0; $i <count($yenieklenenler[0]); $i++) {
								$bolum= $yenieklenenler[0][$i];

							?>
							<div class="col-md-2 w3l-movie-gride-agile">
							<a href="izle.php?url=<?php echo $bolum["url"]; ?>" class="hvr-shutter-out-horizontal"><img src="resim.php?url=<?php echo base64_encode($bolum["resim"]); ?>" title="<?php echo $populerdiziler[$i]["isim"]; ?>" class="img-responsive" alt=" " />
									<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
								</a>
								<div class="mid-1 agileits_w3layouts_mid_1_home">
									<div class="w3l-movie-text">
										<h6><a href="izle.php?url=<?php echo $bolum["url"]; ?>"><?php echo $bolum["isim"]; ?></a></h6>
									</div>
									<div class="mid-2 agile_mid_2_home">
										<p><?php echo $bolum["bolum"]; ?></p>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="ribben" style="width: 80px;">
									<p><?php echo $bolum["tarih"]; ?></p>
								</div>
							</div>
							<?php
						}
						?>

						<div class="clearfix"> </div>
						<nav aria-label="Page navigation ">
						  <ul class="pagination justify-content-end">
						    <?php
								for ($i=1; $i <= $yenieklenenler[1]["max"] ; $i++) {
									if($sayfa==$i){
									?>
										<li class="page-item active"><a class="page-link" href="#"><?php echo $i; ?></a></li>
									<?php
									}else{
										?>
										<li class="page-item"><a class="page-link" href="<?php echo "yenieklenen.php?sayfa=$i"; ?>"><?php echo $i; ?></a></li>
										<?php
									}
								}
								?>
						  </ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>

	<?php
	require 'sabitler/footer.php'; ?>
