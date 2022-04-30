<?php

class FormBuilder
{
    const METHOD_GET = 0;
    const METHOD_POST = 1;

    public function __construct(public int    $method,
                                public string $target,
                                public string $button_value)
    {
    }

    protected array $textList = array();

    public function addTextField($textName, $textValue)
    {
        $this->textList[] = new TextField($textName, $textValue);
    }

    protected array $radioGroupList = array();

    public function addRadioGroup($groupName, $values, $checkFirst = false)
    {
        $this->radioGroupList[] = new RadioGroup($groupName, $values, $checkFirst);
    }

    public function getForm()
    {
        $data = "<form method=\"" . $this->method . "\" target=\"" . $this->target . "\">\n";
        foreach ($this->textList as $el) {
            $data = $data . "\t<input type=\"text\" name=\"" . $el->textName . "\" value =\"" . $el->textValue . "\" />\n";
        }
        foreach ($this->radioGroupList as $el) {
            foreach ($el->values as $val) {
                $data = $data . "\t<input type=\"radio\" name=\"" . $el->groupName . "\" value =\"" . $val . "\" ";
                if ($val == $el->checkedEl) {
                    $data = $data . "checked ";
                }
                $data = $data . "/>\n";
            }
        }
        $data = $data . "\t<input type=\"submit\" value=\"" . $this->button_value . "\" />\n";
        $data = $data . "</form>";
        file_put_contents($this->target, $data);
        echo $data;
    }
}

class TextField
{
    public function __construct(public string $textName,
                                public string $textValue)
    {
    }
}

class RadioGroup
{
    public string $checkedEl = "";

    public function __construct(public string $groupName,
                                public array  $values,
                                private bool  $checkFirst)
    {
        if (isset($this->values[0]) && $this->checkFirst) {
            $this->checkedEl = ($this->values[0]);
        }
    }
}
