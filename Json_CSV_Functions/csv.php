<?php

/*
$csv='John;Lennon';
writeCSV('beatles.csv',$csv);
$csv='Paul;McCartney';
writeCSV('beatles.csv',$csv);
*/
echo '<pre>';
print_r(readCSV('beatles.csv'));

function writeCSV($file,$data){
	$h=fopen($file,file_exists($file) ? 'a' : 'w+');
	fwrite($h,$data. "\n" /* PHP_EOL */);
	fclose($h);
}

function readCSV($file){
	$h=fopen($file,'r');
	$output='';
	while(!feof($h)) $output.=fgets($h);
	fclose($h);
	$output=explode("\n",$output);
	unset($output[count($output)-1]);
	for($i=0;$i<count($output);$i++) $output[$i]=explode(';',$output[$i]);
	return $output;	
}