<?php

declare(strict_types=1);

namespace FJcobi\ThePhpCCPatterns\Strategy\Command;

use FJcobi\ThePhpCCPatterns\Strategy\Generator\NumberGenerator;
use FJcobi\ThePhpCCPatterns\Strategy\Selector\NumberSelector;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class NumbersCommand extends Command
{
    protected static $defaultName = 'patterns:strategy:numbers';

    /**
     * @var array<string,NumberSelector>
     */
    private array $numberSelectors;

    private NumberGenerator $numberGenerator;

    /**
     * @param array<string,NumberSelector> $numberSelectors
     */
    public function __construct(array $numberSelectors, NumberGenerator $numberGenerator)
    {
        $this->numberSelectors = $numberSelectors;
        $this->numberGenerator = $numberGenerator;

        parent::__construct();
    }

    public function run(InputInterface $input, OutputInterface $output): int
    {
        $numbers = $this->numberGenerator->range();

        $output->writeln(\sprintf('Will now select several numbers from %s.', \implode(', ', $numbers)));

        foreach ($this->numberSelectors as $name => $numberSelector) {
            $output->writeln(\sprintf('%s: %s', $name, \implode(', ', $numberSelector->selectFrom($numbers))));
        }

        return 0;
    }
}
