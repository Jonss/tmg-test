<?php

include_once 'src/inputs/TextInput.php';

use PHPUnit\Framework\TestCase;

final class TextInputTest extends TestCase {
    
    public function testValidateEmptyInputValue() {
        $arg = new TextInput("my_field", "My field", "");

        $expectedRender = '<div><label for="my_field">My field</label><input type="text" name="my_field" value="" /></div>';
        $expectedValue = '';
        $expectedName = 'my_field';

        $this->assertFalse($arg->validate());
        $this->assertSame($expectedRender, $arg->render());
        $this->assertSame($expectedValue, $arg->getValue());
        $this->assertSame($expectedName, $arg->name());
    }

    public function testValidateCompletedInputValue() {
        $arg = new TextInput("name", "Name", "Jupiter");

        $expectedRender = '<div><label for="name">Name</label><input type="text" name="name" value="Jupiter" /></div>';
        $expectedValue = 'Jupiter';
        $expectedName = 'name';

        $this->assertTrue($arg->validate());
        $this->assertSame($expectedRender, $arg->render());
        $this->assertSame($expectedValue, $arg->getValue());
        $this->assertSame($expectedName, $arg->name());
    }
}