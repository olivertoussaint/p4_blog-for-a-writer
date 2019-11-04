<?php

namespace Blog\JeanForteroche\Model;

class DatabaseManager
{
	protected function dbConnect()
	{
		$db = new \PDO('mysql:host=localhost;dbname=blog_jean_forteroche;charset=utf8', 'root', ''); 
		return $db;
	}
}