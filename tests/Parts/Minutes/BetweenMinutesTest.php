<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests\Parts\Minutes;

use Butschster\CronExpression\Parts\Minutes\BetweenMinutes;
use Butschster\CronExpression\Tests\TestCase;

class BetweenMinutesTest extends TestCase
{
    public function testUpdatesExpression()
    {
        $this->assertExpressionPart('6-12 * * * *', new BetweenMinutes(6, 12));
    }
}
