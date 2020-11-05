<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;


final class UserValidatorTest extends TestCase
{
    public function testIsEmptyEmail()
    {
        $validator = new \App\Service\FormLoginValidator([]);

        $this->assertFalse($validator->email());
    }

    public function testIsInvalidEmail()
    {
        $validator = new \App\Service\FormLoginValidator(['email' => 'q23wqws2']);

        $this->assertFalse($validator->email());
    }

    public function testIsInvalidSecondEmail()
    {
        $validator = new \App\Service\FormLoginValidator(['email' => 'q23w@qws2']);

        $this->assertFalse($validator->email());
    }

    public function testIsValidEmail()
    {
        $validator = new \App\Service\FormLoginValidator(['email' => 'q2xcv3w@qws']);

        $this->assertTrue($validator->email());
    }

    public function testIsEmptyPsw()
    {
        $validator = new \App\Service\FormLoginValidator(['email' => 'q2xcv3w@qws']);

        $this->assertFalse($validator->psw());
    }

    public function testIsShortPsw()
    {
        $validator = new \App\Service\FormLoginValidator(['email' => 'q2xcv3w@qws', 'psw' => '1232']);

        $this->assertFalse($validator->psw());
    }

    public function testIsShortPswSecond()
    {
        $validator = new \App\Service\FormLoginValidator(['email' => 'q2xcv3w@qws', 'psw' => 'ывав']);

        $this->assertFalse($validator->psw());
    }

    public function testIsIssetInPswExclamationMark()
    {
        $validator = new \App\Service\FormLoginValidator(['email' => 'q2xcv3w@qws', 'psw' => 'ывав4534']);

        $this->assertFalse($validator->psw());
    }

    public function testValidPsw()
    {
        $validator = new \App\Service\FormLoginValidator(['email' => 'q2xcv3w@qws', 'psw' => 'ывав453!4']);

        $this->assertTrue($validator->psw());
    }

}