#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Wed Jan 11 21:25:54 2023

@author: elena
"""

<!doctype html>

<html lang="ru">
<head...>
<h1>PHP MySQL</h1>

<?php

function PrintResults($result){
 if ($result->num_rows > 0){
    //print_r($result->fetch_all()); //выводит все fetch_assoc() выводит одну запись и равно falseб если строк больше нет
    while($row = $result->fetch_assoc()){
    echo "ID ".$row['id'].", ";
    echo "Name ".$row['name'].", ";
    echo "Bio ".$row['bio'].'<br>';
    }
 }
 echo "<hr>";
 }

      $db_host = 'localhost';
      $db_user = 'root';
      $db_password = 'root';
      $db_db = 'first_mysql';
 
  $mysqli = @new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
  );
	
  $mysqli->query("SET NAMES 'utf8'");
  	
  if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  } 


   echo 'Success: Удалось подключиться к базе данных5'; //echo это просто вывод с HTML разметкой
   echo '<br>';
   echo 'Host information: '.$mysqli->host_info;
   echo '<br>';
   echo 'Protocol version:'.$mysqli->protocol_version;
   echo '<br>';

  
//$mysqli->query("DROP TABLE `example`");
//$mysqli->query("ALTER TABLE `users` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT"); 

//  for ($i = 1; $i <= 5; $i++){
//  $name = "Bob #".$i;
//  $mysqli->query("INSERT INTO `users` (`name`, `bio`) VALUES ('$name', 'Full text')"); 
//  }

//$mysqli->query("UPDATE `users` SET `bio` = 'New text' WHERE `id`<=3"); //или просто WHERE `users`.`id`<=2
 
//$mysqli->query("DELETE FROM `users` WHERE `id`=5 OR `name` = 'Jho45n'"); 

 $result = $mysqli->query("SELECT * FROM `users`"); //* - выбираем все данные в таблице
 //echo "<br>Nums ".$result->num_rows; //result - это объект с методами
 //print_r($result);
  PrintResults($result);
 
 
 $result = $mysqli->query("SELECT * FROM `users` WHERE `id` > 4 ORDER BY `id` DESC"); //сортировка в порядке убывания
  PrintResults($result);
  
  $result = $mysqli->query("SELECT * FROM `users` LIMIT 2, 3"); //gпропускаем первые две записи и выводим 3
  PrintResults($result);
  $mysqli->close();ы
?>


</body>
</html>