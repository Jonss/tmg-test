<?php

include_once 'src/inputs/TextInput.php';
include_once 'src/form/Form.php';

use PHPUnit\Framework\TestCase;

final class FormTest extends TestCase 
{

    private Form $form;

    protected function setUp(): void
    {
        $this->form = new Form();
    }
    
    public function testValidateFormWhenFieldIsInvalid() 
    {
        $nameInput = new TextInput("name", "Name", "", "", [
            "required" => true
        ]);
        $this->form->addInput($nameInput);

        $this->assertFalse($this->form->validate());
        $this->assertSame($nameInput->getValue(), $this->form->getValue($nameInput->name()));
    }

    public function testValidateFormWhenFieldIsValid() 
    {
        $nameInput = new TextInput("name", "Name", "Jupiter");
        $emailInput = new TextInput("email", "Email", "jupiter@gmail.com");
        $this->form->addInput($nameInput);
        $this->form->addInput($emailInput);
        
        $this->assertTrue($this->form->validate());
        $this->assertSame($nameInput->getValue(), $this->form->getValue($nameInput->name()));
        $this->assertSame($emailInput->getValue(), $this->form->getValue($emailInput->name()));
    }

    public function testGetValueWhenKeyIsNotSet() 
    {
        $this->assertTrue($this->form->validate());
        $this->assertNull($this->form->getValue("non-ecziste"));
    }
}