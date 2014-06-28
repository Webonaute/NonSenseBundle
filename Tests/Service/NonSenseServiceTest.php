<?php
/*
* This file is part of the FOSUserBundle package.
*
* (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
namespace FOS\UserBundle\Tests\Security;

use Webonaute\NonSenseBundle\Service\NonSenseService;

/**
 * Class NonSenseServiceTest
 *
 * @package FOS\UserBundle\Tests\Security
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
