<?php

class Controller
{
    public $view = 'admin';
    public $title;
    public $menu = [];

    function __construct()
    {
        $this->title = 'Online store';
    }

    public function setMenu() {
        if($_SESSION['login']) {
            $this->menu = [
                ['name' => 'Main', 'url' => '/'],
                ['name' => 'Catalog', 'url' => '/goods'],
                ['name' => 'Cart' , 'url' => '/cart'],
                ['name' => 'Sign up' , 'url' => '/auth'],
                ['name' => 'Log in', 'url' => '/auth']
            ];
        }
        $this->menu = [
            ['name' => 'Main', 'url' => '/'],
            ['name' => 'Catalog', 'url' => '/goods'],
            ['name' => 'Cart' , 'url' => '/cart'],
            ['name' => 'Sign up' , 'url' => '/auth'],
            ['name' => 'Log in', 'url' => '/auth']
        ];

    }

    public function index($data) {
        return [];
    }
}