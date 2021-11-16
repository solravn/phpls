<?php

class UserController extends ControllerPrototype
{
    // action<actionName>

    public function actionIndex($params)
    {
        $this->render('index',['id' => $params]);
    }

    public function actionView($id)
    {
        $this->render('view', $id);
    }
}
