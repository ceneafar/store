<?php
require_once('model/invoice.php');
require_once('view/invoiceview.php');

class InvoiceController
{
    private $invoiceModel;
    private $invoiceView;

    public function __construct()
    {
        $this->invoiceModel = new Invoice();
        $this->invoiceView = new InvoiceView();
    }

    public function showInvoiceForm()
    {
        $customerList = $this->invoiceModel->getCustomerList();
        $productList = $this->invoiceModel->getProductList();
        $this->invoiceView->showInvoiceForm($customerList, $productList);
    }

    public function showAddProductForm(){       
        $this->invoiceView->showAddProductForm();
        session_start();
        require_once("./view/login.php");
    }

    public function showAddPaymentForm(){
        $this->invoiceView->showAddPaymentForm();
        session_start();
        require_once("./view/login.php");
    }
}
