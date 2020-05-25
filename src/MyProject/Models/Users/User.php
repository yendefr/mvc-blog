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

    /** @var bool */
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

    public static function signUp(array $userData): User
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
        if (mb_strlen($userData['password']) < 6)
        {
            throw new InvalidArgumentException('Пароль должен содержать не менее 6 символов');
        }

        # Регистрация пользователя
        $user = new User();
        $user->nickname = $userData['nickname'];
        $user->email = $userData['email'];
        $user->passwordHash = password_hash($userData['password'], PASSWORD_DEFAULT);
        $user->isConfirmed = false;
        $user->role = 'user';
        $user->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
        $user->save();

        return $user;
    }

    public function activate(): void
    {
        $this->isConfirmed = True;
        $this->save();
    }

    protected static function getTableName(): string
    {
        return 'users';
    }
}