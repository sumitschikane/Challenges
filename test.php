/* Read input from STDIN. Print your output to STDOUT*/

<?php 
	function ReadStdin($prompt, $default = '') { 
	    while(!isset($input)) { 
	        echo $prompt; 
	        $input = strtolower(trim(fgets(STDIN))); 
	        if(empty($input) && !empty($default)) { 
	            $input = $default; 
	        } 
	    } 
	    return $input; 
	} 

	function absentStudentsList($noOfStudents, $presentStudents){
		//print_r($presentStudents);exit();
		$presentStudents = explode(' ', $presentStudents);
	  	$absentStudents = "";
	  	for($i=1; $i<=$noOfStudents; $i++){
	     	if(!in_array($i, $presentStudents)) {
	            $absentStudents .= $i.' '; 
	    	}
	   	}
	  	return trim($absentStudents);
	}

	$noOfStudents = ReadStdin('Please enter number of students in the class: '); 
	$presentStudents = ReadStdin('Please enter the list of present students: ');

	$absentStudentsList = absentStudentsList($noOfStudents, $presentStudents);

	fwrite(STDOUT, 'Absent students: '.$absentStudentsList);

?> 
