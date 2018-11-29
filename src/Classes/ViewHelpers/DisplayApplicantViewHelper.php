<?php

namespace Portal\ViewHelpers;

use \Portal\Entities\ApplicantEntity;

class DisplayApplicantViewHelper
{
    /**
     * Concatenates new applicant's name, email and cohort to join ready to be output.
     *
     * @param $applicants
     *
     * @return string $result, returns name, email, cohortID and all the data for the applicant.
     */
    static public function displayApplicants($applicants)
    {

        $result = '';
        foreach ($applicants as $applicant) {
            if ($applicant instanceof ApplicantEntity) {
                $result .=  '<strong>Name: </strong>' . $applicant->getName() .
                            '<strong> Email: </strong>' . $applicant->getEmail() .
                            '<strong> Date Applied To: </strong>' . $applicant->getCohortDate() .
                            '<br><div class="hiddenData"><strong>Phone Number: </strong>' . $applicant->getPhoneNumber() .
                            '<br><strong> Why Development? </strong>' . $applicant->getWhyDev() .
                            '<br><strong> Code Experience: </strong>' . $applicant->getCodeExperience() .
                            '<br><strong> How Did You Hear About Us: </strong>' . $applicant->getHearAboutId() .
                            '<br><strong> Eligible To Work In The Uk? </strong>' . $applicant->getEligible() .
                            '<br><strong> Over 18? </strong>' . $applicant->getEighteenPlus() .
                            '<br><strong> Finance? </strong>' . $applicant->getFinance() .
                            '<br><strong> Notes: </strong>' . $applicant->getNotes() .
                            '</div><button class="showData">Show More Data</button><br>';
            }
        }
        return ($result);
    }
}
