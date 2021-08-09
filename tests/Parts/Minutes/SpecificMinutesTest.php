<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests\Parts\Minutes;

use Butschster\CronExpression\Parts\Minutes\SpecificMinutes;
use Butschster\CronExpression\Tests\TestCase;

class SpecificMinutesTest extends TestCase
{
    public function testUpdatesExpression()
    {
        $this->assertExpressionPart('2,4,6,8,10,12 * * * *', new SpecificMinutes(2, 4, 6, 8, 10, 12));
    }
}
