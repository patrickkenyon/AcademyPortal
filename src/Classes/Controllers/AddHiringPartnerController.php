<?php

namespace Portal\Controllers;


use Portal\Entities\HiringPartnerEntity;
use Portal\Models\HiringPartnerModel;
use Slim\Http\Request;
use Slim\Http\Response;

class AddHiringPartnerController
{
    private $hiringPartnerModel;

    /**
     * AddHiringPartnerController constructor instantiates the AddHiringPartnerController
     * @param $hiringPartnerModel
     */
    public function __construct(HiringPartnerModel $hiringPartnerModel)
    {
        $this->hiringPartnerModel = $hiringPartnerModel;
    }

    public function __invoke(Request $request, Response $response)
    {

        $data = [
            'success' => false,
            'msg' => 'Hiring partner not registered.',
            'data' => []
        ];
        $statusCode = 406;

        $newHiringPartnerData = $request->getParsedBody();

        try {
            $hiringPartnerEntity = new HiringPartnerEntity(
                $newHiringPartnerData['companyName'],
                $newHiringPartnerData['size'],
                $newHiringPartnerData['techStack'],
                $newHiringPartnerData['postcode'],
                $newHiringPartnerData['phoneNo'],
                $newHiringPartnerData['url']
            );
        } catch (\Error $e) {
            return $response->withJson($data, $statusCode);
        }

        $successfulNewHiringPartner = $this->hiringPartnerModel->insertNewHiringPartnerToDb($hiringPartnerEntity);

        if ($successfulNewHiringPartner) {
            $data = [
                'success' => $successfulNewHiringPartner,
                'msg' => 'New hiring partner ' . $newHiringPartnerData['companyName'] . ' added to the database',
                'data' => []
            ];
            $statusCode = 200;
        }
        return $response->withJson($data, $statusCode);
    }
}
