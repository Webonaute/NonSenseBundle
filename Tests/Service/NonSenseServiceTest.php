<?php
/* This file is part of the Webonaute package.
 *
 * (c) Mathieu Delisle <mdelisle@webonaute.ca>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Webonaute\NonSenseBundle\Tests\Security;

use Webonaute\NonSenseBundle\Service\NonSenseService;

/**
 * Class NonSenseServiceTest
 *
 * @package Webonaute\NonSenseBundle\Tests\Security
 */
class NonSenseServiceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test the service return a not empty string.
     */
    public function testRefreshInvalidUserClass()
    {
        $nonSenseService = new NonSenseService();
        $sentence = $nonSenseService->sentence(1);
        $this->assertTrue(strlen($sentence) > 0);
    }
}
