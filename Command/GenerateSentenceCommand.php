<?php
/* This file is part of the Webonaute package.
 *
 * (c) Mathieu Delisle <mdelisle@webonaute.ca>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Webonaute\NonSenseBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Webonaute\NonSenseBundle\Service\NonSenseService;

/**
 * Class TestCommand
 *
 * Extend
 *
 * @package Webonaute\NonSenseBundle\Command
 */
class GenerateSentenceCommand extends ContainerAwareCommand
{
    /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setName('nonsense:generate:sentence')
            ->setDescription('Generate a nonsense sentence.')
            ->setHelp("");
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var NonSenseService $service */
        $service = $this->getContainer()->get('nonsense.service');
        $output->writeln($service->sentence(1));
    }

}
