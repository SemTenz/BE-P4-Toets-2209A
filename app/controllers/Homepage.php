<?php

class Homepage extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Homepagina'
        ];
    
        $this->view('Homepage/index', $data);
    }
}