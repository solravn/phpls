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
        $conn = new PDO('pgsql:dbname=dev;host=postgres', 'dev', '123');

        $statement = $conn->prepare("SELECT id, email FROM tbl_user WHERE id = :id");
        $statement->execute(['id' => $id]);
        $result = $statement->fetch();

        if (empty($result))
        {
            throw new Exception("User <$id> not found.");
        }

        $this->renderTwig('view', [
            'user' => 'temka',
            'email' => $result['email'],
        ]);
    }
}
