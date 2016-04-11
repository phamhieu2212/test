<?php
function __autoload($fileName){
	
	include_once($fileName.".php");
}
?>