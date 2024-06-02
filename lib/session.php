<?php
error_reporting(0);
class session{
	public static function init(){
	session_start();
	}
	
	public static function set ($key,$val)
	{
		$_SESSION[$key] = $val;
	}
	
	public static function get ($key)
	{
		if(isset($_SESSION[$key]))
		{
		return $_SESSION[$key];
		}
		else
		{
		return false;
		}
	}
	
	public static function ckeckSession()
	{
	self::init();
	if(self::get("login") == false)
	{
		self:: destroy();
		header("Location: login.php");	
	 }
	}
	
	public static function ckeckLogin()
	{
	self::init();
	if(self::get("login") == true)
	{
		header("Location: index.php");	
	 }
	}

	

   public static function onlyDestroy()
	{
		session_destroy();			
		
	}
	
	public static function destroy()
	{
		session_destroy();	
		header("Location: ../index.php");
		
	}
}