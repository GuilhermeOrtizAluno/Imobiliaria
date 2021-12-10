<?php

    namespace Source\App\Admin;

    use League\Plates\Engine;
    use Source\WebService;

    require_once("Admin.php");

    class DistrictController extends Admin
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function list() : void
        {
            $response = WebService::get("district");
            $districts = json_decode($response)->districts;

            $response = WebService::get("city");
            $citys = json_decode($response)->cities;

            echo $this->view->render("district/list", [
                "title" => "Bairro - " . SITE,
                "districts" => $districts,
                "citys" => $citys
            ]);
        }

        public function delete($data) : void 
        {
            $response = WebService::delete("district", $data['id']);

            $response = WebService::get("district");
            $districts = json_decode($response)->districts;

            $response = WebService::get("city");
            $citys = json_decode($response)->cities;

            $error = array();

            echo $this->view->render("district/list", [
                "title" => "Bairro - " . SITE,
                "districts" => $districts,
                "citys" => $citys,
                "error" => $error,
            ]);
        }

        public function post($data) : void
        {
            $request = array(
                'description' => $data['bairro'],
                'city_id' => $data['cidade']
            );

            $response = WebService::post("district", $request);
            
            header('Location: ' . url("bairro"));
        }
    }