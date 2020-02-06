<?php

/*
$csv='John;Lennon';
writeCSV('beatles.csv',$csv);
$csv='Paul;McCartney';
writeCSV('beatles.csv',$csv);
*/
echo '<pre>';
modifyCSV('beatles.csv', 'hello', 0);
//print_r(readCSV('beatles.csv'));

function writeCSV($file, $data, $isChanged){
	$h=fopen($file,!file_exists($file) || $isChanged == true ? 'w+' : 'a');
	fwrite($h,$data. "\n" /* PHP_EOL */);
	fclose($h);
}

function readCSV($file, $index=null){
	$h=fopen($file,'r');
	$output='';
	while(!feof($h)) $output.=fgets($h);
	fclose($h);
	$output=explode("\n",$output);
	unset($output[count($output)-1]);
	for($i=0;$i<count($output);$i++) $output[$i]=explode(';',$output[$i]);
	return !isset($index) ? $output : (isset($output[$index]) ? $output[$index] : null);
}

function modifyCSV($file, $data, $index){
	$input=readCSV($file);
	array_push($input[$index], $data);
	print_r($input);
	die();
	for($i=0;$i<count($input); $i++) $input[$i]=implode(";",$input[$i]);
	$input=implode("\n", $input);
	writeCSV($file,$input, true);
	
}
function deleteCSV($file, $index){
	$input=readCSV($file);
	unset($input[$index]);
	for($i=0;$i<count($input); $i++) $input[$i]=implode(";",$input[$i]);
	$input=implode("\n", $input);
	writeCSV($file, $input, true);
}