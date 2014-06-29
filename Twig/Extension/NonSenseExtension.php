<?php
/* This file is part of the Webonaute package.
 *
 * (c) Mathieu Delisle <mdelisle@webonaute.ca>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Webonaute\NonSenseBundle\Twig\Extension;

use Webonaute\NonSenseBundle\Service\NonSenseService;

/**
 * Class NonSenseExtension
 *
 * Add twig function for the NonSense service.
 *
 * @package Webonaute\NonSenseBundle\Twig\Extension
 */
class NonSenseExtension extends \Twig_Extension
{

    /**
     * @var NonSenseService
     */
    protected $nonSenseService;

    public function __construct(NonSenseService $nonSenseService)
    {
        $this->nonSenseService = $nonSenseService;
    }

    /**
     * Register extension function.
     *
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction("getNonSenseSentence", array($this, 'getNonSenseSentence')),
            new \Twig_SimpleFunction("getNonSenseWord", array($this, 'getNonSenseWord')),
        );
    }

    /**
     * Display NonSense sentence.
     * @param int $numSentence Number of Sentence to dispay.
     *
     * @return string
     */
    public function getNonSenseSentence($numSentence = 1)
    {
        return $this->nonSenseService->sentence($numSentence);;
    }

    /**
     * Display NonSense words.
     *
     * @param int $numWords Number of words to display.
     *
     * @return string
     */
    public function getNonSenseWord($numWords = 10)
    {
        return $this->nonSenseService->word($numWords);;
    }

    public function getName()
    {
        return 'nonsense_extension';
    }
}
