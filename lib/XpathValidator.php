<?php

namespace Magium\Validate\Xpath;

use Zend\Validator\AbstractValidator;

class XpathValidator extends AbstractValidator
{
    const INVALID        = 'xpathInvalid';

    protected $messageTemplates = [
        self::INVALID      => "Invalid Xpath (%value%) provided.  Error: %message%",

    ];

    /**
     * @var array
     */
    protected $messageVariables = [
        'message' => 'message'
    ];

    protected $message = '';

    public function isValid($value)
    {
        try {
            $this->setValue($value);
            $doc = new \DOMDocument();
            $doc->loadXML('<test />');
            $xpath = new \DOMXPath($doc);
            $xpath->query($value);

        } catch (\Exception $e) {
            $this->message = $e->getMessage();
            $this->error(self::INVALID);
            return false;
        }
        return true;
    }
}