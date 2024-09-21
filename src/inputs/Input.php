<?php
abstract class Input {
    protected $_name;
    protected $_label;
    protected $_initVal;

    abstract public function validate();
    abstract protected function _renderSetting();

    public function __construct($name, $label, $initVal) {
        $this->_name = $name;
        $this->_label = $label;
        $this->_initVal = $initVal;
    }

    /**
     * returns the name of this input
     */
    public function name() {
        return $this->_name;
    }

    /**
     *  renders a row in the form for this input. All inputs have a label on the left, and an area on the right where the actual
     *  html form element is displayed (such as a text box, radio button, select, etc)
     */
    public function render() {
        return '<div>'
            . '<label for="' . $this->_name . '">' . $this->_label . '</label>'
            . $this->_renderSetting()
            . '</div>';
    }

    /**
     * returns the current value managed by this input
     */
    public function getValue() {
       return $this->_initVal;
    }
}
