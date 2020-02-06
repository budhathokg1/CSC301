<?php

function jsonToArray (string $file_contents) {
	return json_decode(file_get_contents($file_contents), true);
		 
}