<?php
include 'db_connect.php';

//create 5 digit url code
function generate(){
	$char = 'abcdefghijklmnopqrstuvwxyz1234567890';

	return substr(str_shuffle($char), 0,5);
}

//ensure theat code exists
function check_code($code){
	$pdo = connect_db();

	$query = $pdo->prepare("SELECT code from shortened where code = ? Limit 1");
	$query->execute([$code]);

	return $query->fetch();
}

function url_exists($url){
	$pdo = connect_db();

	$query = $pdo->prepare("SELECT code from shortened where url = ? Limit 1");
	$query->execute([$url]);

	$code = $query->fetch();
	return $code['code'];
}

//add a code and url to db
function shorten($url, $code){
	$pdo = connect_db();

	$query = $pdo->prepare("INSERT into shortened VALUES('', ? , ?,'')");
	$query->execute([$url, $code]);

	return $code;
}

//redirect to full weblink
function redirect($code){
	$pdo = connect_db();

	if (check_code($code)) {
		$query = $pdo->prepare("SELECT url from shortened where code = ? ");
		$query->execute([$code]);
		$url = $query->fetch();
		$url = $url['url'];

		//updaate each click
		$query = $pdo->prepare("UPDATE `shortened` SET `clicks`= clicks +1 WHERE code =?");
		$query->execute([$code]);

		header("Location: $url");
	}
}
