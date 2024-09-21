<?php
abstract class Input {
    protected $_name;
    protected $_label;
    protected $_initVal;

    abstract public function validate();
    abstract protected function _renderSetting();

    public function __construct($name, $label, $initVal) {
        //
    }

    /**
     * returns the name of this input
     */
    public function name() {
        // TODO
    }


    /**
     *  renders a row in the form for this input. All inputs have a label on the left, and an area on the right where the actual
     *  html form element is displayed (such as a text box, radio button, select, etc)
     */
    public function render() {
        // TODO
    }

    /**
     * returns the current value managed by this input
     */
    public function getValue() {
        // TODO
    }
}
