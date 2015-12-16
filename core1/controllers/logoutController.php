<?php
/**
 * Created by PhpStorm.
 * User: loro102
 * Date: 28/11/2015
 * Time: 1:30
 */
unset($_SESSION['id'],$_SESSION['user'],$_SESSION['email'],$_SESSION['online']);
session_destroy();
header ('location:?view=index');