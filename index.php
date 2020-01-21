<?php
require_once 'vendor/autoload.php';

use Heapsort\Heapsort\Heap;
use Heapsort\Heapsort\Node;

function heapsort(Heap $heap)
{ 
    $size = $heap->getSize();
    // "sift" all nodes, except lowest level as it has no children
    for ($j = (int)($size/2) - 1; $j >= 0; $j--) 
    {
        $heap->bubbleDown($j);
    }

    // sort the heap
    for ($j = $size-1; $j >= 0; $j--) { 
        $biggestNode = $heap->remove();
        // use same nodes array for sorted elements
        $heap->insertAt($j, $biggestNode);
    }

    return $heap->asArray(); 
}

$arr = explode(',', $_GET['sort']);

// $arr = array(3, 0, 2, 5, -1, 4, 1);
echo "Original Array : ";
echo implode(', ',$arr ); 
$heap = new Heap();
foreach ($arr as $key => $val) {
    $Node = new Node($val);
    $heap->insertAt($key, $Node);
    $heap->incrementSize();
}

$result = heapsort($heap);
echo "<br />Sorted Array : ";
echo implode(', ',$result)."\n";
?>

<form>
    <input type="text" name="sort" />
    <button type="submit">Submit</button>
</form>