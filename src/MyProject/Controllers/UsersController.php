<?php


namespace MyProject\Controllers;


use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Models\Users\User;
use MyProject\Models\Users\UserActivationService;
use MyProject\Services\EmailSender;
use MyProject\Services\UsersAuthService;

class UsersController extends AbstractController
{
    # Регистрация
    public function signUp()
    {
        if (! empty($_POST))
        {
            try {
                $user = User::signUp($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/signUp.php', ['error' => $e->getMessage()]);
                return;
            }

            if ($user instanceof User){
                $code = UserActivationService::createActivationCode($user);
                EmailSender::send($user, 'Активация аккаунта', 'userActivation.php', [
                    'userId' => $user->getId(),
                    'code' => $code,
                ]);

                $this->view->renderHtml('users/signIn.php');
                return;
            }
        }

        $this->view->renderHtml('users/signUp.php');
    }

    # Вход в аккаунт
    public function signIn()
    {
        if (!empty($_POST)){
            try {
                $user = User::signIn($_POST);
                UsersAuthService::createToken($user);
                header('Location: '. $this->url);
                exit();
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/signIn.php', ['error' => $e->getMessage()]);
                return;
            }
        }
        $this->view->renderHtml('users/signIn.php');
    }

    # Выход из аккаунта
    public function signOut()
    {
        setcookie('token', '', 0, '/', '', false, true);

        header( 'Location: ' . $this->url . 'login');
    }

    public function activate(int $userId, string $activationCode)
    {
        $user = User::getById($userId);
        $isCodeValid = UserActivationService::checkActivationCode($user, $activationCode);
        if ($isCodeValid)
        {
            $user->activate();
            $this->view->renderHtml('users/userActivationSuccessful.php');
        } else
        {
            throw new NotFoundException('Ссылка активации не действительна');
        }
    }
}