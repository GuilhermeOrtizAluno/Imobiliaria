<?php

    namespace Source\App\Admin;

    use League\Plates\Engine;
    use Source\Models\User;

    use CoffeeCode\DataLayer\Connect;

    require_once("Admin.php");

    class ProfileController extends Admin
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function list() : void
        {
            echo $this->view->render("profile", [
                "title" => "Perfil - " . SITE,
            ]);
        }
    }