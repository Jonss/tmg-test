<?php
class Form {

    protected $_inputs;

    public function __construct() {
        // TODO
    }

    /**
     *  adds an input instance to the collection of inputs managed by this form object
     */
    public function addInput(Input $input) {
        // TODO
    }

    /**
     *  iterates over all inputs managed by this form and returns false if any of them don't validate
     */
    public function validate() {
        // TODO
    }

    /**
     * returns the value of the input by $name
     */
    public function getValue($name) {
        // TODO
    }

    /**
     *  draws the outer form element, and the markup for each input, one input per row
     */
    public function display() {
        echo '<p>Hello World</p>';
    }
}
