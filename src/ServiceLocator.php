<?php

declare(strict_types=1);

namespace FJcobi\ThePhpCCPatterns;

use FJcobi\ThePhpCCPatterns\Strategy\Command\NumbersCommand;
use FJcobi\ThePhpCCPatterns\Strategy\Generator\NumberGenerator;
use FJcobi\ThePhpCCPatterns\Strategy\Generator\ShufflingNumberGenerator;
use FJcobi\ThePhpCCPatterns\Strategy\Picker\FiveEvenNumbersPicker;
use FJcobi\ThePhpCCPatterns\Strategy\Picker\FiveHighestNumbersPicker;
use FJcobi\ThePhpCCPatterns\Strategy\Picker\FiveLowestNumbersPicker;
use FJcobi\ThePhpCCPatterns\Strategy\Picker\FiveRandomNumbersPicker;
use FJcobi\ThePhpCCPatterns\Strategy\Selector\NumberSelector;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;

/**
 * @codeCoverageIgnore
 */
final class ServiceLocator
{
    private ?Application $consoleApplication = null;

    /**
     * @var Command[]|null
     */
    private ?array $consoleCommands = null;

    private ?NumberGenerator $numberGenerator = null;

    /**
     * @var array<string,NumberSelector>
     */
    private ?array $numberSelectors = null;

    public function consoleApplication(): Application
    {
        if (null === $this->consoleApplication) {
            $application = new Application('thephpcc-patterns', '0.1');
            $application->addCommands($this->consoleCommands());
            $this->consoleApplication = $application;
        }

        return $this->consoleApplication;
    }

    /**
     * @return Command[]
     */
    private function consoleCommands(): array
    {
        return $this->consoleCommands ??= [
            new NumbersCommand($this->numberSelectors(), $this->numberGenerator())
        ];
    }

    private function numberGenerator(): NumberGenerator
    {
        return $this->numberGenerator ??= new ShufflingNumberGenerator(1, 100);
    }

    /**
     * @return array<string,NumberSelector>
     */
    private function numberSelectors(): array
    {
        return $this->numberSelectors ??= [
            'even' => new NumberSelector(new FiveEvenNumbersPicker()),
            'highest' => new NumberSelector(new FiveHighestNumbersPicker()),
            'lowest' => new NumberSelector(new FiveLowestNumbersPicker()),
            'random' => new NumberSelector(new FiveRandomNumbersPicker()),
        ];
    }
}
