<?php

class UserController extends ControllerPrototype
{
    // action<actionName>

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionIndex2($id)
    {
        $this->render('index2',['KEK'  => 'ti loh',
                                    'ildar' => 'ne loh']);
    }

    public function actionView($id)
    {
        $this->render('view', $id);
    }
}
