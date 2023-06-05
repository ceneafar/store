<?php
require_once('model/purchase.php');
require_once('model/supplier.php');
require_once('view/purchaseview.php');

class PurchaseController
{
    private $purchaseView;
    private $purchaseModel;
    private $supplierModel;
    private $productModel;

    public function __construct()
    {
        $this->purchaseView = new PurchaseView();
        $this->purchaseModel = new Purchase();
        $this->supplierModel = new Supplier();
        $this->productModel = new Product();
    }


    public function showPurchaseForm()
    {
        $productList  = $this->productModel->getProducts();
        $supplierList = $this->supplierModel->getSuppliers();
        
        $this->purchaseView->showPurchaseForm($supplierList, $productList);
    }
}
