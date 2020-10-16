<?php
//Log input to a text file
	$ip = $_SERVER['REMOTE_ADDR'];
	$today = date("Y-m-d H:i");
	$qfile = '/var/www/ads-msgs.csv';
	$qmsg = preg_replace("/\r|\n/", ". ",  $_POST['comment4']);
	if(file_exists($qfile))
	{
	$wfq= fopen($qfile, "a");
	fwrite($wfq, "\n".$today.", ".$qmsg.", "." ".$_POST['name4'].", ".$_POST['email4'].", ".$_POST['phone4'].", ".$ip);
	fclose($wfq);
	}

//Validate input
	$secretKey = "6LcnjPcUAAAAADdBC_8_EyyB0nSNT3Ucrms7mVdu";
	$responseKey = $_POST['recaptcha_response'];
	$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$ip";
	$response = file_get_contents($url);
	$response = json_decode($response);

//Get the location
	$access_key = '558432f1240f7f3e36bad381ade19f84';
	$ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$access_key.'');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$json = curl_exec($ch);
	curl_close($ch);
	$api_result = json_decode($json, true);
//	$loc = $api_result['region_name'].", ".$api_result['country_name'];
	$loc = $api_result['country_name'];

// PREPARE THE BODY OF THE MESSAGE
	if ($response->score >= 0.5) {
			$site = "ePillars.com";
			$subject= "Google Campaign: Digital Certificates";
			$toemail = 'shyju@epillars.com';
			$name = $_POST['name4'];
			$msg = $_POST['comment4'];
			$email = $_POST['email4'];
			$cmpny = $_POST['cmpny4'];
			$phone = $_POST['phone4'];

			$url = "https://alert.epillars.me/sendalert.php";

			$fields = array(		'site' => $site,
							'toemail' => $toemail,
							'name4' => $_POST['name4'],
							'comment4' => $_POST['comment4'],
							'email4' => $_POST['email4'],
							'cmpny4' => $_POST['cmpny4'],
							'phone4' => $_POST['phone4'],
							'loc' => $loc
			);

			$postvars='';
			$sep='';
			foreach($fields as $key=>$value)
			{
					$postvars.= $sep.urlencode($key).'='.urlencode($value);
					$sep='&';
			}

			$ch = curl_init();

			curl_setopt($ch,CURLOPT_URL,$url);
			curl_setopt($ch,CURLOPT_POST,count($fields));
			curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

			$result = curl_exec($ch);
			curl_close($ch);
//			echo $result;
	$qfile = '/var/www/ads-msgs.csv';
        if(file_exists($qfile))
        {
        $wfq = fopen($qfile, "a");
        fwrite($result);
        fclose($wfq);
        }
	header('Location: https://www.epillars.com/thankyou/index.html');

		}
else {
header('Location: https://www.epillars.com/docusign-dubai-abudhabi-sharjah/index.html');
}

?>
