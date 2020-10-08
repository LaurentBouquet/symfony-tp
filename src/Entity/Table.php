<?php

namespace App\Entity;

use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Table
{

    private $_num;
    private $_min;
    private $_max;

    public function __construct($num = null, $min = 0, $max = 20)
    {
        $this->_num = $num;
        $this->_min = $min;
        $this->_max = $max;
    }


    public function getNum()
    {
        return $this->_num;
    }

    public function getMin()
    {
        return $this->_min;
    }

    public function getMax()
    {
        $this->_max;
    }

    public function read(Request $request)
    {        
        $this->_num = $request->cookies->get('table_num');
        return $this->_num;
    }

    public function write()
    {
        $cookie_num = new Cookie('table_num', $this->_num);
        $reponse = new Response();
        $reponse->headers->setCookie($cookie_num);
        $reponse->send();
    }

    public function calcTable(): array
    {
        $result = array();

        for ($i = $this->_min; $i <= $this->_max; $i++) {
            $result[$i] = $i * $this->_num;
        }

        return $result;
    }
}
