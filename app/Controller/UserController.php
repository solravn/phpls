<?php

class UserController extends ControllerPrototype
{
    // action<actionName>

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionView()
    {
        $this->render('view', [
            'user' => 'temka',
            'email' => 'ololo@mail.ru',
        ]);
    }
}
