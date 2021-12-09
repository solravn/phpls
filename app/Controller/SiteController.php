<?php

use App\Core\BaseController;

class SiteController extends BaseController
{
    // action<$actionName>()

    public function actionIndex()
    {
        $this->renderTwig('index');
    }
}
