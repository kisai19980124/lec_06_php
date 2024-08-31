<?php
function h($value){
    return htmlspecialchars($value,ENT_QUOTES);
 }
 
 function countOptions($options, $results, $delimiter = '|') {
    // Initialize the count array with zeros
    $counts = array_fill(0, count($options), 0);
    
    // Loop through the results and count occurrences
    foreach ($results as $result) {
        // Split the result by the delimiter
        $individualResults = explode($delimiter, $result);
        
        // Count each part of the split result
        foreach ($individualResults as $individualResult) {
            $index = array_search($individualResult, $options);
            if ($index !== false) {
                $counts[$index]++;
            }
        }
    }
    
    return $counts;
}
?>