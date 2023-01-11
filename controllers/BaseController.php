<?php

namespace controllers;

/**
 * The base controller used to implement basic return functions
 */
class BaseController
{
    function __construct()
    {
    }

    protected function Ok($data): void
    {
        header('Content-Type: application/json');
        echo json_encode(array(
            'data' => $data,
            'status' => 200,
            'code' => 'OK'
        ));
    }

    protected function Accepted($data): void
    {
        header('Content-Type: application/json');
        echo json_encode(array(
            'data' => $data,
            'status' => 202,
            'code' => 'Accepted'
        ));
    }

    protected function BadRequest($data): void
    {
        header('Content-Type: application/json');
        echo json_encode(array(
            'data' => $data,
            'status' => 400,
            'code' => 'Bad Request'
        ));
    }

    protected function NotFound($data): void
    {
        header('Content-Type: application/json');
        echo json_encode(array(
            'data' => $data,
            'status' => 404,
            'code' => 'Not Found'
        ));
    }

    protected function InternalServerError($data): void
    {
        header('Content-Type: application/json');
        echo json_encode(array(
            'data' => $data,
            'status' => 500,
            'code' => 'Internal Server Error'
        ));
    }

    protected function NotImplemented($data): void
    {
        header('Content-Type: application/json');
        echo json_encode(array(
            'data' => $data,
            'status' => 501,
            'code' => 'Not Implemented'
        ));
    }

    protected function Unauthorized($data): void
    {
        header('Content-Type: application/json');
        echo json_encode(array(
            'data' => $data,
            'status' => 401,
            'code' => 'Unauthorized'
        ));
    }

    protected function NoContent(): void
    {
        header('Content-Type: application/json');
        echo json_encode(array(
            'data' => null,
            'status' => 204,
            'code' => 'No Content'
        ));
    }
}
