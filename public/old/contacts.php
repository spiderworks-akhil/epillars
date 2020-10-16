<?php
//Log input to a text file
	$ip = $_SERVER['REMOTE_ADDR'];
	$today = date("Y-m-d H:i");
	$qfile = '/var/www/contacts.csv';
	$qmsg = preg_replace("/\r|\n/", ". ",  $_POST['message']);
	if(file_exists($qfile))
	{
	$wfq= fopen($qfile, "a");
	fwrite($wfq, "\n".$today.", ".$qmsg.", "." ".$_POST['name'].", ".$_POST['email'].", ".$_POST['subject'].", ".$ip);
	fclose($wfq);
	}

//Validate input
        $secretKey = "6LcDKS8UAAAAAN6-j4McIDNWhgt-AIyCiDZ5RHUM";
        $responseKey = $_POST['g-recaptcha-response'];
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
//        $loc = $api_result['region_name'].", ".$api_result['country_name'];
	 $loc = $api_result['country_name'];


// PREPARE THE BODY OF THE MESSAGE
	if ($response->success) {
			$site = "ePillars.com";
			$subject= "Message from ".$_POST['name']." through ePillars.com";
			$toemail = 'info@epillars.com';
//			$toemail = 'shyju@epillars.com';
			$name = $_POST['name'];
			$msg = $_POST['message'];
			$email = $_POST['email'];
			$cmpny =  $_POST['cmpny4'];;
			$phone = $_POST['subject'];
			$product = $_POST['product'];
                        if ($_POST['demo'] == 'on') {
                                $subject = "Demo request from ".$name." through ePillars.com";
                                $msg .= "<tr><td><strong>Looking for </strong> </td><td>" .  $_POST['product']  . " demo</td></tr>";
                        }


			$url = "https://alert.epillars.me/sendalert.php";

			$fields = array(		'site' => $site,
							'subject' => $subject,
							'toemail' => $toemail,
							'name4' => $name,
							'comment4' => $msg,
							'email4' => $email,
							'cmpny4' => $cmpny,
							'product' => $product,
							'phone4' => $phone,
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
//	header('Location: https://www.epillars.com/thankyou/index.html');

		}
else {
header('Location: https://www.epillars.com/contact.html');
}

?>
