<?php

namespace Heapsort\Heapsort;

class Heap
{
    private $heapArray;
    private $_currentSize;

    public function __construct()
    {
        $this->heapArray = array();
        $this->_currentSize = 0;
    }

    // Remove item with max key 
    public function remove()
    {
        $root = $this->heapArray[0];
        // put last element into root
        $this->heapArray[0] = $this->heapArray[--$this->_currentSize];
        $this->bubbleDown(0); 
        return $root; 
    }

    // Shift process
    public function bubbleDown($index)
    {
<<<<<<< HEAD
        $largerChild = null;
=======
        $larger_Child = null;
>>>>>>> b5c7fe5d2e81fcdeec45f9df8274b4d4b9243672
        $top = $this->heapArray[$index]; // save root
        while ($index < (int)($this->_currentSize/2)) { // not on bottom row
            $leftChild = 2 * $index + 1;
            $rightChild = $leftChild + 1;

            // find larger child
            if (
                $rightChild < $this->_currentSize &&
                $this->heapArray[$leftChild] < $this->heapArray[$rightChild]
            ) // right child exists?
            {
                $largerChild = $rightChild;
            } else {
                $largerChild = $leftChild;
            }

<<<<<<< HEAD
            if ($top->getKey() >= $this->heapArray[$largerChild]->getKey()) {
=======
            if ($top->getKey() >= $this->heapArray[$larger_Child]->getKey()) {
>>>>>>> b5c7fe5d2e81fcdeec45f9df8274b4d4b9243672
                break;
            }

            // shift child up
<<<<<<< HEAD
            $this->heapArray[$index] = $this->heapArray[$largerChild]; 
            $index = $largerChild; // go down
=======
            $this->heapArray[$index] = $this->heapArray[$larger_Child]; 
            $index = $larger_Child; // go down
>>>>>>> b5c7fe5d2e81fcdeec45f9df8274b4d4b9243672
        }

        $this->heapArray[$index] = $top; // root to index
    }

    public function insertAt($index, Node $newNode)
    {
        $this->heapArray[$index] = $newNode;
    }

    public function incrementSize()
    {
        $this->_currentSize++;
    }

    public function getSize()
    {
        return $this->_currentSize;
    }

    public function asArray()
    {
        $arr = array();
        for ($j = 0; $j < sizeof($this->heapArray); $j++) {
        $arr[] = $this->heapArray[$j]->getKey();
        }

        return $arr;
    }
}