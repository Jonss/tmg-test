<?php
abstract class Input {
    protected $name;
    protected $label;
    protected $initVal;
    protected $type;
    protected $rules = [];

    abstract public function validate(): bool;
    abstract protected function renderSetting(): string;

    public function __construct($name, $label, $initVal, $type = "", array $rules = []) 
    {
        $this->name = $name;
        $this->label = $label;
        $this->initVal = $initVal;
        $this->type = $type ? $type : "text";
        $this->rules = $rules;
    }

    /**
     * returns the name of this input
     */
    public function name(): string {
        return $this->name;
    }

    /**
     *  renders a row in the form for this input. All inputs have a label on the left, and an area on the right where the actual
     *  html form element is displayed (such as a text box, radio button, select, etc)
     */
    public function render(): string 
    {
        return '<div>'
            . '<label for="' . $this->name . '">' . $this->label . '</label>'
            . $this->renderSetting()
            . '</div>';
    }

    /**
     * returns the current value managed by this input
     */
    public function getValue(): string 
    {
       if(isset($_POST[$this->name])) 
       {
            return $_POST[$this->name];
       }
       return $this->initVal;
    }
}
