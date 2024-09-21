<?php

include_once 'src/inputs/TextInput.php';
include_once 'src/form/Form.php';

use PHPUnit\Framework\TestCase;

final class FormTest extends TestCase {
    
    public function testValidateFormWhenFieldIsInvalid() {
        $arg = new Form();

        $nameInput = new TextInput("name", "Name", "");
        $arg->addInput($nameInput);

        $this->assertFalse($arg->validate());
        $this->assertSame($nameInput->getValue(), $arg->getValue($nameInput->name()));
    }

    public function testValidateFormWhenFieldIsValid() {
        $arg = new Form();

        $nameInput = new TextInput("name", "Name", "Jupiter");
        $emailInput = new TextInput("email", "Email", "jupiter@gmail.com");
        $arg->addInput($nameInput);
        $arg->addInput($emailInput);
        

        $this->assertTrue($arg->validate());
        $this->assertSame($nameInput->getValue(), $arg->getValue($nameInput->name()));
        $this->assertSame($emailInput->getValue(), $arg->getValue($emailInput->name()));
    }

    public function testGetValueWhenKeyIsNotSet() {
        $arg = new Form();
        
        $this->assertTrue($arg->validate());
        $this->assertNull($arg->getValue("non-ecziste"));
    }
}