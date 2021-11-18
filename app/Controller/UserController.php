<?php

class UserController extends ControllerPrototype
{
    // action<actionName>

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionView($params)
    {
        $data = [];

        if ($params)
        {
            $data['user'] = $params[0];
            $data['email'] = $params[1];
        }

        $this->render('view', $data);
    }
}
