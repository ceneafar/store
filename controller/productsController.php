<?php
require_once('model/products.php');
require_once('view/productsView.php');

class ProductsController
{

    private $productView;
    private $productModel;

    public function __construct()
    {
        $this->productView = new productsView();
        $this->productModel = new Products();
    }

    public function index()
    {
        $result = $this->productModel->getProducts();
        $this->productView->showProducts($result);
        $this->productView->createProduct();
    }

    public function create_product(){
        $this->productModel->createProducts();
        header("Location: /store/index.php?nav=prop1");
    }
}
