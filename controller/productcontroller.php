<?php
require_once('model/product.php');
require_once('view/productView.php');

class ProductController
{
    private $productView;
    private $productModel;

    public function __construct()
    {
        $this->productView = new productView();
        $this->productModel = new product();
    }

    public function showProducts()
    {
        $productsList = $this->productModel->getProducts();
        $this->productView->showProducts($productsList);
        $this->productView->createProduct();
    }

    public function createProduct()
    {
        $this->productModel->createProduct();
        header("Location: /store/index.php?nav=products");
    }

    public function editProduct()
    {
        $this->productModel->editProduct();
        header("Location: /store/index.php?nav=products");
    }

    public function deleteProduct()
    {
        $this->productModel->deleteProduct();
        header("Location: /store/index.php?nav=products");
    }
}
