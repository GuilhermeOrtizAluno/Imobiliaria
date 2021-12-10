<?php

    namespace Source\App\Admin;

    use League\Plates\Engine;
    use Source\WebService;

    require_once("Admin.php");

    class CityController extends Admin
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function list() : void
        {
            $response = WebService::get("city");

            $citys = json_decode($response)->cities;

            echo $this->view->render("city/list", [
                "title" => "Cidade - " . SITE,
                "citys" => $citys
            ]);
        }

        public function delete($data) : void 
        {
            $response = WebService::delete("city", $data['id']);

            $response = WebService::get("city");

            $cities = json_decode($response)->cities;

            $error = array();

            echo $this->view->render("city/list", [
                "title" => "Tipo - " . SITE,
                "error" => $error,
                "citys"  => $cities
            ]);
        }

        public function post($data) : void
        {
            $request = array('description' => $data['descricao']);

            $response = WebService::post("city", $request);
            
            header('Location: ' . url("cidade"));
        }
    }