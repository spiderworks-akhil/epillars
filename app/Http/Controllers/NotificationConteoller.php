<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spiderworks\MiniWeb\Models\Page;

class NotificationConteoller extends Controller
{

    public function contact(){
        $page = Page::where('slug','contact')->first();
        if(!$page){$page = null;}
        return view('client.pages.contact',compact('page'));
    }

    public function demo(){
        $page = Page::where('slug','request-demo')->first();
        if(!$page){$page = null;}
        return view('client.pages.request-demo',compact('page'));
    }

    public function brochure_save(Request $request){


/* Email Detials */
  $brchr = $request->brchr;
  $name =  $request->name;
  $mail_to =  $request->email;
  $phone = $request->phone;
  $from_mail = "info@works.spiderworks.co.in";
  $from_name = "ePillars Website";
//  $reply_to = "info@epillars.com";
  $reply_to = "info@works.spiderworks.co.in";



/* Attachment File */
  // Attachment location

    $path = public_path('old/resources')."/";

         switch ($brchr) {
    case "orgplus":
        $file_name = "orgplus-brochure.pdf";
	$file_desc = "OrgPlus Enterprise Brochure";
        break;
    case "profile":
	$file_name = "ePillars-company-brochure.pdf";
	$file_desc = "ePillars Company Profile";
        break;
  case "sabawhite":
        $file_name = "whitepaper-saba.pdf";
	$file_desc = "Saba Talent Management White Paper";
	break;
  case "saba":
        $file_name = "talent-managment.pdf";
	$file_desc = "Saba Talent Management Brochure";
        break;

  case "orgman":
        $file_name = "OrgManager-Brochure.pdf";
	$file_desc = "org.manager Brochure";
	break;
  case "odoo":
        $file_name = "odoo-openerp-brochure.pdf";
	$file_desc = "Odoo Brochure";
	break;
  case "aver":
        $file_name = "aver-video-conferencing.pdf";
	$file_desc = "Aver Video Conferencing Brochure";
	break;
  case "averfeature":
        $file_name = "aver-video-conferencing-dubai.pdf";
	$file_desc = "Aver Video Conferencing Features Brochure";
	break;
  case "smart":
        $file_name = "smart-home.pdf";
	$file_desc = "Smart Home Features Brochure";
	break;
  case "home":
        $file_name = "Control4-profile.pdf";
	$file_desc = "Home Automation Brochure";
	break;
  case "firewall":
        $file_name = "firewall-dubai.pdf";
	$file_desc = "Cyberoam Brochure";
	break;
  case "simplivity":
        $file_name = "simplivity-datasheet.pdf";
	$file_desc = "Simplivity datasheet";
	break;
  case "simpover":
        $file_name = "simplivity-overview.pdf";
	$file_desc = "Simplivity Overview";
	break;
  case "webex":
        $file_name = "ePillars-WebEx-Solution.pdf";
        $file_desc = "ePillars WebEx Solution";
        break;
  case "idraw":
        $file_name = "simplivity-overview.pdf";
        $file_desc = "iDrawings";
        break;

}


/* Mail Message */

    $infoheader = 'From: ' .$name.'<'.$reply_to.'>'."\r\n" . 'Reply-To: '.$name.'<'.$mail_to.'>'. "\r\n" . 'X-Mailer: PHP/' . phpversion();
    $subject = $file_desc;
    $message = "Dear ". $name .", \n\n"."Please find attached ".$file_desc.".\nFeel free to contact us if you have any quries"."\n\n"."ePillars Systems LLC \n +971 4 326 3939";
    $infomessage = " Dear Team, \n\n ".$file_desc." sent to following contact. \n\n Name: ". $name ."\n Phone: ".$phone."\n Email: ".$mail_to."\n File: https://www.epillars.com/".$path.$file_name;

/* Attachment File */
  // Attachment location

  // Read the file content
  $file = $path.$file_name;
  $file_size = filesize($file);
  $handle = fopen($file, "r");
  $content = fread($handle, $file_size);
  fclose($handle);
  $content = chunk_split(base64_encode($content));

/* Set the email header */
  // Generate a boundary
  $boundary = md5(uniqid(time()));

  // Email header
  $header = "From: ".$from_name." <".$from_mail.">".PHP_EOL;
  $header .= "Reply-To: ".$reply_to.PHP_EOL;
  $header .= "MIME-Version: 1.0".PHP_EOL;

  // Multipart wraps the Email Content and Attachment
  $header .= "Content-Type: multipart/mixed; boundary=\"".$boundary."\"".PHP_EOL;
  $header .= "This is a multi-part message in MIME format.".PHP_EOL;
  $header .= "--".$boundary.PHP_EOL;

  // Email content
  // Content-type can be text/plain or text/html
  $header .= "Content-type:text/plain; charset=iso-8859-1".PHP_EOL;
  $header .= "Content-Transfer-Encoding: 7bit".PHP_EOL.PHP_EOL;
  $header .= "$message".PHP_EOL;
  $header .= "--".$boundary.PHP_EOL;

  // Attachment
  // Edit content type for different file extensions
  $header .= "Content-Type: application/xml; name=\"".$file_name."\"".PHP_EOL;
  $header .= "Content-Transfer-Encoding: base64".PHP_EOL;
  $header .= "Content-Disposition: attachment; filename=\"".$file_name."\"".PHP_EOL.PHP_EOL;
  $header .= $content.PHP_EOL;
  $header .= "--".$boundary."--";

  // Send email
  if (mail($mail_to, $subject, "", $header)) {
	mail($reply_to, $subject, $infomessage, $infoheader);
    echo "Sent";
  } else {
    echo "Error";
  }




    }

    public function save(Request $request){
        $site = "ePillars.com";
        $subject= "Message from ".$request->name." through ePillars.com";
//        $toemail = 'info@epillars.com';
			$toemail = 'akhil@spiderworks.in';
        $name =$request->name;
        $msg = $request->message;
        $email = $request->email;
        $cmpny =  $request->cmpny4;
        $phone = $request->subject;
        $product = $request->product;
        if ($request->demo == 'on') {
            $subject = "Demo request from ".$name." through ePillars.com";
            $msg .= "<tr><td><strong>Looking for </strong> </td><td>" .  $request->product . " demo</td></tr>";
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
//            'loc' => $loc
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
    }


}
