<?php

class TestXpathValidation extends PHPUnit_Framework_TestCase
{

    public function testValidationSucceeds()
    {
        $validator = new \Magium\Validate\Xpath\XpathValidator();
        /* The validation test does not have a node called "div".  But our concern is only with valid Xpath, not
         * query return values
         */
        self::assertTrue($validator->isValid('//div'));
    }

    public function testValidationFails()
    {
        $validator = new \Magium\Validate\Xpath\XpathValidator();
        self::assertFalse($validator->isValid('invalid xpath'));
    }

    public function testErrorMessageContainsXpathAndError()
    {
        $validator = new \Magium\Validate\Xpath\XpathValidator();
        self::assertFalse($validator->isValid('broken xpath'));
        $messages = $validator->getMessages();
        self::assertContains('broken xpath', $messages[\Magium\Validate\Xpath\XpathValidator::INVALID]);
        self::assertContains('Invalid Xpath', $messages[\Magium\Validate\Xpath\XpathValidator::INVALID]);
    }

}