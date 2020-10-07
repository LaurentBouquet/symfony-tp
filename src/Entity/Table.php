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

    public function getMin(){
        return $this->_min;            
    }

    public function getMax(){
        $this->_max;            
    }

    public function read(){
            
    }

    public function write(){
        
    }
    
    public function calcTable():array {
        $result = array();

        for ($i=$this->_min; $i <= $this->_max ; $i++) { 
            $result[$i] = $i * $this->_num;
        }

        return $result;
    }

}