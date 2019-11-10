<?php
require 'vendor/autoload.php';

class App extends atk4\ui\App
{
    function __construct($is_admin = false) {

    parent::__construct('Lucas\'s Party App');
    
    //depending on the use, select appropiate layout for our pages
    
    if ($is_admin){
        $this->initLayout('Admin');
        $this->layout->menuLeft->addItem(['Dashboard','icon'=>'birthday cake'],['dashboard']);
        $this->layout->menuLeft->addItem(['Guest Admin','icon'=>'users'],['admin']);
    } else {
        $this->initLayout('Centered');
    }
    //$this->dbConnect('mysql://root:Lims!234@localhost/atk4');
    $this->dbConnect(isset($_ENV['CLEARDB_DATABASE_URL'])? $_ENV['CLEARDB_DATABASE_URL']:'mysql://root:Lims!234@localhost/atk4');
}
}

class Guest extends \atk4\data\Model
{
    public $table = 'guest';
    function init() {
        parent::init();
        $this->addFields([
            ['name', 'required'=>true],
            'surname',
            ['phone','required'=>true],
            'email'
            ]);
        $this->addField('age',['required'=>true]);
        $this->addField('gender',['enum'=>['boy','girl']]);
        $this->addField('units_of_drink');
    }
}

class Dashboard extends \atk4\ui\View
{
    public $defaultTemplate = __DIR__.'/dashboard.html';
    function setModel($m) {
        $model = parent::setModel($m);
        $this->template['guests'] = $model->action('count')->getOne();
        $this->template['drinks'] = $model->action('fx',['sum','units_of_drink'])->getOne();
        return $model;
    }
}
