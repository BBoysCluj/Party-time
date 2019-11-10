<?php

require 'init.php';
$app = new App(true);
$app->add('CRUD')->setModel(new Guest($app->db));


/****************************************************************
 * You can now remove the text below and write your own Web App *
 *                                                              *
 * Thank you for trying out Agile Toolkit                       *
 ****************************************************************/


// $app->add('Text')
//     ->addParagraph('You have successfully installed Agile Toolkit '.$app->version)
//     ->addParagraph('Open index.php file in your text editor and follow documentation.');

// $app->add(['Button', 'icon'=>'dashboard'])
//     ->addClass('primary')
//     ->set('Admin')
//     ->link(['admin']);
