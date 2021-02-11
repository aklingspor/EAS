<?php 
/* 
example usage 
marketStack ver 1.0 

You must get an API key from https://marketstack.com/product 
and enter it in the marketstack.class.php file 

For complete documentation on each endpoint and available paramaters 
see https://marketstack.com/documentation 
*/ 

$ticker = $_GET["ticker"];
//turning off low level notices 
error_reporting(E_ALL ^ E_NOTICE); 

//instantiate the class 
require('marketstack.class.php'); 
$market = new marketStack(); 

//get ticker information for Tesla
$market->setEndPoint('tickers',$ticker); 
$market->getResponse(); 

echo '<strong>'.$market->response->name.'</strong>'.' ('.$market->response->symbol.')'.'<br>'; 
echo $market->response->stock_exchange->acronym.'<br>'; 

//get latest market activity for Microsoft 
$market->setEndPoint('eod','latest'); 
$market->setParam('symbols',$ticker); 
$market->getResponse(); 

$data = $market->response->data[0]; 

echo '<hr>'; 
echo '<strong>Date: </strong>'.$data->date.'<br>'; 
echo '<strong>Open: </strong>$'.$data->open.'<br>'; 
echo '<strong>High: </strong>$'.$data->high.'<br>'; 
echo '<strong>Low: </strong>$'.$data->low.'<br>'; 
echo '<strong>Close: $'.$data->close.'</strong><br>'; 

?> 
