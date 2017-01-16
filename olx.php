<?php

function parse_olx($res,$param1)
{
		
phpQuery::ajaxAllowHost('www.olx.ua');
foreach ($res as $key => $value) {  
    
        if($value['status']=='error' ) { echo PHP_EOL.$value['id'].' '.'ERROR'.PHP_EOL;
            continue;
         }
       if (isset($value[$param1]))  {
       // echo 	$value[$param1];
      //  echo PHP_EOL.$value['id'].' '.$value['status'].PHP_EOL;
       //die(); 
      

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