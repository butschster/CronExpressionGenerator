<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests;

use Butschster\CronExpression\Generator;
use DateTime;
use InvalidArgumentException;

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
        $this->assertExpression('* * * * *', $this->generator);
        $this->assertExpression('* * * * *', $this->generator->everyMinute());
    }

    public function testEveryXMinutes()
    {
        $this->assertExpression('*/2 * * * *', $this->generator->everyEvenMinute());
        $this->assertExpression('*/2 * * * *', $this->generator->everyTwoMinutes());
        $this->assertExpression('*/3 * * * *', $this->generator->everyThreeMinutes());
        $this->assertExpression('*/4 * * * *', $this->generator->everyFourMinutes());
        $this->assertExpression('*/5 * * * *', $this->generator->everyFiveMinutes());
        $this->assertExpression('*/10 * * * *', $this->generator->everyTenMinutes());
        $this->assertExpression('*/15 * * * *', $this->generator->everyFifteenMinutes());
        $this->assertExpression('0,30 * * * *', $this->generator->everyThirtyMinutes());
    }

    public function testSetsMinutes()
    {
        $this->assertExpression('15,30,45 * * * *', $this->generator->minutes(15, 30, 45));
        $this->assertExpression('*/3 * * * *', $this->generator->minutes('*/3'));
        $this->assertExpression('10-30 * * * *', $this->generator->minutes('10-30'));
    }

    public function testInvalidMinutesShouldThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Invalid CRON field value 61 at position 0');

        $this->generator->minutes(61);
    }

    public function testHourly()
    {
        $this->assertExpression('0 * * * *', $this->generator->hourly());
        $this->assertExpression('0 * * * *', $this->generator->everyFiveMinutes()->hourly());
    }

    public function testHourlyAt()
    {
        $this->assertExpression('15 * * * *', $this->generator->hourlyAt(15));
        $this->assertExpression('15,30,45 * * * *', $this->generator->hourlyAt(15, 30, 45));
    }

    public function testEveryXHours()
    {
        $this->assertExpression('0 */2 * * *', $this->generator->everyTwoHours());
        $this->assertExpression('0 */3 * * *', $this->generator->everyThreeHours());
        $this->assertExpression('0 */4 * * *', $this->generator->everyFourHours());
        $this->assertExpression('0 */6 * * *', $this->generator->everySixHours());
    }

    public function testSetsHours()
    {
        $this->assertExpression('* 1,2,3 * * *', $this->generator->hours(1,2,3));
        $this->assertExpression('* */3 * * *', $this->generator->hours('*/3'));

        $this->assertExpression('15 1,2,3 * * *', $this->generator->hourlyAt(15)->hours(1,2,3));
    }

    public function testInvalidHoursShouldThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Invalid CRON field value 25 at position 1');

        $this->generator->hours(25);
    }

    public function testDaily()
    {
        $this->assertExpression('0 0 * * *', $this->generator->daily());
        $this->assertExpression('0 1 * * *', $this->generator->daily(1));
        $this->assertExpression('0 3,15 * * *', $this->generator->daily(3, 15));
    }

    public function testDailyAt()
    {
        $this->assertExpression('0 13 * * *', $this->generator->dailyAt(13));
        $this->assertExpression('8 13 * * *', $this->generator->dailyAt(13, 8));
    }

    public function testTwiceDailyAt()
    {
        $this->assertExpression('0 3,15 * * *', $this->generator->twiceDaily(3, 15));
        $this->assertExpression('5 3,15 * * *', $this->generator->twiceDailyAt(3, 15, 5));
    }

    public function testWeekly()
    {
        $this->assertExpression('0 0 * * 0', $this->generator->weekly());
        $this->assertExpression('0 0 * * 1,4', $this->generator->weekly(Generator::MONDAY, Generator::THURSDAY));
    }

    public function testWeekdays()
    {
        $this->assertExpression('0 0 * * 1-5', $this->generator->daily()->weekdays());
        $this->assertExpression('0 0 * * 6,0', $this->generator->daily()->weekends());

        $this->assertExpression('0 0 * * 1', $this->generator->daily()->mondays());
        $this->assertExpression('0 0 * * 2', $this->generator->daily()->tuesdays());
        $this->assertExpression('0 0 * * 3', $this->generator->daily()->wednesdays());
        $this->assertExpression('0 0 * * 4', $this->generator->daily()->thursdays());
        $this->assertExpression('0 0 * * 5', $this->generator->daily()->fridays());
        $this->assertExpression('0 0 * * 6', $this->generator->daily()->saturdays());
        $this->assertExpression('0 0 * * 0', $this->generator->daily()->sundays());
    }

    public function testWeeklyOn()
    {
        $this->assertExpression('0 0 * * 1', $this->generator->weeklyOn(Generator::MONDAY));
        $this->assertExpression('0 8 * * 1', $this->generator->weeklyOn(Generator::MONDAY, 8));
        $this->assertExpression('6 8 * * 1', $this->generator->weeklyOn(Generator::MONDAY, 8, 6));

        $this->assertExpression('0 0 * * 1', $this->generator->weeklyOnMonday());
        $this->assertExpression('0 8 * * 1', $this->generator->weeklyOnMonday(8));
        $this->assertExpression('5 8 * * 1', $this->generator->weeklyOnMonday(8, 5));

        $this->assertExpression('0 0 * * 2', $this->generator->weeklyOnTuesday());
        $this->assertExpression('0 8 * * 2', $this->generator->weeklyOnTuesday(8));
        $this->assertExpression('5 8 * * 2', $this->generator->weeklyOnTuesday(8, 5));

        $this->assertExpression('0 0 * * 3', $this->generator->weeklyOnWednesday());
        $this->assertExpression('0 8 * * 3', $this->generator->weeklyOnWednesday(8));
        $this->assertExpression('5 8 * * 3', $this->generator->weeklyOnWednesday(8, 5));

        $this->assertExpression('0 0 * * 4', $this->generator->weeklyOnThursday());
        $this->assertExpression('0 8 * * 4', $this->generator->weeklyOnThursday(8));
        $this->assertExpression('5 8 * * 4', $this->generator->weeklyOnThursday(8, 5));

        $this->assertExpression('0 0 * * 5', $this->generator->weeklyOnFriday());
        $this->assertExpression('0 8 * * 5', $this->generator->weeklyOnFriday(8));
        $this->assertExpression('5 8 * * 5', $this->generator->weeklyOnFriday(8, 5));

        $this->assertExpression('0 0 * * 6', $this->generator->weeklyOnSaturday());
        $this->assertExpression('0 8 * * 6', $this->generator->weeklyOnSaturday(8));
        $this->assertExpression('5 8 * * 6', $this->generator->weeklyOnSaturday(8, 5));

        $this->assertExpression('0 0 * * 0', $this->generator->weeklyOnSunday());
        $this->assertExpression('0 8 * * 0', $this->generator->weeklyOnSunday(8));
        $this->assertExpression('5 8 * * 0', $this->generator->weeklyOnSunday(8, 5));
    }

    public function testMonthly()
    {
        $this->assertExpression('0 0 1 * *', $this->generator->monthly());
        $this->assertExpression('0 15 1 * *', $this->generator->monthly(15));
        $this->assertExpression('24 15 1 * *', $this->generator->monthly(15, 24));
    }

    public function testDaysOfMonth()
    {
        $this->assertExpression('45 10 12,24,30 * *', $this->generator->dailyAt(10, 45)->daysOfMonth(12, 24, 30));
    }

    public function testTwiceMonthly()
    {
        $this->assertExpression('0 0 15,24 * *', $this->generator->twiceMonthly(15, 24));
        $this->assertExpression('0 10 15,24 * *', $this->generator->twiceMonthly(15, 24, 10));
        $this->assertExpression('45 10 15,24 * *', $this->generator->twiceMonthly(15, 24, 10, 45));
    }

    public function testMonthlyOn()
    {
        $this->assertExpression('0 0 4 * *', $this->generator->monthlyOn(4));
        $this->assertExpression('0 15 4 * *', $this->generator->monthlyOn(4, 15));
        $this->assertExpression('23 15 4 * *', $this->generator->monthlyOn(4, 15, 23));
    }

    public function testLastDayOfMonth()
    {
        $currentDate = new DateTime();
        $this->assertExpression('0 0 ' . $currentDate->format('t') . ' * *', $this->generator->lastDayOfMonth());
        $this->assertExpression('31 12 ' . $currentDate->format('t') . ' * *', $this->generator->lastDayOfMonth(12, 31));

        $date = new DateTime('2021-02-05');
        $this->assertExpression('31 12 28 * *', $this->generator->lastDayOfMonth(12, 31, $date));
    }

    public function testQuarterly()
    {
        $this->assertExpression('0 0 1 1-12/3 *', $this->generator->quarterly());
    }

    public function testYearly()
    {
        $this->assertExpression('0 0 1 1 *', $this->generator->yearly());
    }

    public function testYearlyOn()
    {
        $this->assertExpression('8 15 5 4 *', $this->generator->yearlyOn(Generator::APR, 5, 15, 8));
    }

    public function testSpecificDateTime()
    {
        $date = new DateTime('2021-02-05 12:34:26');
        $this->assertExpression('34 12 5 2 *', $this->generator->on($date));

        $date = new DateTime('2021-02-23 09:05:26');
        $this->assertExpression('5 9 23 2 *', $this->generator->on($date));
    }

    public function testSetExpression()
    {
        $this->assertExpression('* * 3 * *', $this->generator->cron('* * 3 * *'));
        $this->assertExpression('*/2 * 3 * *', $this->generator->cron('* * 3 * *')->everyTwoMinutes());
    }

    public function testMixedExpression()
    {
        $this->assertExpression(
            '* */2 5,10,15,20,25,30 3,6,9,12 1,3,5,0',
            $this->generator
                ->yearly()
                ->months(Generator::MAR, Generator::JUN, Generator::SEP, Generator::DEC)
                ->daysOfMonth(5, 10, 15, 20, 25, 30)
                ->daysOfWeek(Generator::MONDAY, Generator::WEDNESDAY, Generator::FRIDAY, Generator::SUNDAY)
                ->everyTwoHours()
                ->everyMinute()
        );
    }
}
