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
        $this->invoiceView->showInvoiceForm($customerList);
    }
}
