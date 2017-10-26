<?php

use Lib\Config;

Config::set('site_name','Jornal Info');

Config::set('Languages', ['pt_br','en']);

Config::set('route',[
    'default' => '',
    'admin' =>'admin_' 
]);

config::set('default_route','default');
config::set('default_languages','pt_br');
config::set('default_controller','pagina');
config::set('default_action','index');