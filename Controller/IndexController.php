<?php
/* This file is part of the Webonaute package.
 *
 * (c) Mathieu Delisle <mdelisle@webonaute.ca>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Webonaute\NonSenseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Webonaute\NonSenseBundle\Service\NonSenseService;

/**
 * Class IndexController
 *
 * @package Webonaute\NonSenseBundle\Controller
 */
class IndexController extends Controller
{
    /**
     * Display a nonsense sentence.
     *
     * @return mixed
     */
    public function DisplaySentenceAction()
    {
        /** @var NonSenseService $nonSenseService */
        $nonSenseService = $this->container->get("nonsense.service");

        return $this->container->get('templating')->renderResponse(
            'NonSenseBundle:Index:DisplaySentence.html.twig',
            array(
                'nonsense' => $nonSenseService->sentence(1),
            )
        );
    }

    /**
     * Display a nonsense word.
     *
     * @return mixed
     */
    public function DisplayWordAction()
    {
        /** @var NonSenseService $nonSenseService */
        $nonSenseService = $this->container->get("nonsense.service");

        return $this->container->get('templating')->renderResponse(
            'NonSenseBundle:Index:DisplayWord.html.twig',
            array(
                'nonsense' => $nonSenseService->word(10),
            )
        );
    }

}
