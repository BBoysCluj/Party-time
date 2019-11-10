<?php

require 'vendor/autoload.php';
require 'init.php';

$app = new App();

$columns = $app->add('Columns');
$left = $columns->addColumn();
$right = $columns->addColumn();

$right->add(['Message','Welcome to Lucas\'s the party!','info'])->text
    ->addParagraph('Please make sure to bring lots of fun!');

    $left->add('Form')->setModel(new Guest($app->db));
// $left->add(['Button', 'icon'=>'dashboard'])
//     ->addClass('primary')
//     ->set('Admin')
//     ->link(['admin']);

