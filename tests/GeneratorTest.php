<?php

namespace Butschster\CronExpression\Tests;

use Butschster\CronExpression\Generator;
use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase
{
    private Generator $generator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->generator = new Generator();
    }

    public function testEveryMinute()
    {
        $this->assertSame('* * * * *', $this->generator->getExpression());
        $this->assertSame('* * * * *', $this->generator->everyMinute()->getExpression());
    }

    public function testEveryXMinutes()
    {
        $this->assertSame('*/2 * * * *', $this->generator->everyEvenMinute()->getExpression());
        $this->assertSame('*/2 * * * *', $this->generator->everyTwoMinutes()->getExpression());
        $this->assertSame('*/3 * * * *', $this->generator->everyThreeMinutes()->getExpression());
        $this->assertSame('*/4 * * * *', $this->generator->everyFourMinutes()->getExpression());
        $this->assertSame('*/5 * * * *', $this->generator->everyFiveMinutes()->getExpression());
        $this->assertSame('*/10 * * * *', $this->generator->everyTenMinutes()->getExpression());
        $this->assertSame('*/15 * * * *', $this->generator->everyFifteenMinutes()->getExpression());
        $this->assertSame('0,30 * * * *', $this->generator->everyThirtyMinutes()->getExpression());
        $this->assertSame('15,30,45 * * * *', $this->generator->minutes(15, 30, 45)->getExpression());
    }

    public function testHourly()
    {
        $this->assertSame('0 * * * *', $this->generator->hourly()->getExpression());
        $this->assertSame('15 * * * *', $this->generator->hourlyAt(15)->getExpression());
        $this->assertSame('15,30,45 * * * *', $this->generator->hourlyAt(15, 30, 45)->getExpression());
        $this->assertSame('0 */2 * * *', $this->generator->everyTwoHours()->getExpression());
        $this->assertSame('0 */3 * * *', $this->generator->everyThreeHours()->getExpression());
        $this->assertSame('0 */4 * * *', $this->generator->everyFourHours()->getExpression());
        $this->assertSame('0 */6 * * *', $this->generator->everySixHours()->getExpression());

        $this->assertSame('0 * * * *', $this->generator->everyFiveMinutes()->hourly()->getExpression());
        $this->assertSame('37 * * * *', $this->generator->hourlyAt(37)->getExpression());
        $this->assertSame('15,30,45 * * * *', $this->generator->hourlyAt(15, 30, 45)->getExpression());
    }

    public function testDaily()
    {
        $this->assertSame('0 0 * * *', $this->generator->daily()->getExpression());
        $this->assertSame('0 1 * * *', $this->generator->daily(1)->getExpression());
        $this->assertSame('0 3,15 * * *', $this->generator->daily(3, 15)->getExpression());
        $this->assertSame('0 13 * * *', $this->generator->dailyAt(13)->getExpression());
        $this->assertSame('8 13 * * *', $this->generator->dailyAt(13, 8)->getExpression());
        $this->assertSame('0 3,15 * * *', $this->generator->twiceDaily(3, 15)->getExpression());
        $this->assertSame('5 3,15 * * *', $this->generator->twiceDailyAt(3, 15, 5)->getExpression());
    }

    public function testWeekly()
    {
        $this->assertSame('0 0 * * 0', $this->generator->weekly()->getExpression());
        $this->assertSame('0 0 * * 1,4', $this->generator->weekly(Generator::MONDAY, Generator::THURSDAY)->getExpression());
        $this->assertSame('0 0 * * 1', $this->generator->weeklyOn(Generator::MONDAY)->getExpression());
        $this->assertSame('0 8 * * 1', $this->generator->weeklyOn(Generator::MONDAY, 8, 0)->getExpression());

        $this->assertSame('0 0 * * 1-5', $this->generator->daily()->weekdays()->getExpression());
        $this->assertSame('0 0 * * 6,0', $this->generator->daily()->weekends()->getExpression());

        $this->assertSame('0 0 * * 1', $this->generator->daily()->mondays()->getExpression());
        $this->assertSame('0 0 * * 2', $this->generator->daily()->tuesdays()->getExpression());
        $this->assertSame('0 0 * * 3', $this->generator->daily()->wednesdays()->getExpression());
        $this->assertSame('0 0 * * 4', $this->generator->daily()->thursdays()->getExpression());
        $this->assertSame('0 0 * * 5', $this->generator->daily()->fridays()->getExpression());
        $this->assertSame('0 0 * * 6', $this->generator->daily()->saturdays()->getExpression());
        $this->assertSame('0 0 * * 0', $this->generator->daily()->sundays()->getExpression());

        $this->assertSame('0 0 * * 1', $this->generator->weeklyOnMonday()->getExpression());
        $this->assertSame('0 8 * * 1', $this->generator->weeklyOnMonday(8)->getExpression());
        $this->assertSame('5 8 * * 1', $this->generator->weeklyOnMonday(8, 5)->getExpression());

        $this->assertSame('0 0 * * 2', $this->generator->weeklyOnTuesday()->getExpression());
        $this->assertSame('0 8 * * 2', $this->generator->weeklyOnTuesday(8)->getExpression());
        $this->assertSame('5 8 * * 2', $this->generator->weeklyOnTuesday(8, 5)->getExpression());

        $this->assertSame('0 0 * * 3', $this->generator->weeklyOnWednesday()->getExpression());
        $this->assertSame('0 8 * * 3', $this->generator->weeklyOnWednesday(8)->getExpression());
        $this->assertSame('5 8 * * 3', $this->generator->weeklyOnWednesday(8, 5)->getExpression());

        $this->assertSame('0 0 * * 4', $this->generator->weeklyOnThursday()->getExpression());
        $this->assertSame('0 8 * * 4', $this->generator->weeklyOnThursday(8)->getExpression());
        $this->assertSame('5 8 * * 4', $this->generator->weeklyOnThursday(8, 5)->getExpression());

        $this->assertSame('0 0 * * 5', $this->generator->weeklyOnFriday()->getExpression());
        $this->assertSame('0 8 * * 5', $this->generator->weeklyOnFriday(8)->getExpression());
        $this->assertSame('5 8 * * 5', $this->generator->weeklyOnFriday(8, 5)->getExpression());

        $this->assertSame('0 0 * * 6', $this->generator->weeklyOnSaturday()->getExpression());
        $this->assertSame('0 8 * * 6', $this->generator->weeklyOnSaturday(8)->getExpression());
        $this->assertSame('5 8 * * 6', $this->generator->weeklyOnSaturday(8, 5)->getExpression());

        $this->assertSame('0 0 * * 0', $this->generator->weeklyOnSunday()->getExpression());
        $this->assertSame('0 8 * * 0', $this->generator->weeklyOnSunday(8)->getExpression());
        $this->assertSame('5 8 * * 0', $this->generator->weeklyOnSunday(8, 5)->getExpression());
    }

    public function testMonthly()
    {
        $this->assertSame('0 0 1 * *', $this->generator->monthly()->getExpression());
        $this->assertSame('0 15 1 * *', $this->generator->monthly(15)->getExpression());
        $this->assertSame('24 15 1 * *', $this->generator->monthly(15, 24)->getExpression());

        $this->assertSame('0 0 15,24 * *', $this->generator->twiceMonthly(15, 24)->getExpression());
        $this->assertSame('0 10 15,24 * *', $this->generator->twiceMonthly(15, 24, 10)->getExpression());
        $this->assertSame('45 10 15,24 * *', $this->generator->twiceMonthly(15, 24, 10, 45)->getExpression());

        $this->assertSame('45 10 12,24,30 * *', $this->generator->dailyAt(10, 45)->daysOfMonth(12, 24, 30)->getExpression());

        $this->assertSame('0 0 4 * *', $this->generator->monthlyOn(4)->getExpression());
        $this->assertSame('0 15 4 * *', $this->generator->monthlyOn(4, 15)->getExpression());
        $this->assertSame('23 15 4 * *', $this->generator->monthlyOn(4, 15, 23)->getExpression());

        $this->assertSame('0 0 ' . (new \DateTime())->format('t') . ' * *', $this->generator->lastDayOfMonth()->getExpression());
    }

    public function testYearly()
    {
        $this->assertSame('0 0 1 1-12/3 *', $this->generator->quarterly()->getExpression());
        $this->assertSame('0 0 1 1 *', $this->generator->yearly()->getExpression());
        $this->assertSame('8 15 5 4 *', $this->generator->yearlyOn(4, 5, 15, 8)->getExpression());
    }

    public function testMixedExpression()
    {
        $this->assertSame(
            '* */2 5,10,15,20,25,30 3,6,9,12 1,3,5,0',
            (string) $this->generator
                ->yearly()
                ->months(3, 6, 9, 12)
                ->daysOfMonth(5, 10, 15, 20, 25, 30)
                ->daysOfWeek(Generator::MONDAY, Generator::WEDNESDAY, Generator::FRIDAY, Generator::SUNDAY)
                ->everyTwoHours()
                ->everyMinute()
        );
    }
}
