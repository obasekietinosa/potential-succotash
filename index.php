<?php
require_once 'vendor/autoload.php';

use Heapsort\Heapsort\Heap;
use Heapsort\Heapsort\Node;

function heapsort(Heap $heap, string $order="asc")
{ 
    $bubble = $order == "asc" ? "bubbleDown" : "bubbleUp";
    $size = $heap->getSize();
    // "sift" all nodes, except lowest level as it has no children
    for ($j = (int)($size/2) - 1; $j >= 0; $j--) 
    {
        $heap->$bubble($j);
    }

    // sort the heap
    for ($j = $size-1; $j >= 0; $j--) { 
        $sortedNode = $heap->remove();
        $heap->$bubble(0);
        // use same nodes array for sorted elements
        $heap->insertAt($j, $sortedNode);
    }

    return $heap->asArray(); 
}

$arr = explode(',', $_GET['sort']);
$order = $_GET['order'] ?? 'asc';

// $arr = array(3, 0, 2, 5, -1, 4, 1);
echo "Original Array : ";
echo implode(', ',$arr ); 
$heap = new Heap();
foreach ($arr as $key => $val) {
    $Node = new Node($val);
    $heap->insertAt($key, $Node);
    $heap->incrementSize();
}

$result = heapsort($heap, $order);
echo "<br />Sorted Array : ";
echo implode(', ',$result)."\n";
?>

<form>
    <input type="text" name="sort" />
    <button name="order" value="asc" type="submit">Sort ASC</button>
    <button name="order" value="desc" type="submit">Sort DESC</button>
</form>