<?php
namespace Webonaute\NonSenseBundle\Twig\Extension;

use Webonaute\NonSenseBundle\Service\NonSenseService;

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

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction("getNonSenseSentence",array($this, 'getNonSenseSentence')),
            new \Twig_SimpleFunction("getNonSenseWord",array($this, 'getNonSenseWord')),
        );
    }

    public function getNonSenseSentence($numSentence = 1)
    {
        return $this->nonSenseService->sentence($numSentence);;
    }

    public function getNonSenseWord($numWords = 10)
    {
        return $this->nonSenseService->word($numWords);;
    }

    public function getName()
    {
        return 'nonsense_extension';
    }
}
