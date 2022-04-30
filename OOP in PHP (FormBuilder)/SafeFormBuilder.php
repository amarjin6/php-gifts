<?php

require_once("FormBuilder.php");

class SafeFormBuilder extends FormBuilder
{
    public function analyseGetArray()
    {
        if ($this->method == parent::METHOD_GET) {
            foreach ($this->textList as &$el) {
                $el->textValue = !empty($_GET[$el->textName]) ? $_GET[$el->textName] : $el->textValue;
            }
            foreach ($this->radioGroupList as &$group) {
                foreach ($group->values as $value) {
                    if ($value == $_GET[$group->groupName]) {
                        $group->checkedEl = $value;
                    }
                }
            }
        }
    }

    public function analysePostArray()
    {
        if ($this->method == parent::METHOD_POST) {
            foreach ($this->textList as &$el) {
                $el->textValue = !empty($_POST[$el->textName]) ? $_POST[$el->textName] : $el->textValue;
            }
            foreach ($this->radioGroupList as &$group) {
                foreach ($group->values as $val) {
                    if ($val == $_POST[$group->groupName]) {
                        $group->checkedEl = $val;
                    }
                }
            }
        }
    }
}
