<?php

    class BaseController 
    {
        function __construct()
        {
            
        }

        protected function Ok($data)
        {
            header('Content-Type: application/json');
            echo json_encode(array(
                ...$data, 
                'status' => 200,
                'code' => 'OK'
            ));
        }

        protected function Accepted($data)
        {
            header('Content-Type: application/json');
            echo json_encode(array(
                ...$data, 
                'status' => 202,
                'code' => 'Accepted'
            ));
        }

        protected function BadRequest($data)
        {
            header('Content-Type: application/json');
            echo json_encode(array(
                ...$data,
                'status' => 400,
                'code' => 'Bad Request'
            ));
        }

        protected function NotFound($data)
        {
            header('Content-Type: application/json');
            echo json_encode(array(
                ...$data, 
                'status' => 404,
                'code' => 'Not Found'
            ));
        }

        protected function InternalServerError($data)
        {
            header('Content-Type: application/json');
            echo json_encode(array(
                ...$data, 
                'status' => 500,
                'code' => 'Internal Server Error'
            ));
        }

        protected function NotImplemented($data)
        {
            header('Content-Type: application/json');
            echo json_encode(array(
                ...$data, 
                'status' => 501,
                'code' => 'Not Implemented'
            ));
        }
        
        protected function Unauthorized($data)
        {
            header('Content-Type: application/json');
            echo json_encode(array(
                ...$data, 
                'status' => 401,
                'code' => 'Unauthorized'
            ));
        }
    }