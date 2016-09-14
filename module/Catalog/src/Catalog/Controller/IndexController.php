<?php

namespace Catalog\Controller;

use Catalog\Service\ProductServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    /**
     * @var ProductServiceInterface
     */
    protected $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function indexAction()
    {
        return new ViewModel(
            array(
                'products' => $this->productService->findAllProducts()
            )
        );
    }


}

