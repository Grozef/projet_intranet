<?php

session_start();

session_destroy();
header("location:page_connecte.php");