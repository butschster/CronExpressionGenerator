<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests\Parts\Days;

use Butschster\CronExpression\Parts\Days\LastDayOfMonth;
use Butschster\CronExpression\Tests\TestCase;

class LastDayOfMonthTest extends TestCase
{
    public function testUpdatesExpression()
    {
        $this->assertExpressionPart('* * L * *', new LastDayOfMonth());
    }
}
