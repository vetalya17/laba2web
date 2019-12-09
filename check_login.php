<?php
  $mail = strtolower(htmlspecialchars($_POST["mail"])); 
  $mysqli = new mysqli('localhost', 'root', '', 'lb1'); 
  $query = "SELECT `id` FROM `users` WHERE `email`='".$mysqli->real_escape_string($mail)."'"; 
  $result_set = $mysqli->query($query); 
  echo $result_set->num_rows != 0; 
?>