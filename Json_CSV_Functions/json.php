<?php

/*
$beatles=readJSON('beatles.json');
$beatles[0]['last_name']='Lennon';
echo '<pre>';
print_r($beatles);
writeJSON('beatles.json',$beatles);
*/

$index=$_GET['index'];
//unset($_GET['index']);
echo '<pre>';
$allowed_fields=['name','last_name','age','dob','picture','address'];
print_r(filterInput($_GET,$allowed_fields));
echo '<hr>';
print_r($_GET);

//modifyJSON('beatles.json',$_GET,$index);

function filterInput($data,$allowed_fields){
	for($i=0;$i<count(array_keys($data));$i++)
		if(!in_array(array_keys($data)[$i],$allowed_fields)) unset($data[array_keys($data)[$i]]);
	return $data;
}

function writeJSON($file,$data){
	$h=fopen($file,'w+');
	fwrite($h,is_array($data) ? json_encode($data) : $data);
	fclose($h);
}

function readJSON($file,$index=null){
	$h=fopen($file,'r');
	$output='';
	while(!feof($h)) $output.=fgets($h);
	fclose($h);
	$output=json_decode($output,true);
	return !isset($index) ? $output : (isset($output[$index]) ? $output[$index] : null);
}

function modifyJSON($file,$data,$index){
	$input=readJSON($file);
	$input[$index]=array_merge($input[$index],$data);
	writeJSON($file,$input);
}

function deleteJSON($file,$index){
	$input=readJSON($file);
	unset($input[$index]);
	writeJSON($file,$input);
}