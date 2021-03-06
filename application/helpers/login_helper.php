<?php
 defined('BASEPATH') OR exit('no direct access');

function isLogin(){
  if(empty($_SESSION['email']))
    redirect(base_url('auth/login'));
}

function isNotLogin(){
    if(!empty($_SESSION['email']))
      redirect(base_url('home'));
  }

function uuid()
{
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}

?>