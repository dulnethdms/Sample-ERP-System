<?php
declare(strict_types=1);
function e(mixed $value):string{return htmlspecialchars((string)$value,ENT_QUOTES,'UTF-8');}
function old(string $key,mixed $default=''):mixed{return $_SESSION['_old'][$key]??$default;}
function flash(string $key,?string $value=null):?string{if($value!==null){$_SESSION['_flash'][$key]=$value;return null;} $v=$_SESSION['_flash'][$key]??null;unset($_SESSION['_flash'][$key]);return $v;}
