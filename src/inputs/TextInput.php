<?php
include_once 'Input.php';

class TextInput extends Input 
{
    /**
     * validates if initVal is empty
     */
    public function validate(): bool 
    {
        foreach ($this->rules as $rule => $ruleValue) {
            switch ($rule) {
                case 'required':
                    if (empty($this->getValue())) {
                        return false;
                    }
                    break;
                case 'min-length':
                    if (strlen($this->getValue()) < $ruleValue) {
                        return false;
                    }
                    break;
                case 'max-length':
                    if (strlen($this->getValue()) > $ruleValue) {
                        return false;
                    }
                    break;
                case 'min-value':
                    if ($this->getValue() < $ruleValue) {
                        return false;
                    }
                    break;
                case 'max-value':
                    if ($this->getValue() > $ruleValue) {
                        return false;
                    }
                    break;
            }
        }
        return true;
    }

     /**
     * returns a text input
     */
    protected function renderSetting(): string 
    {
        return '<input type="'. $this->type . '" name="' . $this->name . '" value="' . $this->initVal . '" />';
    }

}