<?php

namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Product\Model\ProductRepositoryInterface;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;


class IndexController extends AbstractActionController
{
	/**
     * @var ProducttRepositoryInterface
     */
    private $productRepository;

    public function __construct( ProductRepositoryInterface $productRepository )
    {
        $this->productRepository = $productRepository;
    }

    public function indexAction()
    {
        return new ViewModel([
        	'products' => $this->productRepository->getProducts(),
        ]);
    }

    public function ajaxAction()
    {
        $jsonData = [];
        $request  = $this->getRequest();
        $query    = $request->getQuery();

        if($request->isXmlHttpRequest())
        {
            $id   = (int) $_POST['id'];
            $size = (string) $_POST['size'];

            foreach($this->productRepository->getArticleBySize( $id, $size ) as $value)
            {
                $jsonData['article'] = $value->getArticle();
            }

            if( empty($jsonData) )
            {
                $jsonData['article'] = 'The Product is not avalaible';
            }

            $view = new JsonModel($jsonData);
            $view->setTerminal(true);

            return $view;
        }

        return new ViewModel();
    }
}