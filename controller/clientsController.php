<?php
require_once('model/clients.php');
require_once('view/clientsView.php');

class ProductsController
{

    private $clientsView;
    private $clientsModel;

    public function __construct()
    {
        $this->clientsView = new clientsView();
        $this->clientsModel = new Clients();
    }

    public function index()
    {
        $result = $this->productModel->getProducts();
        $this->clientsView->showClients($result);
        $this->clientsModel->createClients();
    }

    public function create_client()
    {
        $this->clientsModel->createClients();
        header("Location: /store/index.php?nav=clients");
    }
}
