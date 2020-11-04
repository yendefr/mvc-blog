<?php


namespace MyProject\Models\Users;


use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
    /** @var string */
    protected $nickname;

    /** @var string */
    protected $email;

    /** @var int */
    protected $isConfirmed;

    /** @var string */
    protected $role;

    /** @var string */
    protected $passwordHash;

    /** @var string */
    protected $authToken;

    /** @var string */
    protected $createdAt;

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    /**
     * @return string
     */
    public function getAuthToken(): string
    {
        return $this->authToken;
    }

    public static function signUp(array $userData): ?User
    {
        # Валидация никнейма
        if (empty($userData['nickname']))
        {
            throw new InvalidArgumentException('Введите никнейм');
        }
        if (!preg_match('/^(\w)+$/', $userData['nickname'])) // паттерн эквивалентен /^[a-zA-Z0-9_]+$/
        {
            throw new InvalidArgumentException(
                'Никнейм может содержать только буквы латинского алфавита, цифры и знаки подчёркивания'
            );
        }
        if (static::findOneByColumn('nickname', $userData['nickname']) !== null)
        {
            throw new InvalidArgumentException('Никнейм занят');
        }

        # Валидация почты
        if (empty($userData['email']))
        {
            throw new InvalidArgumentException('Введите почту');
        }
        if (! filter_var($userData['email'], FILTER_VALIDATE_EMAIL))
        {
            throw new InvalidArgumentException('Почта должна быть корректной');
        }
        if (static::findOneByColumn('email', $userData['email']) !== null)
        {
            throw new InvalidArgumentException('Почта занята');
        }

        # Валидация пароля
        if (empty($userData['password']))
        {
            throw new InvalidArgumentException('Введите пароль');
        }
        if (strlen($userData['password']) < 6)
        {
            throw new InvalidArgumentException('Пароль должен содержать не менее 6 символов');
        }

        # Регистрация пользователя
        $user = new User();
        $user->nickname = $userData['nickname'];
        $user->email = $userData['email'];
        $user->passwordHash = password_hash($userData['password'], PASSWORD_DEFAULT);
        $user->isConfirmed = 1;
        $user->role = 'user';
        $user->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
        $user->save();

        return $user;
    }

    public static function signIn(array $loginData): User
    {
        # Проверка наличия данных полей
        if (empty($loginData['email']))
        {
            throw new InvalidArgumentException('Введите почту');
        }
        if (empty($loginData['password']))
        {
            throw new InvalidArgumentException('Введите пароль');
        }

        # Проверка данных в БД
        $user = User::findOneByColumn('email', $loginData['email']);
        if ($user === null)
        {
            throw new InvalidArgumentException('Пользователя с такой почтой не существует');
        }
        if (! password_verify($loginData['password'], $user->getPasswordHash()))
        {
            throw new InvalidArgumentException('Неверный пароль');
        }
        if (! $user->isConfirmed){
            throw new InvalidArgumentException('Пользователь не подтверждён');
        }

        $user->refreshAuthToken();
        $user->save();

        return $user;
    }

    private function refreshAuthToken()
    {
        $this->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
    }

    public function activate(): void
    {
        $this->isConfirmed = 1;
        $this->save();
    }

    protected static function getTableName(): string
    {
        return 'users';
    }
}