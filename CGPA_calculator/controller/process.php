<?php 
    $errors = [];
    $result = [];
    $num_table_rows;
 
    if (isset($_GET['num_course_btn'])) {
        if (isset($_GET['num_course']) && !(empty($_GET['num_course']))) {
            $num_course = (int) $_GET['num_course'];
            if ($num_course != 0 && (strlen($num_course) === strlen($_GET['num_course']))){
                $num_table_rows = $num_course;
            } else {
                $errors[] = 'invalid input';
            }
        } else {
            $errors[] = 'no value provided';
        }
    }

    if (isset($_POST['calculate'])) {
        
        $num_table_rows = (int) $_POST['num_table_rows'];
        $grades = ['A' => 5, 'B' => 4, 'C' => 3, 'D' => 2, 'E' => 1, 'F' => 0];
        
        unset($_POST['num_table_rows']);
        unset($_POST['calculate']);
        
        foreach ($_POST as $key => $value) {
            if ($_POST[$key] == '') {
                $errors[] = 'All inputs in the table must be filled';
                
            } 
        }
        if (empty($errors)) {
            foreach ($_POST as $key => $value) {
                $array = explode('-', $key);
                if ($array[0] == 'course_unit') {
                    $unit = (int) $value;
                    if ($unit <= 0 || $unit > 6 || $unit == 0) {
                        $errors[] = 'invalid input in course unit column';
                    }
                } else if ($array[0] == 'course_grade') {
                    if (!(array_key_exists(strtoupper($value), $grades))) {
                        $errors[] = 'Invalid grade inserted in course grade';
                    }
                }
            }
            if (empty($errors)) {
                $unit_array = [];
                $grade_array = [];
                foreach ($_POST as $key => $value) {
                    $array = explode('-', $key);
                    if ($array[0] == 'course_unit') {
                        $unit_array[] = $value;
                    } else if ($array[0] == 'course_grade') {
                        $grade_array[] = $value;
                    }
                }
                $total_units = 0;
                $total_points = 0;
                for ($i=0; $i < count($unit_array); $i++) { 
                     $total_units += (int) $unit_array[$i];
                     $total_points += ((int) $unit_array[$i]) * $grades[strtoupper($grade_array[$i])];
                }
                $result[] = "Total unit is $total_units";
                $result[] = "Total point is $total_points";
                if (($total_points / $total_units) >= 4.5 &&( $total_points / $total_units) <= 5.0) {
                    $result[] = 'Grade point is ' . round($total_points / $total_units,2) . ' first class!';
                } else if (($total_points / $total_units) >= 3.5 && ($total_points / $total_units) <= 4.49) {
                    $result[] = 'Grade point is ' . round($total_points / $total_units,2) . ' Second class upper!';
                } else if (($total_points / $total_units) >= 2.40 && ($total_points / $total_units) <= 3.49) {
                    $result[] = 'Grade point is ' . round($total_points / $total_units,2) . ' Second class lower!';
                } else if (($total_points / $total_units) >= 1.50 && ($total_points / $total_units) <= 2.39) {
                    $result[] = 'Grade point is ' . round($total_points / $total_units,2) . ' Third class!';
                } else if (($total_points / $total_units) >= 1.00 && ($total_points / $total_units) <= 1.49) {
                    $result[] = 'Grade point is ' . round($total_points / $total_units,2) . ' pass!';
                } else {
                    $result[] = 'Grade point is ' . round($total_points / $total_units,2) . ' withdraw!';
                }
            }
        }
    }
        
    
?>