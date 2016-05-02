<?php

/**
 * ___NOM DU PROJET___
 * logout.php
 *
 * --------------------
 * @author: rosay @ 11 août 2015
 * Last Mod: ___ModInit___ @ ___ModDate___
 * --------------------
 *
 * @desc: ___DESCRIPTION___
 *
 **/
session_start();
session_destroy();
header('Location: index.php');
