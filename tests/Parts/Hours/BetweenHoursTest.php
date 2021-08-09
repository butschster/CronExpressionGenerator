<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests\Parts\Hours;

use Butschster\CronExpression\Parts\Hours\BetweenHours;
use Butschster\CronExpression\Tests\TestCase;

class BetweenHoursTest extends TestCase
{
    public function testUpdatesExpression()
    {
        $this->assertExpressionPart('* 6-12 * * *', new BetweenHours(6, 12));
    }
}
