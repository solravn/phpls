<?php

namespace App\Controller;

use App\Core\BaseController;
use App\Model\Counter;

class CounterController extends BaseController
{
    public function actionIndex()
    {
        $this->renderTwig('index');
    }

    public function actionView($counterName)
    {
        $counter = Counter::findByName($counterName);


//        $this->renderTwig('view',[
//            'counterName' => $counterName
//        ]);
    }
}