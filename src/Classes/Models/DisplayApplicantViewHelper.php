<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 27/11/2018
 * Time: 10:15
 */

namespace Portal\Models;


class DisplayApplicantViewHelper
{

    static public function displayApplicants($applicants)
    {
        $result = '';
        foreach ($applicants as $applicant) {
            $result .= $applicant['name'] . $applicant['email'] . $applicant['cohortid'];
        }
        return $result;
    }
}