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
        return $root; 
    }

    // Shift process
    public function bubbleDown($index)
    {
        $largerChild = null;
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

            if ($top->getKey() >= $this->heapArray[$largerChild]->getKey()) {
                break;
            }

            // shift child up
            $this->heapArray[$index] = $this->heapArray[$largerChild]; 
            $index = $largerChild; // go down
        }

        $this->heapArray[$index] = $top; // root to index
    }

    // Shift process
    public function bubbleUp($index)
    {
        $smallerChild = null;
        $top = $this->heapArray[$index]; // save root
        while ($index < (int)($this->_currentSize/2)) { // not on bottom row
            $leftChild = 2 * $index + 1;
            $rightChild = $leftChild + 1;

            // find smaller child
            if (
                $rightChild < $this->_currentSize &&
                $this->heapArray[$leftChild] > $this->heapArray[$rightChild]
            ) // right child exists?
            {
                $smallerChild = $rightChild;
            } else {
                $smallerChild = $leftChild;
            }

            if ($top->getKey() <= $this->heapArray[$smallerChild]->getKey()) {
                break;
            }

            // shift child up
            $this->heapArray[$index] = $this->heapArray[$smallerChild]; 
            $index = $smallerChild; // go down
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