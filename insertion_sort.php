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

    function insertion_sort(&$list){
        $list_count = count($list);
        for($sublist_count=1;$sublist_count<$list_count;$sublist_count++){
            $tmp = $list[$sublist_count];
            $sublist_pos = $sublist_count-1;
            for($sublist_pos=$sublist_count-1;($sublist_pos>=0)&&($tmp < $list[$sublist_pos]);$sublist_pos--){
                $list[$sublist_pos+1] = $list[$sublist_pos];
            }    
            $list[$sublist_pos+1] = $tmp;
        }
    }
?>
