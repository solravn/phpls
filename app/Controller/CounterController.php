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

        if(empty($counter)) {
//            $this->render('view',[
//                'counterName' => 'Такого счетчика нет',
//                'value'       => 0
//            ]);
            $this->renderTwigError('0,Takogo countera net');
        } else {
            $this->renderTwig('view',[
                'counterName' => $counter['name'],
                'value'       => $counter['value']
            ]);
        }



    }
}