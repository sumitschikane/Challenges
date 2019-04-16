<?php
  function ReadStdin() { 
    while(!isset($input)) { 
      $input = strtolower(trim(fgets(STDIN))); 
      if(empty($input)) { 
        $input = ''; 
      } 
    } 
    return $input; 
  }

  function getTotalCost($sweets) {
    $iterationCost = 0;
    
    for ($i=0; $i < count($sweets); $i++) {
      $temp = [];
      for ($j=0; $j<=$i; $j++) {
        $temp[] = $sweets[$j];
      }

      foreach ($temp as $itcost) {
        $rowCost = end($temp) * $itcost;
        $iterationCost = $iterationCost + $rowCost;
      }
      
    }
    return $iterationCost;
  }

  $noOfstalls = ReadStdin();
  $input = [];
  for ($i=0; $i < $noOfstalls; $i++) { 
	  $input[] = ReadStdin();
  }
  
  $sumOfAllCost = 0;

  $passedInput = $input;

  foreach ($input as $stall) {
    $iterationCost = getTotalCost($passedInput);
    array_shift($passedInput);
    $sumOfAllCost = $sumOfAllCost + $iterationCost;
  }

  fwrite(STDOUT, $sumOfAllCost);


?>