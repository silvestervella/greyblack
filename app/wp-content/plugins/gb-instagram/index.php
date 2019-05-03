<?php
/*
Plugin Name: GreyBlack Theme - Instagram Plugin
Plugin URI: https://mygreyblack.com/
Description: Get data from instagram account
Author: ..
Version: 1.0
*/

include( 'config.php' );

function greyblack_get_insta(){

    $url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token='.IG_ACCESS_TOKEN.'&count=3';

    // Also Perhaps you should cache the results as the instagram API is slow
    $cache = './'.sha1($url).'.json';
    if(file_exists($cache) && filemtime($cache) > time() - 60*60){
        // If a cache file exists, and it is newer than 1 hour, use it
        $jsonData = json_decode(file_get_contents($cache));
    } else {
        $jsonData = json_decode((file_get_contents($url)));
        file_put_contents($cache,json_encode($jsonData));
    }

    $result = '<div id="insta-posts">'.PHP_EOL;
    foreach ($jsonData->data as $key=>$value) {
		$result .= "\t".
			'
			<a class="insta-post"  
            href="'.$value->images->standard_resolution->url.'">
			<img src="'.$value->images->low_resolution->url.'" alt="'.$value->caption->text.'"/>
			<div class="img-overlay"><span>View</span></div>
			</a>

			'.PHP_EOL;
    }
	$result .= '</div>'.PHP_EOL;
	$result .= '<div id="insta-link"><h3><a target="_blank" href="https://instagram.com/'.$value->user->username.'">Follow us on <span>INSTAGRAM</span></a></div>'.PHP_EOL;

    return $result;
}

add_shortcode( 'get_insta', 'greyblack_get_insta' );
