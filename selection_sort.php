#!/opt/lampp/bin/php
<?php
    $test_list = array();
    for($i=0;$i<10000;$i++){
        //$test_list[$i] = $i;
        $test_list[$i] = rand();
    }

    $time_start = microtime(true);
    print "Start time: ".$time_start."\n";

    selection_sort($test_list);
    //rsort($test_list);

    $time_end = microtime(true);
    print "End time: ".$time_end."\n";
    print "List length: ".count($test_list)."\nUse time: ".($time_end-$time_start)."\n\n";
    print "Datas: \n";
    print_r($test_list[0]." - ".$test_list[1]." - ".$test_list[2]." - ".$test_list[3]."\n");
    print_r("... ...\n... ...\n".$test_list[count($test_list)-4]." - ". $test_list[count($test_list)-3]." - ".$test_list[count($test_list)-2]." - ".$test_list[count($test_list)-1]."\n");

    function selection_sort(&$list){
        $list_count = count($list);
        for($start_pos=0;$start_pos<$list_count-1;$start_pos++){
            $max_pos = $start_pos;
            for($current_pos=$start_pos+1;$current_pos<$list_count;$current_pos++){
                if($list[$max_pos] > $list[$current_pos]){
                    $max_pos = $current_pos;
                }
            }
            if($max_pos <> $start_pos){
                $tmp = $list[$start_pos];
                $list[$start_pos] = $list[$max_pos];
                $list[$max_pos] = $tmp;
            }    
        }
    }
?>
