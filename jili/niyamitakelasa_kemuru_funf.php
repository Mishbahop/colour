<?php 
	include("serive/samparka.php");
	include("nayakaphalitansa_mulaka_unohs_kemuru_funf.php");
	
	$prathama = date('Ymd')."11".sprintf("%04d",1);
	$sesa = $lastperiodid=date('Ymd')."11".sprintf("%04d",288);
	
	$ajitarika = date('Ymd');
	$ghanta = date('H');
	$nimisa = $ghanta*60;
	$bartamannimisa = date('i');
	$bartamankalasankhya = ceil(($nimisa+$bartamannimisa) / 5);
	
	$bartamankalakrama = $ajitarika ."11". sprintf("%04d", $bartamankalasankhya);
	$bartamankalakrama = $bartamankalakrama + 1;
	
	$tarika = date('Y-m-d H:i:s');
	
	$dekhakalakrama = mysqli_query($conn,"select atadaaidi from `gelluonduhogu_kemuru_funf` order by kramasankhye desc limit 1");
	$kaladhadi = mysqli_num_rows($dekhakalakrama);
	$kalakramadhadi=mysqli_fetch_array($dekhakalakrama);
	
	if($kaladhadi == null){
		$tathya = mysqli_query($conn,"INSERT INTO `gelluonduhogu_kemuru_funf` (`atadaaidi`,`dinankavannuracisi`) VALUES ('".$bartamankalakrama."','".$tarika."')");
	}
	else if($prathama > $kalakramadhadi['atadaaidi']){
		$katiba=mysqli_query($conn,"TRUNCATE TABLE `gelluonduhogu_kemuru_funf`");
		//$truncateQuery=mysqli_query($con,"TRUNCATE TABLE `abracadabra`");
		$tathya = mysqli_query($conn,"INSERT INTO `gelluonduhogu_kemuru_funf` (`atadaaidi`,`dinankavannuracisi`) VALUES ('".$prathama."','".$tarika."')");
	}
	else{
		$parabartikrama = $kalakramadhadi['atadaaidi'] + 1;
		$tathya = mysqli_query($conn,"INSERT INTO `gelluonduhogu_kemuru_funf` (`atadaaidi`,`dinankavannuracisi`) VALUES ('".$parabartikrama."','".$tarika."')");
	}
	
	$safa_shonu = mysqli_query($conn,"UPDATE hastacalita_phalitansa_kemeru_funf SET sthiti='0'");
?>