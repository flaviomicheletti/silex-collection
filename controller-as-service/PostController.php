<?php

class PostController {

    protected $app;

    public function __construct($app) {
        $this->app = $app;
    }

    public function index() {
        return 'posts index';
    }

    public function foo() {
        return 'foo';
    }

}
