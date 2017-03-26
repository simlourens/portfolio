<?php

function connectDatabase($host, $database, $user, $pass){
	try{
	$dbh = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	// $dbh = new PDO('mysql:host=localhost;dbname=boogle', $user, $pass);

	return $dbh;

	

	} catch (PDOException $e){
		print('Error'. $e->getMessage().'<br>');
		die();
	}

}

function addProjectToDatabase($dbh, $title, $url, $content, $link){
	try{
	$sth = $dbh->prepare('INSERT INTO portfolio VALUES (NULL,:title, :url, :content, :link)');

	$sth->bindValue(':title', $title, PDO::PARAM_STR);
	$sth->bindValue(':url', $url, PDO::PARAM_STR);
	$sth->bindValue(':content', $content, PDO::PARAM_STR);
	$sth->bindValue(':link', $link, PDO::PARAM_STR);

	$success = $sth->execute();

	return $success;

	} catch (PDOException $e){
		print('Error'. $e->getMessage().'<br>');
		die();
	}
	
}

function getProjects($dbh) {

    $sth = $dbh->prepare("SELECT * FROM portfolio");
    $sth->execute();
    $result = $sth->fetchAll();
    // die(var_dump($result));
    return $result;


}