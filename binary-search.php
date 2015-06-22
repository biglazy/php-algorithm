#!/opt/lampp/bin/php
<?php
    $test_list = array();
    $search_num = 4000000;
    $search_key= sprintf("NO.%07d",$search_num);
    for($i=0;$i<$search_num;$i++){
        $test_list[$i] = sprintf("NO.%07d",($i+1));
    }

    $time_start = microtime(true);
    print "Start time: ".$time_start."\n";

    $result = binary_search($test_list,0,$search_num-1,$search_key);
    //$result = order_search($test_list,$search_key);
    //$result = in_array($search_key,$test_list);

    $time_end = microtime(true);
    print "End time: ".$time_end."\n";
    print "Search key: ".$search_key."\nUse time: ".($time_end-$time_start)."\n\n";
    print "Datas: \n";
    print_r($test_list[0]." - ".$test_list[1]." - ".$test_list[2]." - ".$test_list[3]."\n");
    print_r("... ...\n... ...\n".$test_list[count($test_list)-4]." - ". $test_list[count($test_list)-3]." - ".$test_list[count($test_list)-2]." - ".$test_list[count($test_list)-1]."\n");
    print "Result: ".$result."\n";

    //二分搜索实现
    function binary_search(&$list,$low,$high,$search_key){
        $mid = $low + floor(($high-$low)/2); // Do not use(low+high)/2 whcih might encounter overflow issue:大数可能导致溢出
        if($low>$high){
            return -$low-1;
        }else{
            if($list[$mid] == $search_key){
                return $mid;
            }else if($list[$mid] > $search_key){
                return binary_search($list,$low,$mid-1,$search_key);
            }else {
                return binary_search($list,$mid+1,$high,$search_key);
            }
        }
    }

    //顺序搜索实现
    function order_search(&$list,$search_key){
        $len = count($list);
        for($i=0;$i<$len;$i++){
            if($list[$i] == $search_key){
                return $i;
            }
        }
        return -1;
    }

?>
