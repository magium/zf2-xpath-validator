# ZF2 Xpath validator

This is a simple ZF2 componente that will validate that an Xpath expression is valid, not that it will return certain data. Checkout the [test cases](blob/master/tests/TestXpathValidation.php) to see how to use it.

Or, look here:

```
$validator = new \Magium\Validate\Xpath\XpathValidator();
$validator->isValid('//div'); // returns true
```

or 
```
$validator = new \Magium\Validate\Xpath\XpathValidator();
$validator->isValid('invalid xpath'); // returns false
```
