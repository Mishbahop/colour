<?php
include("serive/samparka.php");


$samasye = "SELECT atadaaidi
	  FROM gelluonduhogu_trx
	  ORDER BY kramasankhye DESC LIMIT 1";
	$samasyephalitansa = $conn->query($samasye);
	$samasyesreni = mysqli_fetch_array($samasyephalitansa);
	
	if($samasyesreni['atadaaidi'] != null){
		$gadhipathuli = "SELECT ojana, ketebida
		  FROM bajikattuttate_trx
		  WHERE kalaparichaya = ".$samasyesreni['atadaaidi']."
		  ORDER BY parichaya DESC LIMIT 1";
		$gadhipathuliphala = $conn->query($gadhipathuli);
		$gadhipathulidhadi = mysqli_num_rows($gadhipathuliphala);

// Check if we fetched the `atadaaidi` value (kalaparichaya)
if ($samasyesreni && !empty($samasyesreni['atadaaidi'])) {
    $kalaparichaya = $samasyesreni['atadaaidi']; // Store the kalaparichaya value

    // Fetch the last block from the `gellaluhogiondu_trx` table
    $lastBlockQuery = "SELECT `bh` FROM `gellaluhogiondu_trx` ORDER BY `shonu` DESC LIMIT 1";
    $lastBlockResult = $conn->query($lastBlockQuery);
    $lastBlockRow = $lastBlockResult->fetch_assoc();
    $lastBlock = !empty($lastBlockRow['bh']) ? $lastBlockRow['bh'] : 0; // Default to 0 if no block is found

    // Increment the block to fetch the next data
    $fetchBlock = $lastBlock + 20;



$url = "https://api.trongrid.io/wallet/getnowblock";

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'TRON-PRO-API-KEY: 681ec57a-5e59-4192-9128-9bcd30ac1692' // Replace with your TronGrid API key
]);

// Execute the request and get the response
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo "Error: " . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Decode the response
$blockData = json_decode($response, true);


$blockNumber = $blockData['block_header']['raw_data']['number'];

$blockID = $blockData['blockID'];

$block=$blockNumber;
$issueNumber = $samasyesreni['atadaaidi'];



    // API URL with the next block number (fetching from the new endpoint)
    $apiUrl = "https://apilist.tronscanapi.com/api/block?number=" .$blockNumber;

    // Fetch the data from the API
    $apiData = @file_get_contents($apiUrl);

    // Check if the API request was successful
    if ($apiData !== FALSE) {
        // Decode the JSON response
        $apiResponse = json_decode($apiData, true);

        // Check if `data` is available in the API response
        if (!empty($apiResponse['data'])) {
           
            $hash = $blockID;   

            // Fetch the last numeric character from the hash
            $kadimesucyanka = null;
            for ($i = strlen($hash) - 1; $i >= 0; $i--) {
                if (is_numeric($hash[$i])) {
                    $kadimesucyanka = (int)$hash[$i];
                    break;
                }
            }

            // Default to 0 if no number is found in the hash
            if ($kadimesucyanka === null) {
                $kadimesucyanka = 0;
            }

            // Determine `banna` based on `kadimesucyanka`
            if ($kadimesucyanka == 0) {
                $banna = 'red,violet';
            } elseif ($kadimesucyanka == 5) {
                $banna = 'green,violet';
            } elseif (in_array($kadimesucyanka, [1, 3, 7, 9])) {
                $banna = 'green';
            } elseif (in_array($kadimesucyanka, [2, 4, 6, 8])) {
                $banna = 'red';
            } else {
                $banna = 'unknown';
            }

            // Current date and time
            $dinanka = date('Y-m-d H:i:s');
            $yadrcchikasanke[] = $kadimesucyanka;
			$yadrcchikasankhye = (int)implode('', $yadrcchikasanke);
            // Insert data into the `gellaluhogiondu_trx` table
            $tathya = mysqli_query(
                $conn,
                "INSERT INTO `gellaluhogiondu_trx` 
                (`kalaparichaya`, `bele`, `phalitansa`, `banna`, `bh`, `hash`, `phalitansadaprakara`, `dinankavannuracisi`) 
                VALUES 
                ('" . $issueNumber . "', 
                 '" . $kadimesucyanka . "', 
                 '" . $kadimesucyanka . "', 
                 '" . $banna . "', 
                 '" . $block . "', 
                 '" . $hash . "', 
                 'uncensored', 
                 '" . $dinanka . "')"
            );
          
          

            if($kadimesucyanka == 0){
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 1.5, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '10'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '10' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
  
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 4.5, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '12'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '12' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
  
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 9, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '0'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '0' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
  
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 2, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '14'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '14' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
}
if($kadimesucyanka == 1){
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 2, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '11'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '11' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
          
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 9, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '1'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '1' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
  
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 2, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '14'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '14' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
}
if($kadimesucyanka == 2){
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 2, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '10'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '10' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
          
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 9, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '2'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '2' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
  
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 2, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '14'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '14' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
}
if($kadimesucyanka == 3){
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 2, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '11'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '11' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
          
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 9, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '3'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '3' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
  
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 2, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '14'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '14' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
}
if($kadimesucyanka == 4){
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 2, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '10'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '10' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
          
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 9, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '4'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '4' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
  
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 2, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '14'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '14' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
}
if($kadimesucyanka == 5){
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 1.5, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '11'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '11' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
  
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 4.5, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '12'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '12' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
  
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 9, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '5'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '5' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
  
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 2, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '13'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '13' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
}
if($kadimesucyanka == 6){
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 2, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '10'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '10' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
          
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 9, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '6'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '6' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
  
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 2, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '13'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '13' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
}
if($kadimesucyanka == 7){
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 2, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '11'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '11' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
          
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 9, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '7'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '7' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
  
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 2, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '13'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '13' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
}
if($kadimesucyanka == 8){
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 2, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '10'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '10' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
          
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 9, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '8'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '8' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
  
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 2, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '13'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '13' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
}
if($kadimesucyanka == 9){
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 2, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '11'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '11' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
          
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 9, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '9'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '9' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
  
  $nabikarana = "UPDATE bajikattuttate_trx set phalaphala = 'gagner', sesabida = ROUND(sesabida * 2, 2), ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."' AND ojana = '13'";
  $conn->query($nabikarana);
  $nabikarana = "UPDATE shonu_kaichila
  INNER JOIN (
    SELECT byabaharkarta, SUM(sesabida) AS total_paid
    FROM bajikattuttate_trx
    WHERE kalaparichaya = '".$issueNumber."' 
    AND ojana = '13' 
    AND phalaphala ='gagner'
    GROUP BY byabaharkarta
  )  AS subquery ON shonu_kaichila.balakedara = subquery.byabaharkarta
  SET shonu_kaichila.motta = TRUNCATE(shonu_kaichila.motta + subquery.total_paid, 2)
  ";
  $conn->query($nabikarana);
}
$nabikarana_dui = "UPDATE bajikattuttate_trx set ergebnis = '".$kadimesucyanka."', zufallig = '".$yadrcchikasankhye."', tiarikala = '".$dinanka."' WHERE kalaparichaya = '".$issueNumber."'";
$conn->query($nabikarana_dui);

                echo "Data inserted successfully!";
            } else {
                echo "Error inserting data: " . $conn->error;
            }
        } else {
            echo "No valid data found in API response.";
        }
    } else {
        echo "Error fetching data from API.";
    }
} else {
    echo "Error: No valid `atadaaidi` value found from the `gelluonduhogu` table.";
}
?>
