<?php

namespace Portal\Controllers;

use \Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;

class SearchController
{
    private $applicantModel;

    public function __construct(ApplicantModel $applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $data = ['success' => false, 'msg' => '', 'data' => []];
        $statusCode = 401;

        $searchTerm = $request->getParsedBody();

        //Needs to be checked once s3 merged, format of parsed body could be very different
        $validatedSearchData = [
            'name' => filter_var($searchTerm['name'], FILTER_SANITIZE_STRING)
        ];

        $searchResults = $this->applicantModel->searchDatabaseByName($validatedSearchData);

        //Needs checking too, format of json could be different
        if ($searchResults) {
            $data['success'] = $searchResults;
            $data['msg'] = '';
            $statusCode = 200;
        }

        return $response->withJson($data, $statusCode);
    }
}