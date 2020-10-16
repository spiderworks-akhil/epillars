<?php
include 'vendor/autoload.php';
use DOMWrap\Document;


$files1 = scandir(getcwd());

foreach($files1 as $obj){


    if (strpos($obj, '.html') !== false) {
        $a = file_get_contents($obj);

        $doc = new Document();
        $doc->html($a);

    }

}






$doc->find('header')->remove();
$doc->find('.footer1')->remove();
$doc->find('.copyright_info')->remove();
$doc->find('.fusection4')->remove();




echo $doc;
?>