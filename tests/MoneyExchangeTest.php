<?php

use \PHPUnit\Framework\TestCase;

class MoneyExchangeTest extends TestCase
{
    private $money = array(
        100,
        50,
        20,
        10,
        5,
        1
    );

    private $money_bad = array(
        100,
        20,
        15,
        5,
        1
    );

    public function testIfMoneyCountIsLikeExpected()
    {
        $expected = 4;
        $money_count = new Money\MoneyExchange($this->money, 135);

        $this->assertEquals($expected, $money_count->getMoneyCount());
    }

    public function testIfMoneyCountIsNotLikeExpected()
    {
        $expected = 3;
        $money_count = new Money\MoneyExchange($this->money, 135);

        $this->assertNotEquals($expected, $money_count->getMoneyCount());
    }

    public function testIfMoneyCountIsZeroWhenArrayEmpty()
    {
        $expected = 0;
        $money = array();
        $money_count = new Money\MoneyExchange($money,135);

        $this->assertSame($expected, $money_count->getMoneyCount());
    }

    public function testIfMoneyIsArray()
    {
        $money_count = new Money\MoneyExchange($this->money, 135);
        $money = $this->getPrivateProperty('\Money\MoneyExchange', 'money');

        $this->assertTrue(is_array($money->getValue($money_count)));
    }

    public function testIfMoneyArrayIsEquals()
    {
        $money_count = new Money\MoneyExchange($this->money, 135);
        $money = $this->getPrivateProperty('\Money\MoneyExchange', 'money');

        $this->assertSame($this->money, $money->getValue($money_count));
    }

    public function testIfMoneyArrayIsNotEquals()
    {
        $money_count = new Money\MoneyExchange($this->money, 135);
        $money = $this->getPrivateProperty('\Money\MoneyExchange', 'money');

        $this->assertNotSame($this->money_bad, $money->getValue($money_count));
    }

    public function getPrivateProperty($className, $propertyName)
    {
        $reflector = new ReflectionClass($className);
        $property = $reflector->getProperty($propertyName);
        $property->setAccessible(true);

        return $property;
    }

    public function getPrivateMethod($className, $methodName)
    {
        $reflector = new \ReflectionClass($className);
        $method = $reflector->getMethod($methodName);
        $method->setAccessible(true);

        return $method;
    }
}