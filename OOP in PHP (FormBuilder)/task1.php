<?php
require_once("FormBuilder.php");

$form = new FormBuilder(FormBuilder::METHOD_GET, "task_1.html", "send");
$form->addTextField("Task", "1");
$form->addRadioGroup("radioGroup", ["A", "B", "C", "D"]);
$form->getForm();
