<?php

namespace Portal\Controllers;

use Portal\Models\ApplicantModel;
use Slim\Http\Request;
use Slim\Http\Response;

class SaveApplicantController
{
    private $applicantModel;

    /**
     * Instantiates SaveApplicantController
     *
     * @param ApplicantModel $applicantModel userModel object dependency
     */
    public function __construct(ApplicantModel $applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }

    /**
     * If user is logged in, invoke gets data from new applicant form and passes into insertNewApplicantToDb
     * function for inserting into database.
     * If successful Insert returns success true with message of application saved.
     * 
     * @param Request $request
     * @param Response $response
     *
     * @return Response, will return the data from successfulRegister and the statusCode, via Json.
     */
    function __invoke(Request $request, Response $response)
    {
        if ($_SESSION['loggedIn'] === true) {
            $data = ['success' => false, 'msg' => 'Application not saved', 'data' => []];
            $statusCode = 401;

            $newApplicationData = $request->getParsedBody();

            $applicant = $this->applicantModel->createNewApplicant(
                $newApplicationData['name'],
                $newApplicationData['email'],
                $newApplicationData['phoneNumber'],
                $newApplicationData['cohortId'],
                $newApplicationData['whyDev'],
                $newApplicationData['codeExperience'],
                $newApplicationData['hearAboutId'],
                $newApplicationData['eligible'],
                $newApplicationData['eighteenPlus'],
                $newApplicationData['finance'],
                $newApplicationData['notes']
            );

            $successfulRegister = $this->applicantModel->insertNewApplicantToDb($applicant);

            if ($successfulRegister) {
                $data = [
                    'success' => $successfulRegister,
                    'msg'     => 'Application Saved',
                    'data'    => [$applicant]
                ];
                $statusCode = 200;
            }
            return $response->withJson($data, $statusCode);
        }
    }
}
