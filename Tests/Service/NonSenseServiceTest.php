<?php

namespace FOS\UserBundle\Tests\Security;

use Webonaute\NonSenseBundle\Service\NonSenseService;

class NonSenseServiceTest extends \PHPUnit_Framework_TestCase
{

    public function testRefreshInvalidUserClass()
    {
        $nonSenseService = new NonSenseService();
        $this->assertTrue(strlen($this->$nonSenseService->sentence(1)) > 0);
    }
}
