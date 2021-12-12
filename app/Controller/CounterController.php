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
            $this->renderTwigError('0,Takogo countera net');
        } else {
            $this->renderTwig('view',[
                'counterName' => $counter['name'],
                'value'       => $counter['value']
            ]);
        }
    }

    public function actionIncrease($counterName)
    {
        $counter = Counter::increaseCounter($counterName);

        if(empty($counterName)) {
            $this->renderTwigError('Укажите название счетчика');
        } else {
            $this->renderTwig('increase');
        }
    }
}