#!/opt/lampp/bin/php
<?php
  function hanoi($num,$begin,$middle,$end,&$step){
    if($num == 1){
      echo "Step ".++$step.": Move one from ".$begin." to ".$end."\n";
    }else {
      hanoi($num-1,$begin,$end,$middle,$step);
      echo "Step ".++$step.": Move one from ".$begin." to ".$end.".\n";
      hanoi($num-1,$middle,$begin,$end,$step);
    }   
  }

  //From a to c, can use b, num is n.
  //Total step is: f(n)=2*f(n-1)+1=2^n-1
  $n = 8;
  $step = 0;
  hanoi($n,'a','b','c',$step);

?>
