<?php
require_once('model/customer.php');
require_once('view/customerView.php');

class CustomerController
{
    private $customerView;
    private $customerModel;

    public function __construct()
    {
        $this->customerView = new CustomerView();
        $this->customerModel = new Customer();
    }

    public function showCustomers()
    {
        $customerList = $this->customerModel->getCustomers();
        $this->customerView->showCustomers($customerList);
        $this->customerView->createCustomer();
    }

    public function createCustomer()
    {
        $this->customerModel->createCustomer();
        header("Location: /store/index.php?nav=clients");
    }
}
