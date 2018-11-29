<?php

namespace Tests\Entities;

use PHPUnit\Framework\TestCase;
use Portal\Entities as Entities;

class ApplicantEntityTest extends TestCase
{
    function testValidateEmailSuccess()
    {
        $applicantName = "Matt";
        $applicantEmail = "test@test.com";
        $applicantPhoneNumber = "07999909999";
        $applicantCohortId = 2;
        $applicantWhyDev = "a";
        $applicantCodeExperience = "20 years";
        $applicantHearAboutId = 4;
        $applicantEligible = "yes";
        $applicantEighteenPlus = "yes";
        $applicantFinance = "yes";
        $applicantNotes = "yes";

        $case = new Entities\ApplicantEntity(
            $applicantName,
            $applicantEmail,
            $applicantPhoneNumber,
            $applicantCohortId,
            $applicantWhyDev,
            $applicantCodeExperience,
            $applicantHearAboutId,
            $applicantEligible,
            $applicantEighteenPlus,
            $applicantFinance,
            $applicantNotes
        );
        $expected = Entities\ApplicantEntity::class;
        $this->assertInstanceOf($expected, $case);
    }
}
