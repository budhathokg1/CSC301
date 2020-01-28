<?php

function jsonToArray (String $file_contents) {
	return json_decode($file_contents, true);
		 
}