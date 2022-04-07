# 🔮**Basic PHP operations**🔮
* ## **Task 1 description**
    ****
    Create a FormBuilder class that will allow you to generate an HTML form. For example, this use of your class:</br>
        $formBuilder = new FormBuilder(FormBuilder::METHOD_POST, '/destination.php', 'Send!');
        $formBuilder->addTextField('someName', 'Default value');
        $formBuilder->addRadioGroup('someRadioName', ['A', 'B']);
        $formBuilder->getForm();

* ## **Task 2 description**
    ****
    Create a SafeFormBuilder class, inherited from the FormBuilder class from the first task, which will parse the $_POST and $_GET superglobals and (if there is data received from the previous form submission) generate default values for the corresponding fields. For example, if your form has an input field, and the $_POST superglobal has someName element with value "ABC".


* ## **Task 3 description**
    ****
    Create a Logger class that, when creating an object, will allow you to specify whether to display a message on the screen or in a file, and will also add a date and time to each message (at the beginning).

* ## **Task 4 description**
    ****
    Create a SmartDate class that, when creating an object, would receive a date value and for this date could determine: whether this day is a day off (Sat, Sun); the distance in specified units of time between this day and today; whether the year the date belongs to is a leap year.


* ## **Task 5 description**
    ****
    Create a CryptoManager class that would allow you to encrypt and decrypt the transmitted text; the encryption algorithm and password must be passed to the constructor.
 

