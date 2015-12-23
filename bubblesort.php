<?php
function netbubbleSort(array $arr)
{
    $n = sizeof($arr);
    for ($i = 1; $i < $n; $i++) {
        for ($j = $n - 1; $j >= $i; $j--) {
            if($arr[$j-1] > $arr[$j]) {
                $tmp = $arr[$j - 1];
                $arr[$j - 1] = $arr[$j];
                $arr[$j] = $tmp;
            }
        }
    }
     
    return $arr;
}

function mybubbleSort(array $arr)
{
    $n = sizeof($arr);
    for ($i = 1; $i < $n; $i++) {
        echo "i: ".$i."<br>";
        echo "j: ";
        
        
        for ($j = $n - 1; $j >= $i; $j--) {
            echo '['.$j.']';
            if($arr[$j-1] > $arr[$j]) {
                $tmp = $arr[$j - 1];
                $arr[$j - 1] = $arr[$j];
                $arr[$j] = $tmp;
            }
        }
        
        echo "<br>";
        echo "k: ";
        for ($k = 0; $k < $i; $k++) {
            echo '['.$k.']';
             
            if($arr[$k+1] < $arr[$k]) {
                $tmp = $arr[$k + 1];
                $arr[$k + 1] = $arr[$k];
                $arr[$k] = $tmp;
            }
        }
    echo "<br>";
    print_r ($arr);    
    echo "<hr>";
    }
     
    return $arr;
}
 
$arr = array(255,1,22,3,45,5,6);
// print_r($arr);
printarr($arr);
$result = netbubbleSort($arr);
$myresult = mybubbleSort($arr);
// print_r($result);

printarr($result);
printarr($myresult);

function printarr($a){
    foreach ($a as $key => $value) {
        echo $value."<br>";
    }
echo "<hr>";
}

?>
