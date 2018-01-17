<?php

namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Product\Model\ProductRepositoryInterface;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
	/**
     * @var ProducttRepositoryInterface
     */
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function indexAction()
    {
        return new ViewModel([
        	'products' => $this->productRepository->findAllProducts(),
            'sizes' => $this->productRepository,
        ]);
    }
}