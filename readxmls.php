<?php

//return example
  // [ array(3) {
  //   ["id"]=>
  //   string(2) "30"
  //   ["domria"]=>
  //   string(98) "https://dom.ria.com/ru/realty-prodaja-kvartira-odessa-kievskiy-lyustdorfskaya-doroga-12618333.html"
  //   ["status"]=>
  //   string(2) "ok"
  // },] 
 function read_xmls($filename)
{
	$parser = new VSXLSX\Parser($filename);
$res=[];

$result=[];
if ($parser->parse()) {
    // Returns an array
    $parsed = $parser->get_parsed();
    
         foreach ($parsed as $key => $value) {
         	$ind=0;
         	$keys=array_values($value);

          // print_r($keys);
           $url_olx= parse_url($keys[15]);
           $url_domria= parse_url($keys[19]);
           
           if (isset($url_olx['host']) || isset($url_domria['host'])) {
                         
                  $arr['id']=$keys[0];
                  if (isset($url_olx['host'])) {
                  	$arr['olx']=$keys[15];
                  }

                 if (isset($url_domria['host'])) {
                  	$arr['domria']=$keys[19];
                  }
                  $arr['status']='ok';
                         
           //print_r($isurl);
            $res[]=$arr;
            unset($arr);
           }else{
           	 if (isset($keys[0]) & is_numeric($keys[0])) {
           	 	# code...
           	 
           	$res[]=['id'=>$keys[0],'status'=>'error'];
           }}

           unset($keys);
         }

       // var_dump($res);
  //print_r($parsed);
        /* Do something with the parsed array */
} else {
    foreach($parser->get_errors() as $error) {
        echo "Error: $error\n";
    }
}

return $res;
}