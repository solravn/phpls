<?php

class UserController extends ControllerPrototype
{
    // action<actionName>

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionView($id)
    {
        $data = [
            'user' => 'temka',
            'email' => 'ololo@mail.ru',
        ];

        $this->render('view', $data);
    }
}
