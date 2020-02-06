<?php

/*
$csv='John;Lennon';
writeCSV('beatles.csv',$csv);
$csv='Paul;McCartney';
writeCSV('beatles.csv',$csv);
*/

$data = 'hello;world';
echo '<pre>';
modifyCSV('beatles.csv', $data, 0);
//print_r(readCSV('beatles.csv'));

function writeCSV($file, $data, $isChanged = false){
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
	$dataArray = explode(";", $data);
	$input=readCSV($file);
	$input[$index] = $dataArray;
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