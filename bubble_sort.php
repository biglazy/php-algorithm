#!/opt/lampp/bin/php
<?php
    $test_list = array();
    for($i=0;$i<10000;$i++){
        //$test_list[$i] = $i;
        $test_list[$i] = rand();
    }

    $time_start = microtime(true);
    print "Start time: ".$time_start."\n";

    insertion_sort($test_list);
    //rsort($test_list);

    $time_end = microtime(true);
    print "End time: ".$time_end."\n";
    print "List length: ".count($test_list)."\nUse time: ".($time_end-$time_start)."\n\n";
    print "Datas: \n";
    print_r($test_list[0]." - ".$test_list[1]." - ".$test_list[2]." - ".$test_list[3]."\n");
    print_r("... ...\n... ...\n".$test_list[count($test_list)-4]." - ". $test_list[count($test_list)-3]." - ".$test_list[count($test_list)-2]." - ".$test_list[count($test_list)-1]."\n");

    //冒泡排序实现
    function insertion_sort(&$list){
        $list_count = count($list);
        for($sublist_count=0;$sublist_count<$list_count-1;$sublist_count++){
            $is_changed = false;
            for($current_pos=0;$current_pos<$list_count -$sublist_count-1;$current_pos++){
                if($list[$current_pos] > $list[$current_pos+1]){
                    $tmp = $list[$current_pos];
                    $list[$current_pos] = $list[$current_pos+1];
                    $list[$current_pos+1] = $tmp;
                    $is_changed = true;
                }
            }    
            if(!$is_changed){break;}
        }
    }
?>
