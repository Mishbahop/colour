<?php 
include("serive/samparka.php");
include("trxupkid5.php");		
    
	
$currentDate = date('Ymd');
$timeInSeconds = time() % 86400; 
$sequenceNumber = intval($timeInSeconds / 300); 
$uniqueSequence = str_pad($sequenceNumber, 4, '0', STR_PAD_LEFT); 
$bartamankalakrama = $currentDate . "10303" . $uniqueSequence;
$bartamankalakrama = $bartamankalakrama + 1;

$prathama = $bartamankalakrama; 
$sesa = $currentDate . "10303" . sprintf("%04d", ceil(86400 / 300)); 


$tarika = date('Y-m-d H:i:s');
	
	$dekhakalakrama = mysqli_query($conn,"select atadaaidi from `gelluonduhogu_trx5u` order by kramasankhye desc limit 1");
	$kaladhadi = mysqli_num_rows($dekhakalakrama);
	$kalakramadhadi=mysqli_fetch_array($dekhakalakrama);
	
	if($kaladhadi == null){
		$tathya = mysqli_query($conn,"INSERT INTO `gelluonduhogu_trx5` (`atadaaidi`,`dinankavannuracisi`) VALUES ('".$bartamankalakrama."','".$tarika."')");
	}
	else if($prathama > $kalakramadhadi['atadaaidi']){
		$katiba=mysqli_query($conn,"TRUNCATE TABLE `gelluonduhogu`");
		//$truncateQuery=mysqli_query($con,"TRUNCATE TABLE `abracadabra`");
		$tathya = mysqli_query($conn,"INSERT INTO `gelluonduhogu_trx5` (`atadaaidi`,`dinankavannuracisi`) VALUES ('".$prathama."','".$tarika."')");
	}
	else{
		$parabartikrama = $kalakramadhadi['atadaaidi'] + 1;
		$tathya = mysqli_query($conn,"INSERT INTO `gelluonduhogu_trx5` (`atadaaidi`,`dinankavannuracisi`) VALUES ('".$parabartikrama."','".$tarika."')");
	}
	
	//$safa_shonu = mysqli_query($conn,"UPDATE hastacalita_phalitansa SET sthiti='0'");
?>