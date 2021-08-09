<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests\Parts\Hours;

use Butschster\CronExpression\Parts\Hours\SpecificHours;
use Butschster\CronExpression\Tests\TestCase;

class SpecificHoursTest extends TestCase
{
    public function testUpdatesExpression()
    {
        $this->assertExpressionPart('* 2,4,6,8,10,12 * * *', new SpecificHours(2, 4, 6, 8, 10, 12));
    }
}
