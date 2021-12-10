<?php

namespace App\Controller;

use App\Core\BaseController;
use App\Model\User;

class UserController extends BaseController
{
    public function actionIndex()
    {
        $this->render('index');
    }

    // MVC: controller
    public function actionView($id)
    {
        // MVC: model
        /** @var User $user */
        $user = User::findById($id);

        if (empty($user))
        {
            throw new Exception("User <$id> not found.");
        }

        // MVC: view
        $this->renderTwig('view', [
            'user' => $user,
        ]);
    }
}
