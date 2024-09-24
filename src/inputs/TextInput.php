<?php
include_once 'Input.php';

class TextInput extends Input {

    /**
     * validates if initVal is empty
     */
    public function validate(): bool {
        return !empty($this->initVal);
    }

     /**
     * returns a text input
     */
    protected function renderSetting(): string {
        return '<input type="text" name="' . $this->name . '" value="' . $this->initVal . '" />';
    }

}