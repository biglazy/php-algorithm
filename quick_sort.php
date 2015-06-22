#!/opt/lampp/bin/php
<?php
    $test_list = array();
    for($i=0;$i<500000;$i++){
        //$test_list[$i] = 100000-$i;
        $test_list[$i] = rand();
    }

    $time_start = microtime(true);
    print "Start time: ".$time_start."\n";

    $test_list = quicksort_inplace($test_list);
    //$test_list = quicksort($test_list);
    //sort($test_list);

    $time_end = microtime(true);
    print "End time: ".$time_end."\n";
    print "List length: ".count($test_list)."\nUse time: ".($time_end-$time_start)."\n\n";
    print "Datas: \n";
    print_r($test_list[0]." - ".$test_list[1]." - ".$test_list[2]." - ".$test_list[3]."\n");
    print_r("... ...\n... ...\n".$test_list[count($test_list)-4]." - ". $test_list[count($test_list)-3]." - ".$test_list[count($test_list)-2]." - ".$test_list[count($test_list)-1]."\n");

    //自己实现的快速排序方法 - 空间复杂度: Ω(n)  时间复杂度: Ω(nlogn)
    function quicksort($list){
        $list_len = count($list);
        if($list_len <=1) {return $list;} 

        $left = array();
        $right = array();
        $mid_index = floor($list_len/2);
        $mid_value = $list[$mid_index];

        for($i=0;$i<$list_len;$i++){
            if($i==$mid_index){continue;}

            if($list[$i] < $mid_value){
                $left[] = $list[$i];
            }else {
                $right[] = $list[$i];
            }
        }
        
        return array_merge(quick_sort($left),(array)$mid_value,quick_sort($right));
    }



//复制自维基百科：<快速排序>页面PHP实现方法-1
function quicksort1($seq) {
  if (count($seq) > 1) {
    $k = $seq[0];
    $x = array();
    $y = array();
    $_size = count($seq);      //do not use count($seq) in loop for.
    for ($i=1; $i<$_size; $i++) {
      if ($seq[$i] <= $k) {
        $x[] = $seq[$i];
      } else {
        $y[] = $seq[$i];
      }
    }
    $x = quicksort1($x);
    $y = quicksort1($y);
    return array_merge($x, array($k), $y);
  } else {
    return $seq;
  }
}


//复制自维基百科：<快速排序>页面PHP实现方法-2
function quicksort2($arr) {
    $len = count($arr);
 
    if($len <=1 ) return $arr;
 
    $left = $right = array();
    $mid_index = floor($len/2);
    $mid_value = $arr[$mid_index];
 
    for($i=0;$i<$len;$i++){
        if($i==$mid_index)continue;
 
        //seperate elements by 'mid_value'
        if($arr[$i] < $mid_value){
            $left[] = $arr[$i];
        }else{
            $right[] = $arr[$i];
        }
    }
    return array_merge(quicksort2($left),(array)$mid_value,quicksort2($right));
}



//in-place 原地分区快速拍序方法 
function quicksort_inplace($list){
    $list_len = count($list);
    quicksort3($list,0,$list_len-1);
    return $list;
}

//复制自维基百科：<快速排序>页面(in-place)实现方法
function quicksort3(&$list, $left, $right){
     if ($right > $left){
         $pivotIndex = floor(($right + $left)/2);
         $pivotNewIndex = partition($list, $left, $right, $pivotIndex);
         quicksort3($list, $left, $pivotNewIndex-1);
         quicksort3($list, $pivotNewIndex+1, $right);
     }
}

//快速排序原地分区方法：按照索引取中间值
function partition(&$list, $left, $right, $pivotIndex){
     $pivotValue = $list[$pivotIndex];
     $tmp = $list[$pivotIndex];
     $list[$pivotIndex] = $list[$right];
     $list[$right] = $tmp;
     $storeIndex = $left;
     for($i=$left;$i<$right;$i++){ 
         if($list[$i] <= $pivotValue){
             $tmp = $list[$i];
             $list[$i] = $list[$storeIndex]; 
             $list[$storeIndex] = $tmp;
             $storeIndex = $storeIndex + 1;
         }
     }
    $tmp = $list[$right];
    $list[$right] = $list[$storeIndex];
    $list[$storeIndex] = $tmp;

    return $storeIndex;
}

?>
