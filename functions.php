<?php
/**
 * Created by PhpStorm.
 * User: nagomi
 * Date: 2018/09/05
 * Time: 14:57
 */

if(!function_exists("safe")){
	function safe($array, $key, $return=''){
		return isset($array[$key]) ? $array[$key] : $return;
	}
}
