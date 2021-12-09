<?php

class SiteController extends ControllerPrototype
{
    // action<$actionName>()

    public function actionIndex()
    {
        $this->renderTwig('index');
    }
}
