<?php

function connectDatabase($host,$database,$user,$pass){
	
	//next we will connect the database
	//a try catch is like a if statement it says we will try and run something if it fails we will run this piece of (catch data)
	try{
		$dbh = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		
		return $dbh;

	}catch (PDOException $e){
		print('Error! ' .$e->getMessage(). '<br>');
		die();
	}
}

//this function add the contents of the feedback form to the database 
function addProjectToDatabase($dbh, $title, $url, $content, $link(target, link)){

//prepare the statement that will be executed (else/if is a statement)
$sth = $dbh->prepare('INSERT INTO portfolio (title, url, content, link, created_at)
	VALUES(:title, :url, :content, link, NOW())');

//bind the $name to the SQL statement 
$sth->bindValue(':title', $title, PDO::PARAM_STR);

//bind the $email to the SQL statement 
$sth->bindValue(':url', $url, PDO::PARAM_STR);

//bind the $feedback to the SQL statement 
$sth->bindValue(':content', $content, PDO::PARAM_STR);

$sth->bindValue(':link', $link, PDO::PARAM_STR);

//execute the statement 
$success = $sth->execute();

return $success;
}
