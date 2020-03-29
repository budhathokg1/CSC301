<?php
class File{
	
	public static function jsonToArray (string $file_contents) {
		return json_decode(file_get_contents($file_contents), true);
		 
	}

	public static function writeJSON($file, $data) {
		$data = is_array($data) ? json_encode($data) : $data;
		$h = fopen($file, 'w+');
		fwrite($h, $data);
		fclose($h);
	}

	public static function readJSON($file, $index = null) {
		$h = fopen($file, 'r');
		$output = '';
		while(!feof($h)) $output.=fgets($h);
		fclose($h);
		$output = json_decode($output, true);
		return !isset($index) ? $output : (isset($output[$index]) ? $output[$index] : null);
	}

	public static function modifyJSON($file, $data, $index = null) {
		$input = readJSON($file);
		if($index != null){
			$input[$index] = array_merge($input[$index], $data);
		} else {
			$input[] = $data;
		}
		writeJSON($file, $input);
	}

	public static function deleteJSON ($file, $index) {
		$input = readJSON($file);
		unset($input[$index]);
		writeJSON($file, $input);
	}

	// public static function writeCSV($file, $data) {
	// 	$h = fopen($file, file_exists($file) ? 'a' : 'w+');
	// 	fwrite($h, $data.  "\n");
	// 	fclose($h);
	
	// }

	// public static function readCSV ($file) {
	// 	$h = fopen($file, 'r');
	// 	$output = '';
	// 	while(!feof($h)) $output.=fgets($h);
	// 	fclose($h);
	// 	$output = explode("\n", $output);
	// 	unset($output[count($output) -1]);
	// 	for($i = 0; $i < count($output); $i++) $output[$i] = explode(';', $output[i]);
	// 	return output;
	// }
}