<?php

function jsonToArray (string $file_contents) {
	return json_decode(file_get_contents($file_contents), true);
		 
}

function writeJSON($file, $data) {
	$data = is_array($data) ? json_encode($data) : $data;
	$h = fopen($file, 'w+');
	fwrite($h, $data);
	fclose($h);
}

function readJSON($file, $index = null) {
	$h = fopen($file, 'r');
	$output = '';
	while(!feof($h)) $output.=fgets($h);
	fclose($h);
	$output = json_decode($output, true);
	return !isset($index) ? $output : (isset($output[$index]) ? $output[$index] : null);
}

function modifyJSON($file, $data, $index = null) {
	$input = readJSON($file);
	if($index != null){
		$input[$index] = array_merge($input[$index], $data);
	} else {
		$input[] = $data;
	}
	writeJSON($file, $input);
}

function deleteJSON ($file, $index) {
	$input = readJSON($file);
	unset($input[$index]);
	writeJSON($file, $input);
}

// function writeCSV($file, $data) {
// 	$h = fopen($file, file_exists($file) ? 'a' : 'w+');
// 	fwrite($h, $data.  "\n");
// 	fclose($h);
	
// }

// function readCSV ($file) {
// 	$h = fopen($file, 'r');
// 	$output = '';
// 	while(!feof($h)) $output.=fgets($h);
// 	fclose($h);
// 	$output = explode("\n", $output);
// 	unset($output[count($output) -1]);
// 	for($i = 0; $i < count($output); $i++) $output[$i] = explode(';', $output[i]);
// 	return output;
// }