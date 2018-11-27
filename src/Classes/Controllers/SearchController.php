<?php

namespace Portal\Controllers;

use \Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;

class SearchController
{
    private $applicantModel;
    private $renderer;

    public function __construct(ApplicantModel $applicantModel, PhpRenderer $renderer)
    {
        $this->applicantModel = $applicantModel;
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $searchResults = $request->getParsedBody();
        $validatedSearchData = [
            'name' => filter_var($searchResults['name'], FILTER_SANITIZE_STRING)
        ];
        $this->applicantModel->searchDatabaseByName($validatedSearchData);
        return $this->renderer->render($response, 'searchResults.phtml', $args);
    }
}