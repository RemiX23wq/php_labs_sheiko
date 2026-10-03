<?php
interface AccountInterface {
    function deposit($amount);
    function withdraw($amount);
    function getBalance();
}

class BankAccount implements AccountInterface {
    const MIN_BALANCE = 0;
    
    public $balance;
    public $currency;

    function __construct($balance, $currency) {
        $this->balance = $balance;
        $this->currency = $currency;
    }

    function deposit($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума поповнення має бути більшою за нуль!");
        }
        $this->balance = $this->balance + $amount;
    }

    function withdraw($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума зняття має бути більшою за нуль!");
        }
        if (($this->balance - $amount) < self::MIN_BALANCE) {
            throw new Exception("Недостатньо коштів на рахунку!");
        }
        $this->balance = $this->balance - $amount;
    }

    function getBalance() {
        return $this->balance . " " . $this->currency;
    }
}

// Накопичувальний рахунок
class SavingsAccount extends BankAccount {
    public static $interestRate = 14;

    function applyInterest() {
        $bonus = ($this->balance * self::$interestRate) / 100;
        $this->balance = $this->balance + $bonus;
    }
}

try {
    echo "<b>1. Створюємо рахунок на 100 USD...</b><br>";
    $myAccount = new SavingsAccount(100, "USD");
    echo "Поточний баланс: " . $myAccount->getBalance() . "<br><br>";

    echo "<b>2. Поповнюємо на 50 USD...</b><br>";
    $myAccount->deposit(50);
    echo "Поточний баланс: " . $myAccount->getBalance() . "<br><br>";

    echo "<b>3. Знімаємо 30 USD...</b><br>";
    $myAccount->withdraw(30);
    echo "Поточний баланс: " . $myAccount->getBalance() . "<br><br>";

    echo "<b>4. Додаємо відсотки за накопичення (14%)...</b><br>";
    $myAccount->applyInterest();
    echo "Поточний баланс: " . $myAccount->getBalance() . "<br><br>";

    echo "<b>5. Пробуємо зняти 500 USD (перевірка на помилку)...</b><br>";
    $myAccount->withdraw(500);

} catch (Exception $e) {
    echo "<span style='color: red;'><b>Перехоплено виняток:</b> " . $e->getMessage() . "</span><br>";
}
?>