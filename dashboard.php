<?php
require 'init.php';
$app = new App(true);
$app->add(new Dashboard())->setModel(new Guest($app->db));

//$app->add('CRUD')->setModel(new Guest($app->db));