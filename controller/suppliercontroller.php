<?php

require_once('model/supplier.php');
require_once('view/supplierView.php');

class SupplierController
{
    private $supplierModel;
    private $supplierView;

    public function __construct()
    {
        $this->supplierModel = new Supplier();
        $this->supplierView = new SupplierView();
    }

    public function showSupplierView()
    {
        $this->supplierView->showSupplierForm();
        //header("Location: /store/index.php?nav=supplier");
    }
}
