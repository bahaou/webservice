<?php
require_once('lib/nusoap.php');
$wsdl = "http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL";
$client = new nusoap_client($wsdl, 'wsdl');
$err = $client->getError();
if ($err) {
   echo '<h2>L\'erreur!</h2>' . $err;
   exit();
}
$r ='';
if ($_POST['getFlag'] !=''){
$result=$client->call('CountryFlag', array('sCountryISOCode'=>$_POST['getFlag']));
$r =  ($result['CountryFlagResult']);
}
    if( $r =='Country not found in the database' ){
        echo 'Country not found in the database!';
        echo 'Enter a country ISO code ';
    }elseif($r =='') {
        echo 'Enter a country ISO code ';
    }else{
    echo "<img src='".    ($result['CountryFlagResult']) ."' alt='error' >";
    }
?>
<form  method="post">
    <input type="text" id="getFlag" name="getFlag" value="" >
    <input type="submit" value="get Flag">
    
</form>