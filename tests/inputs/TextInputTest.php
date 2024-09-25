<?php

include_once 'src/inputs/TextInput.php';

use PHPUnit\Framework\TestCase;

final class TextInputTest extends TestCase
{
    
    public function testRenderEmptyInputValue()
    {
        $arg = new TextInput("my_field", "My field", "");

        $expectedRender = '<div><label for="my_field">My field</label><input type="text" name="my_field" value="" /></div>';
        $expectedValue = '';
        $expectedName = 'my_field';

        // $this->assertFalse($arg->validate());
        $this->assertSame($expectedRender, $arg->render());
        $this->assertSame($expectedValue, $arg->getValue());
        $this->assertSame($expectedName, $arg->name());
    }

    public function testRenderCompletedInputValue()
    {
        $arg = new TextInput("name", "Name", "Jupiter", "");

        $expectedRender = '<div><label for="name">Name</label><input type="text" name="name" value="Jupiter" /></div>';
        $expectedValue = 'Jupiter';
        $expectedName = 'name';

        $this->assertSame($expectedRender, $arg->render());
        $this->assertSame($expectedValue, $arg->getValue());
        $this->assertSame($expectedName, $arg->name());
    }

    public function testValidateMinAndMaxLengthOnTextInput()
    {
        $arg = new TextInput("name", "Name", "Jupiter", "text", [
            'max-length' => 20,
            'min-length' => 5,
        ]);

        $this->assertTrue($arg->validate());
    }

    public function testShouldValidateMinAndMaxLengthOnTextInput()
    {
        $arg = new TextInput("state", "State", "SP", "text", [
            'max-length' => 2,
            'min-length' => 2,
        ]);

        $this->assertTrue($arg->validate());
    }

    public function testShouldNotValidateMinAndMaxLengthOnTextInput()
    {
        $arg = new TextInput("state", "State", "SSP", "text", [
            'max-length' => 2,
            'min-length' => 2,
        ]);

        $this->assertFalse($arg->validate());
    }

    public function testShouldNotValidateEmptyTextInput()
    {
        $arg = new TextInput("name", "Name", "", "text", [
            'required' => true,
        ]);

        $this->assertFalse($arg->validate());
    }

    public function testValidateMinAndMaxValueOnTextInputWithNumberType()
    {
        $arg = new TextInput("name", "Name", "8", "number", [
            'max-value' => 10,
            'min-value' => 5,
        ]);

        $this->assertTrue($arg->validate());
    }
}