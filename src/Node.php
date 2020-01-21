<?php 

namespace Heapsort\Heapsort;

class Node
{
    private $_i; 

    public function __construct($key)
    {
        $this->_i = $key;
    }

    public function getKey()
    {
        return $this->_i;
    }
}
