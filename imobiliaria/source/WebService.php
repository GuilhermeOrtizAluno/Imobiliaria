<?php

    namespace Source;

    use Unirest\Request;
    use Unirest\Request\Body;

    class WebService
    {

        public static function get($request, $content = null){
            $headers = array('Accept' => 'application/json');
            
            $url = 'http://127.0.0.1:8000/api/' . $request . '/' . $content;

            $response = Request::get($url, $headers);

            //$response->code;

            return $response->raw_body;
        }

        public static function post($request, $content){
            $headers = array('Accept' => 'application/json');
            
            $url = 'http://127.0.0.1:8000/api/' . $request;

            $response = Request::post($url, $headers, $content);

            return $response->raw_body;
        }

        public static function put($request, $content){
            $headers = array('Accept' => 'application/json');

            $url = 'http://127.0.0.1:8000/api/' . $request;

            $body = Body::json($content);

            $response = Request::put($url, $headers, $body);
        }

        public static function delete($request, $id){
            $headers = array('Accept' => 'application/json');

            $url = 'http://127.0.0.1:8000/api/' . $request . '/' . $id;
            
            $response = Request::delete($url, $headers);
        }
    }