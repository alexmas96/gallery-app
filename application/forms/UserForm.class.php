<?php
class UserForm extends Form
{
    public function build()
    {
        $this->addFormField("firstname");
        $this->addFormField("email");
        $this->addFormField("pass");
    }

}
