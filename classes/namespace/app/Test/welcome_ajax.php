<?php

namespace App\Test;

class welcome_ajax extends \Jaxon\CallableClass
{
    public function index()
    {
        $this->response->assign('testtom','innerHTML','HALLLO');
        return $this->response;
    }
}
