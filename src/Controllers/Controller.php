<?php

namespace Test\Controllers;


use Test\Validator;

abstract class Controller {
    protected Validator $validator;

    public function __construct() {
        $this->validator = new Validator();
    }
}
