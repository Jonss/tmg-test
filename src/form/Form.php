<?php
class Form 
{

    protected $inputs;

    public function __construct() 
    {
        $this->inputs = [];
    }

    /**
     *  adds an input instance to the collection of inputs managed by this form object
     */
    public function addInput(Input $input): void 
    {
        $this->inputs[$input->name()] = $input;
    }

    /**
     *  iterates over all inputs managed by this form and returns false if any of them don't validate
     */
    public function validate(): bool 
    {
        foreach ($this->inputs as $input) 
        {
            if (!$input->validate()) 
            {
                return false;
            }
        }
        return true;
    }

    /**
     * returns the value of the input by $name
     */
    public function getValue($name): ?string 
    {
        return isset($this->inputs[$name]) ? $this->inputs[$name]->getValue() : null;
    }

    /**
     *  draws the outer form element, and the markup for each input, one input per row
     */
    public function display() {
        echo '<form method="POST">';
        foreach ($this->inputs as $input) 
        {
            echo $input->render();
        }
        echo '<input type="submit" value="Submit" />';
        echo '</form>';
    }
}
