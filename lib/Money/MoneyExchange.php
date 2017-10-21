<?php

namespace Money;

class MoneyExchange
{
    private $money = array();
    private $money_sum = 0;
    private $money_count = 0;

    public function __construct(array $money, $money_sum)
    {
        if (is_int($money_sum)) {
            $this->money = $money;
            $this->money_sum = $money_sum;
        } else {
            echo('Įvedėte ne sveikąjį skaičių!');
        }
    }

    /**
     * @return int
     */
    public function getMoneyCount()
    {
        $sum_check = 0;
        $money = $this->money;

        if (!empty($money) && min($money) <= $this->money_sum) {
            while ($sum_check != $this->money_sum) {
                if (!empty($money)) {
                    $max_money_key = array_keys($money, max($money));
                    $dist = $this->money_sum - $sum_check;

                    if (($money[$max_money_key[0]] <= $this->money_sum && $money[$max_money_key[0]] <= $dist) && $dist != 0) {
                        $count = (int)($dist / $money[$max_money_key[0]]);
                        $sum_check += $money[$max_money_key[0]] * $count;
                        $this->money_count += $count;
                    }

                    unset($money[$max_money_key[0]]);
                }
            }
        }

        return $this->money_count;
    }

    /**
     * @return array
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @return int
     */
    public function getMoneySum()
    {
        return $this->money_sum;
    }
}