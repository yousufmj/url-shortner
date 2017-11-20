<?php
include '../model/functions.php';

$base_url = $_SERVER['SERVER_NAME']. "/url";

if(isset($_POST['url'])){
	$url = $_POST['url'];

	// Blank url
	if (empty($url)){
		echo "no_url";
		
	// Ensure a valid url
	}else if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
    	echo "not_valid";

    // check url hasnt been stored
	}else if(url_exists($url)){
		$code = url_exists($url);
		$short = $base_url ."/" .$code;

		echo "<p>This Url has already been shortened</p>
			<p>
			<a href='http://$short'>$short</a>
			</p>";
	}else{
		
		while (!check_code($code = generate())){
			echo "$base_url/" .shorten($url, $code);
			break 1;
		};
	} 
}

