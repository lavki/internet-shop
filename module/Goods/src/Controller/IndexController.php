<?php

namespace Goods\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Goods\Model\Goods;

class IndexController extends AbstractActionController
{
	public function indexAction()
	{
		$model = new Goods();
		echo '<pre>';
		print_r($model->getGoods());
		echo '</pre>';
		exit;
	}
}