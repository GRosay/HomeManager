<?php
/**
 * Created by PhpStorm.
 * User: rosay
 * Date: 08.12.15
 * Time: 15:40
 */
session_start();
if(!isset($_SESSION['nav'])){
    $_SESSION['nav'] = 'close';
}
else{
    $_SESSION['nav'] = ($_SESSION['nav'] == 'close' ? 'open' : 'close');
}
