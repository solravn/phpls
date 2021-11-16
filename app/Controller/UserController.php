<?php

class UserController extends ControllerPrototype
{
    // action<actionName>

    public function actionIndex($params)
    {
        if (is_null($params)) {
            $this->render('index',['id' => 'Неизвестно']);
        } else {
            $this->render('index',['id' => $params]);
        }

    }

    public function actionView($id)
    {
        $this->render('view', $id);
    }
}
