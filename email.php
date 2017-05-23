<?php


  $to = "infoleod@gmail.com";
  $subject = "My subject";
  $txt = "Hello world!";
  $headers = "From: info@zoomarket.com.ar" . "\r\n" . "CC: gironafrancisco86@gmail.com";

  mail($to,$subject,$txt,$headers);

?>
