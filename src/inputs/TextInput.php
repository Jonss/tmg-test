<?php
include_once 'Input.php';

class TextInput extends Input {

    /**
     * validates if initVal is empty
     */
    public function validate() {
        return !empty($this->_initVal);
    }

     /**
     * returns a text input
     */
    protected function _renderSetting() {
        return '<input type="text" name="' . $this->_name . '" value="' . $this->_initVal . '" />';
    }

}