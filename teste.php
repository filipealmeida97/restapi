<!DOCTYPE html>
<html>
<body>

<?php
$time_start = microtime(true);
function existIdBinary(Array $arr, $x, $index)
{
    
    asort($arr);
    $arr = array_values($arr);
    // check for empty array
    if (count($arr) === 0) return false;
    $low = 0;
    $high = count($arr) - 1;
    foreach ($x as $key => $value) {
        # code...
        while ($low <= $high) {

            // compute middle index
            $mid = floor(($low + $high) / 2);
    
            // element found at mid
            if($arr[$mid][$index] == $x) {
                return true;
            }
    
            if ($x < $arr[$mid][$index]) {
                // search the left side of the array
                $high = $mid -1;
            }
            else {
                // search the right side of the array
                $low = $mid + 1;
            }
        }
    }
      
    // If we reach here element x doesnt exist
    return false;
}
  
// Driver code
$arr = array(     ['id' => 3, 'nome' => "Filipe"],
                    ['id' => 1, 'nome' => "Marcos"],
                    ['id' => 2, 'nome' => "Ana"],
                    ['id' => 4, 'nome' => "Willian"],
                    ['id' => 5, 'nome' => "José"],
                    ['id' => 6, 'nome' => "Marcelo"],
                    ['id' => 7, 'nome' => "Pedro"],
                    ['id' => 8, 'nome' => "Paulo"],
                    ['id' => 9, 'nome' => "João"],
                    ['id' => 10, 'nome' => "Salomão"]);
$arrc = array(     ['id' => 3, 'nome' => "Filipe"],
                    ['id' => 1, 'nome' => "Marcos"],
                    ['id' => 2, 'nome' => "Ana"]);
// $arr = array('a', 'b', 'c');
// $arrc = array('a','s');
$r = array_intersect($arr, $arrc);
print_r($r);
// $value = 11;
// /*foreach( $arr as $valores ){
//     foreach( $valores as $chave => $valor ){
//         echo "$chave = $valor\n";
//     }
// }*/
// if(existIdBinary($arr, $value, 'id') == true) {
//     echo $value." Exists";
// }
// else {
//     echo $value." Doesnt Exist";
// }
$time_end = microtime(true);
$time = $time_end - $time_start;
echo $time;
?>


</body>
</html>
