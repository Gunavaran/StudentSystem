<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 7/4/2017
 * Time: 3:11 AM
 */
require 'core.php';
session_destroy();

echo 'hei';
header('Location: ../Templates/index.php');