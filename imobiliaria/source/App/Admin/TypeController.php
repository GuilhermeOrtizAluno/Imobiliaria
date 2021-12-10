<?php

    namespace Source\App\Admin;

    use League\Plates\Engine;
    use Source\WebService;

    use CoffeeCode\DataLayer\Connect;

    require_once("Admin.php");

    class TypeController extends Admin
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function list() : void
        {
            $response = WebService::get("type");

            $types = json_decode($response)->types;

            echo $this->view->render("type/list", [
                "title" => "Tipo - " . SITE,
                "types"  => $types
            ]);
        }

        public function delete($data) : void 
        {
            $response = WebService::delete("type", $data['id']);

            $response = WebService::get("type");

            $types = json_decode($response)->types;

            $error = array();

            echo $this->view->render("type/list", [
                "title" => "Tipo - " . SITE,
                "error" => $error,
                "types"  => $types
            ]);
        }

        public function post($data) : void
        {
            $request = array('description' => $data['descricao']);

            $response = WebService::post("type", $request);
            
            header('Location: ' . url("tipo"));
        }
    }