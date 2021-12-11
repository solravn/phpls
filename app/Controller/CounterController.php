<?php

namespace App\Controller;

use App\Core\BaseController;

class CounterController extends BaseController
{
    public function actionIndex()
    {
        $this->renderTwig('index');
    }

    public function actionView($id)
    {
        $this->renderTwig('view',[
            'id' => $id
        ]);
    }
}