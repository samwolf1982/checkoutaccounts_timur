<?php

//  start php go.php olx single.xlsx

ini_set('memory_limit', '250M');
header('Content-Type: text/html; charset=windows-1251');
header('Content-Type: text/html; charset=utf-8');
//                 caci@leeching.net   mail
//    db                us                 pass

require_once ('parse/phpQuery/phpQuery/phpQuery.php');
//require_once 'setings.php';
//require_once 'PhpDebuger/debug.php';



error_reporting(E_ALL);
set_time_limit(0);
date_default_timezone_set('Europe/London');

require 'vendor/autoload.php';

require_once 'readxmls.php';
require_once 'olx.php';

if (!isset($argv[1]) || !isset($argv[2]))die('add param');

$param1=$argv[1];

$filename=$argv[2];
$main_arr=[];
$res= read_xmls($filename);



if ($param1=='olx') {
 
    parse_olx($res,$param1);
 
 }
 
 die();
 // не доделано
 if ($param1=='domria') {
 
  //  parse_olx($res,$param1);
 
 

 phpQuery::ajaxAllowHost('dom.ria.com');
foreach ($res as $key => $value) {  
    
       
       if (isset($value[$param1]))  {
        echo 	$value[$param1];
         die();
         phpQuery::get($value[$param1], function ($do)use ($value)
                {

                	    $document = \phpQuery::newDocument($do);
                        // table main  сбор урлов и запись в сесию
                        $title = ''; $bread1 = '.overh >.lheight20';
                       
                        $bread1a = $document->find($bread1);
                        foreach ($bread1a as $key => $val1) {

                        /*   $b1[]=trim(pq($value)->find('a')->attr('href'));*/
                        $temp = pq($val1)->text(); 
                        
                        echo PHP_EOL.$value['id'].' '.'BAD'.PHP_EOL;
                        
                         break;
                        //$title = trim($temp); break;
                             //echo pq($value)->attr('href').PHP_EOL;
                        echo $temp;
                        }


                });
    



       
                                   }

	//break;
}
 }








