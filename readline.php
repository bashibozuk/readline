<?php
/**
 * We ususaly use readline() PHP function
 * to read input from console 
 * http://php.net/manual/en/function.readline.php
 * which is not always accessible
 */
if (!function_exists('readline')) {
	/**
	 * STDIN is a handle to php input stream
	 * sometimes it is not defined
	 * here we check if it is defined and if it is not
	 * we define it
	 */
	if (!defined('STDIN')) {
		define('STDIN', fopen('php://stdin', 'r'));
	}
	/**
	 * if our PHP instalation
	 * does not support the readline function
	 * we can define our own readline function
	 * @param string $prompt - The message that will tell the user what data he must input
	 * for example if you want to make the user eneter a number you have to write
	 * $number = readline('Enter a number');
	 */
	function readline($prompt = '') {
		echo $prompt;
		return stream_get_line(STDIN, 1024, PHP_EOL);
	}
}