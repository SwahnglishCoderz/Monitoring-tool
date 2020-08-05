<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//connect to db
$host = 'localhost';
$username = 'root';
$password='';
$dbconfig = mysqli_connect($host, $username, $password);
mysqli_select_db($dbconfig,"ci_db") or die("cannot select DB");

