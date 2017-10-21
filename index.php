<?php
require __DIR__.'/vendor/autoload.php';

use \Money\MoneyExchange;

if (isset($argv[1])) {
    $money = array(
        100,
        50,
        20,
        10,
        5,
        1
    );
    $money_sum = (int)$argv[1];

    $money_count = new MoneyExchange($money, $money_sum);
    echo $money_count->getMoneyCount();
} else {
    echo 'Įveskite sveikąjį skaičių!';
}
