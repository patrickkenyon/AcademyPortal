<?php

//FrontEnd
$app->get('/','HomePageController');
$app->get('/admin', 'AdminController');
$app->get('/register', 'RegisterController');
$app->get('/search', 'SearchController');

$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    return $this->renderer->render($response, 'index.phtml', $args);
});

// URL routes - to display pages
$app->get('/admin', 'AdminController');
$app->get('/addapplicant', 'addApplicantController');
$app->get('/displayApplicants', 'DisplayApplicantsController');

// API routes
$app->post('/api/login', 'LoginController');
$app->post('/api/registerUser', 'RegisterUserController');
$app->post('/api/saveApplicant', 'SaveApplicantController');
$app->get('/api/applicationForm', 'ApplicationFormController');

