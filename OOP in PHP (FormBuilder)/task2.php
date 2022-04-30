<?php
error_reporting(0);

require_once("SafeFormBuilder.php");
$form = new SafeFormBuilder(FormBuilder::METHOD_GET, "task_2.html", "send");
$form->addTextField("text", "2");
$form->addRadioGroup("radioGroup", ["A","B","C"], true);
$form->analyseGetArray();
$form->analysePostArray();
$form->getForm();