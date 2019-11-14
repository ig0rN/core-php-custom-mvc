<?php

$router->get('', 'PageController@home');

$router->post('comment', 'CommentsController@store');

$router->get('admin/login', 'AuthController@showLogin');
$router->post('admin', 'AuthController@login');
$router->get('admin/logout', 'AuthController@logout');

$router->get('admin', 'AdminController@redirect');
$router->get('admin/home', 'AdminController@index');

$router->get('admin/comments', 'AdminController@showComments');
$router->post('admin/comment/approve', 'CommentsController@approve');
$router->post('admin/comment/delete', 'CommentsController@delete');