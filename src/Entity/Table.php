<?php

namespace App\Entity;


class Table {

    private $_num;
    private $_min;
    private $_max;

    public function __construct($num, $min=0, $max=20){
        $this->_num = $num;
        $this->_min = $min;
        $this->_max = $max;
    }

    public function read(){
            
    }

    public function write(){
        
    }
    
    public function calcTable() {


    }

}