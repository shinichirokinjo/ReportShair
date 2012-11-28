<?php
(isset($_SERVER['CAKE_ENV']) || isset($_ENV['CAKE_ENV'])) or die('stages is not found.');
if(isset($_SERVER['CAKE_ENV'])) $env = $_SERVER['CAKE_ENV'];
if(isset($_ENV['CAKE_ENV'])) $env = $_ENV['CAKE_ENV'];
return require_once( dirname(__FILE__) . DS . "Stages" . DS . $env . DS . "email.php");
