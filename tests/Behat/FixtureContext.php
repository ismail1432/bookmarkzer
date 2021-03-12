<?php

declare(strict_types=1);

namespace App\Tests\Behat;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;

final class FixtureContext implements Context, TagInterface
{
    private const DUMP = 'dump/bookmarkland.sql';

    /**
     * @BeforeScenario
     */
    public function clearDatabase(BeforeScenarioScope $scope): void
    {
        $this->loadFixtures();
    }

    private function loadFixtures(): void
    {
        shell_exec(sprintf('bin/console doctrine:database:import %s', self::DUMP));
    }
}
