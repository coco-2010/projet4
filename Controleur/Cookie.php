<?php
Class Cookie{
	
	public function Set($name, $set, $expire){
		setcookie($name, $set, $expire, '/', null, true, true);
	}

	public function Remove($name){
		setcookie($name, 'delete', time()-3600, '/', null, true, true);
	}

	public function Get($name){
		return isset($_COOKIE[$name]) ? $_COOKIE[$name] : false;
	}

}
$Cookie = new Cookie();