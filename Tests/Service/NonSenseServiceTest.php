<?php

namespace FOS\UserBundle\Tests\Security;

use Webonaute\NonSenseBundle\Service\NonSenseService;

class NonSenseServiceTest extends \PHPUnit_Framework_TestCase
{

    public function testRefreshInvalidUserClass()
    {
        $nonSenseService = new NonSenseService();
        $sentence = $nonSenseService->sentence(1);
        $this->assertTrue(strlen($sentence) > 0);
    }
}
