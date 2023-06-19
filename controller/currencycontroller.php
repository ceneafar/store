<?php
require_once('model/currency.php');
require_once('view/currencyView.php');

class CurrencyController
{
    private $currencyView;
    private $currencyModel;

    public function __construct()
    {
        $this->currencyModel = new Currency();
        $this->currencyView = new CurrencyView();
    }

    public function showCurrencyView()
    {
        $this->currencyView->showCurrencyRate();
        $this->currencyView->showPaymentMethods();
        $list = $this->currencyModel->getPaymentMethods();
        $this->currencyView->showPaymentMethodsList($list);
    }

    public function createPaymentMethod()
    {
        $this->currencyModel->createPaymentMethod();
        header("Location: /store/index.php?nav=currency");
    }
}
