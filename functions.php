<?php

error_reporting( E_ALL );
ini_set( 'display_errors', 'On' );
require_once "class-wc-api-client.php";

$consumer_key = 'ck_f27ab7e518bd52589cf2976c6916a26dd4598a05';
$consumer_secret = 'cs_e477b87cfeebd7d65ec4e8fdf1a6727b0aeb1e76';
$store_url = 'http://mounir.io/imageid2/';


$wc_api = new WC_API_Client( $consumer_key, $consumer_secret, $store_url );


function get_all_products(){
	global $wc_api;
	$all_products = json_encode($wc_api->get_products());
	echo $all_products;
}

function get_single_product($product_id){
	global $wc_api;
	$product = json_encode($wc_api->get_product($product_id));
	echo $product;
}

function get_product_reviews($product_id){
	global $wc_api;
	$product_review = json_encode($wc_api->get_product_reviews($product_id));
	echo $product_review;
}

if(isset($_GET['function'])) {
    if($_GET['function'] == 'get_all_products') {
        get_all_products();
    }

	if($_GET['function'] == 'get_single_product') {
				$product_id = $_GET['product_id'];
        get_single_product($product_id);
    }

	if($_GET['function'] == 'get_product_reviews') {
				$product_id = $_GET['product_id'];
        get_product_reviews($product_id);
    }
}

?>
