<?php

 $shipcity = $_POST['scity'];


 $gtotal = isset($_POST['totl']) ?  $_POST['totl'] : 0;

 $billcountry = isset($_POST['bcountry']) ?  $_POST['bcountry'] : 0;
 $shipcountry = isset($_POST['scountry']) ?  $_POST['scountry'] : 0;

// $productweight = isset($_POST['weight']) ?  $_POST['weight'] : 0;

if(empty($_POST['weight']))
{
    $productweight = 100;
}
else
{
    $productweight = $_POST['weight'];
}

// Material

$material = strtolower($_POST['material']);

if(!empty($_POST['material']))
{
    if(($material=="silver" || $material=="gold") && $shipcountry !="India")
    {
        $custom_charge = 1500;
    }
    else
    {
        $custom_charge = 0;
    }
}



// $billcountry.$shipcountry.$shipcity.$productweight;

include 'posch.php';

 $shipping_charge = postal($billcountry,$shipcountry,$shipcity,$productweight);
 
 
$shipping_charge = $shipping_charge; 
 
 $total =$gtotal+$shipping_charge+$custom_charge;
 
 
  $total = round($total,2);
  


$shipping_charge = round($shipping_charge,2);
  
  
$ship = array("shipping_charge"=>$shipping_charge, "gtotal"=>$total, "customcharge"=>$custom_charge);

$ship = json_encode($ship);

print_r($ship);


?>
