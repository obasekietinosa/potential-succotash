<?php

namespace Heapsort\Heapsort;

class Heap
{
    private $heap_Array;
    private $_current_Size;

    public function __construct()
    {
        $heap_Array = array();
        $this->_current_Size = 0;
    }

    // Remove item with max key 
    public function remove()
    {
        $root = $this->heap_Array[0];
        // put last element into root
        $this->heap_Array[0] = $this->heap_Array[--$this->_current_Size];
        $this->bubbleDown(0); 
        return $root; 
    }

    // Shift process
    public function bubbleDown($index)
    {
        $larger_Child = null;
        $top = $this->heap_Array[$index]; // save root
        while ($index < (int)($this->_current_Size/2)) { // not on bottom row
            $leftChild = 2 * $index + 1;
            $rightChild = $leftChild + 1;

            // find larger child
            if (
                $rightChild < $this->_current_Size &&
                $this->heap_Array[$leftChild] < $this->heap_Array[$rightChild]
            ) // right child exists?
            {
                $larger_Child = $rightChild;
            } else {
                $larger_Child = $leftChild;
            }

            if ($top->getKey() >= $this->heap_Array[$larger_Child]->getKey()) {
                break;
            }

            // shift child up
            $this->heap_Array[$index] = $this->heap_Array[$larger_Child]; 
            $index = $larger_Child; // go down
        }

        $this->heap_Array[$index] = $top; // root to index
    }

    public function insertAt($index, Node $newNode)
    {
        $this->heap_Array[$index] = $newNode;
    }

    public function incrementSize()
    {
        $this->_current_Size++;
    }

    public function getSize()
    {
        return $this->_current_Size;
    }

    public function asArray()
    {
        $arr = array();
        for ($j = 0; $j < sizeof($this->heap_Array); $j++) {
        $arr[] = $this->heap_Array[$j]->getKey();
        }

        return $arr;
    }
}