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
function getPrefCode($postcode) {
    $url = "https://zipcloud.ibsnet.co.jp/api/search?zipcode=" . $postcode;
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    
    if ($data['status'] === 200 && !empty($data['results'])) {
        return $data['results'][0]['prefcode'];
    }
    
    return null; // Return null if there's an error or no results
}

function getPrefectureCode($prefcode) {
    $url = "https://apis.apima.net/k2srm05wzm1pdl3xk0sv/v1/prefectures/id/" . $prefcode;
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    
    if (!empty($data) && isset($data[0]['code'])) {
        return $data[0]['code'];
    }
    
    return null; // Return null if there's an error or no results
}

function countPrefectures($postcodes) {
    $prefectureCount = [];
    
    foreach ($postcodes as $postcode) {
        $prefcode = getPrefCode($postcode);
        
        if ($prefcode) {
            $prefectureCode = getPrefectureCode($prefcode);
            
            if ($prefectureCode) {
                if (isset($prefectureCount[$prefectureCode])) {
                    $prefectureCount[$prefectureCode]++;
                } else {
                    $prefectureCount[$prefectureCode] = 1;
                }
            }
        }
    }
    
    // Convert the associative array to a numerical array with ['prefecture', count]
    $result = [['県名', '人数']];
    foreach ($prefectureCount as $prefecture => $count) {
        $result[] = [$prefecture, $count];
    }
    
    return $result;
}
?>