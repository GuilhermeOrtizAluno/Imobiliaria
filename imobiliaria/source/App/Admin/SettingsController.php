<?php

    namespace Source\App\Admin;

    use League\Plates\Engine;

    use CoffeeCode\DataLayer\Connect;

    require_once("Admin.php");

    class SettingsController extends Admin
    {

        public function __construct()
        {
            parent::__construct();
        }

        public function list() : void
        {
            echo $this->view->render("settings", [
                "title" => "Configuração - " . SITE,
            ]);
        }
    }