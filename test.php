<?php

var_dump(preg_match('/[^\x20-\x7f]/', 'TEENAGE É TURTLES: OUT É SHADOWS'));
die;
$databaseline = 0;
$data['baseline'] = -2;
if (isset($data['baseline']) && is_numeric($data['baseline'])) {
    $databaseline = $data['baseline'];
} else {
    $databaseline = 1;
}
echo $databaseline;
die;
$tRatings = array('G','PG', 'R');
$cRatings = array('G','PG13', 'R');
$targetSVMImpressionData = [ 0 => ['rating' => 'G', 'target_impressions' => 10], 1 => ['rating' => 'PG', 'target_impressions' => 11], 2 => ['rating' => 'R', 'target_impressions' => 12]];
$compareSVMImpressionData = [ 0 => ['rating' => 'G', 'compare_impressions' => 10], 1 => ['rating' => 'R', 'compare_impressions' => 11], 2 => ['rating' => 'PG13', 'compare_impressions' => 12]];

$ratings = array_values(array_unique(array_merge ($tRatings, $cRatings)));


$targetSVMImpression = [];
$i = 0;
foreach ($ratings as $k => $rating) {
    if (in_array($rating, array_column($targetSVMImpressionData, 'rating'))) {
        foreach ($targetSVMImpressionData as $t_data) {
            if ($t_data['rating'] == $rating) {
                $targetSVMImpression[$i]['rating'] = $rating;
                $targetSVMImpression[$i]['target_impressions'] = $t_data['target_impressions'];
            }
        }
    } else {
        $targetSVMImpression[$i]['rating'] = $rating;
        $targetSVMImpression[$i]['target_impressions'] = 0;
    }
    $i++;
}
$compareSVMImpression = [];
$i = 0;
foreach ($compareSVMImpressionData as $t_data) {
    if (in_array($t_data['rating'], $ratings)) {
        foreach ($ratings as $k => $rating) {
            $compareSVMImpression[$i]['rating'] = $t_data['rating'];
            $compareSVMImpression[$i]['compare_impressions'] = $t_data['compare_impressions'];
        }
    } else {
        $compareSVMImpression[$i]['rating'] = $t_data['rating'];
        $compareSVMImpression[$i]['compare_impressions'] = 0;
    }
    $i++;
}


$dashboardSVMImpressions = [];
if(count($targetSVMImpression) >= count($compareSVMImpression)) {
    foreach ($targetSVMImpression as $k => $t_data) {
        if (in_array($t_data['rating'], array_column($compareSVMImpression, 'rating'))) {
            foreach ($compareSVMImpression as $c_data) {
                if ($t_data['rating'] == $c_data['rating']) {
                    $dashboardSVMImpressions[$k]['rating'] = $t_data['rating'];
                    $dashboardSVMImpressions[$k]['target_impressions'] = $t_data['target_impressions'];
                    $dashboardSVMImpressions[$k]['compare_impressions'] = 0 - $c_data['compare_impressions'];
                    $dashboardSVMImpressions[$k]['compare_original'] = $c_data['compare_impressions'];
                }
            }
        } else {
            $dashboardSVMImpressions[$k]['rating'] = $t_data['rating'];
            $dashboardSVMImpressions[$k]['target_impressions'] = $t_data['target_impressions'];
            $dashboardSVMImpressions[$k]['compare_impressions'] = 0;
            $dashboardSVMImpressions[$k]['compare_original'] = 0;
        }
    }
} else {
    foreach ($compareSVMImpression as $k => $c_data) {
        if (in_array($c_data['rating'], array_column($targetSVMImpression, 'rating'))) {
            foreach ($targetSVMImpression as $t_data) {
                if ($c_data['rating'] == $t_data['rating']) {
                    $dashboardSVMImpressions[$k]['rating'] = $c_data['rating'];
                    $dashboardSVMImpressions[$k]['target_impressions'] = $t_data['target_impressions'];
                    $dashboardSVMImpressions[$k]['compare_impressions'] = 0 - $c_data['compare_impressions'];
                    $dashboardSVMImpressions[$k]['compare_original'] = $c_data['compare_impressions'];
                }
            }
        } else {
            $dashboardSVMImpressions[$k]['rating'] = $c_data['rating'];
            $dashboardSVMImpressions[$k]['target_impressions'] = 0;
            $dashboardSVMImpressions[$k]['compare_impressions'] = 0 - $c_data['compare_impressions'];
            $dashboardSVMImpressions[$k]['compare_original'] = $c_data['compare_impressions'];
        }
    }
}
echo '<pre>'; print_r($dashboardSVMImpressions);
die;

echo number_format(1256456.356,2,'.', '');
die;
$list = array(1, 2 , 3, 4);
$n=[];
$i=0;
$total = 0;
foreach($list as $data) {
    $total = $total + $data;
    $n[$i] = $total;
    $i++;
}

echo '<pre>'; print_r($n);
die;

$givenDate = '2019-01-04';
echo $day = date('D',  strtotime($givenDate));
echo '<br/>';
echo "Next friday:". date('Y-m-d', strtotime('previous friday', strtotime($givenDate)));
die;
$test = '';
$yest = '';
if(!empty($test) || !empty($yest)){
    echo 'asd';
}
die;

$list = array(1, 2 , 3, 4);
$n=[];
$i=0;
$total = 0;
foreach($list as $data) {
    $total = $total + $data;
    $n[$i] = $total;
    $i++;
}

echo $ckey = array_search('Oslo', $list);
die;

$file = fopen("contacts.csv","w");

foreach ($list as $line) {
    fputcsv($file, $line);
}

fclose($file);
die;
?>

<?php

$test = file_get_contents('theaters.csv');
$test = 'sasa, asdsad, asd' .
    'ads, asdsad, asds';
echo '<pre>'; print_r($test);
die;
$startDate = '2016-02-01';
$endDate = '2016-02-29';

$minDate = '2011-01-01';
$d1 = new DateTime($minDate);
$d2 = new DateTime($startDate);

$diff = $d2->diff($d1);
$condition = " AND (";
for($i=0;$i<=$diff->y;$i++){
    $startD = date('Y-m-d', strtotime($startDate.' -'.$i.' years'));
    $endD = date('Y-m-d', strtotime($endDate.' -'.$i.' years'));

    $condition .= " daily BETWEEN '".$startD."' AND '".$endD."' OR ";
}
echo trim($condition,'OR ').')';

echo $diff->y;
die;

$a = 'asian_percent';

if (strpos($a, '_percentss') !== false) {
    echo 'true';
}
die;
echo number_format(1254123123.6546, 0, '.', '');
die;

$genderArr = ['f','m'];
$nielsenProfile = ['2_5', '6_8', '9_11',
    '12_14', '15_17', '18_20', '21_24',
    '25_29', '30_34', '35_39', '40_44',
    '45_49', '50_54', '55_64', '65_p'];
$gender = '';
$queryStr = '';
foreach ($genderArr as $value) {
    foreach ($nielsenProfile as $data) {
        if($gender == ''){
            $queryStr .= 'sum(mentions * ' . $value . $data . ') AS ' . $value . $data . ',';
        } else {
            if ($value == $gender) {
                $queryStr .= 'sum(mentions * ' . $value . $data . ') AS ' . $value . $data . ',';
            } else {
                $queryStr .= 'null AS ' . $value . $data . ',';
            }
        }
    }
}
echo $queryStr;
die;

$given=strtotime();
echo $day = date('w', $given);
die;
$time = $given - ($day > 4 ? ($day - 4) : ($day + 7 - 4)) * 3600 * 24;
echo date('Y-m-d', $time);
die;


//It's just that easy ;)
echo $thuBefore=date('Y-m-d',strtotime("last thursday",$given));
die;


$name = "Cinema456asdasd";
if(ctype_alnum($name)){
    echo "Yes, It's an alphanumeric string/text";
}
else{
    echo "No, It's not an alphanumeric string/text";
}
die;

$str = preg_replace("/[\/' ]/i", '-', trim(trim($name), "/"));
echo filter_var($str,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
die;

$array = [0 => [1 => ['a','c'],2 => ['a','b'],3 => ['a','b']], 1 => [4 => ['a','b'],5 => ['a','b'],6 => ['a','b']]];

$n=0;
foreach($array as $key => $listData){
    foreach($listData as $k=>$list) {
        $final_doc_list[$n] = $list;
        $n++;
    }
}
echo '<pre>'; print_r($final_doc_list);
die;

$storeRecords[0][0] = 1;
$storeRecords[0][1] = 'Genre 1';
$storeRecords[0][2] = 'Genre S1';
$storeRecords[1][0] = 2;
$storeRecords[1][1] = 'Genre 2';
$storeRecords[1][2] = 'Genre S2';

$genreValue = '';


foreach ($storeRecords as $key => $value) {
    # code...
    if($value[0] == 2 && $value[2] == 'Genre S2' && $genreValue == ''){
        echo $key;
    }
}

die;


$val = .5;
var_dump($val);
if (!preg_match('/^[0-9]+(.[0-9]{1,3})?$/', $val)){

    echo 'wrong';
}
echo 'sda';
die;
$test = 0;
if(trim($test) != '')
    echo 'sad';
else
    echo 'no';

die;
echo floor(0.50 * 3600);
echo '<br/>';
//die;
function convertTime($dec)
{
    // start by converting to seconds
    $seconds = ($dec * 3600);
    // we're given hours, so let's get those the easy way
    $hours = floor($dec);
    // since we've "calculated" hours, let's remove them from the seconds variable
    $seconds -= $hours * 3600;
    // calculate minutes left
    $minutes = floor($seconds / 60);
    // remove those from seconds as well
    $seconds -= $minutes * 60;
    // return the time formatted HH:MM:SS
    return lz($hours).":".lz($minutes).":".lz($seconds);
}

// lz = leading zero
function lz($num)
{
    return (strlen($num) < 2) ? "0{$num}" : $num;
}

echo convertTime(12.100);
die;

$time = strtotime('12:75');
echo date('Y-m-d H:i:s', $time*60);
die;

$test = 0;
/*if(strlen($test) == 0){
    echo 'blank';
} else {
    echo 'not blank';
}*/
if($test != ''){
    echo 'blank';
}else {
    echo 'yes';
}
die;
/*$validHeader = [];
$i=0;
foreach($validRequiredHeader as $data){
    $validHeader[$i] = str_replace('_', ' ',$data);
    $i++;
}*/
$validRequiredHeader = ['cintel_id', 'name', 'release_date', 'limited_release_date',
    'rentrak_id', 'mpaa_rating', 'estimated_mpaa_rating', 'industry_opening_weekend_revenue_estimate'
    , 'weekend_share_estimate', 'midweek_opening_estimate', 'imax', '3d'];

$inputHeader = ['cintel_id','name', 'release_date', 'limited_release_date',
    'rentrak_id','mpaa_rating','estimated_mpaa_rating','industry_opening_weekend_revenue_estimate',
    'weekend_share_estimate','midweek_opening_estimate','imax','3d','market_share_week_132','weekly_change_week_1','asd_1'];

$difference = array_diff($inputHeader, $validRequiredHeader);

$valid = 'Yes';
foreach($difference as $value) {
    if(strpos($value, 'market_share_week_') > -1 && is_numeric(str_replace('market_share_week_', '', $value))) {
        //$valid = 'Yes';
    } else if(strpos($value, 'weekly_change_week_') > -1 && str_replace('weekly_change_week_', '', $value) == 1) {
        $valid = 'No';
    } else if(strpos($value, 'weekly_change_week_') > -1 && is_numeric(str_replace('weekly_change_week_', '', $value))) {
        //$valid = 'Yes';
    } else {
        $valid = 'No';
    }
}
if($valid == 'No') {
    echo "S";
} else {
    echo "sdd";
}
exit;

foreach($inputHeader as $value){

    $input = preg_quote($value, '~'); // don't forget to quote input string!

    $result = preg_grep('~' . $input . '~', $validRequiredHeader);
    if(empty($result)){
        echo $value.' ---> Not valid header!<br/>';
    }
}
die;


$data = array('orange', 'blue', 'green', 'red', 'pink', 'brown', 'black');


die;

$arrDate = [];
$html = '';
if (substr_count('2/6/2013', "/") == 2 || substr_count('2/6/2013', "-") == 2) {

    if(substr_count('2/6/2013', "/") == 2)
        $arrDate = explode('/', '2/6/2013');
    else{
        $arrDate = explode('-', '2/6/2013');
    }

    if(strlen($arrDate[0]) == 2 && strlen($arrDate[1]) == 2) {
        if (checkdate($arrDate[0], $arrDate[1], $arrDate[2]) == false || strlen($arrDate[2]) < 4) {
            $html .= '<li>Please provide valid Day (e.g MM/DD/YYYY or MM-DD-YYYY).</li>';
            $flag = 1;
        } else if ($arrDate[2] < 2000) {
            $html .= '<li>Please provide valid Day (e.g MM/DD/YYYY or MM-DD-YYYY).</li>';
            $flag = 1;
        }
    } else {
        $html .= '<li>Please provide valid Day (e.g MM/DD/YYYY or MM-DD-YYYY).</li>';
        $flag = 1;
    }
} else {
    $html .= '<li>Please provide valid Day (e.g MM/DD/YYYY or MM-DD-YYYY) s.</li>';
    $flag = 1;
}
echo $html;
die;

$data = [];
$data['day'] = str_replace('/', '-', '12/6/2013');
$date = \DateTime::createFromFormat('m-d-Y', $data['day']);
echo $data['day'] = $date->format('Y-m-d');
die;

$csvData = file_get_contents('https://test-db-backup-staging.s3.eu-west-2.amazonaws.com/staging-db-backup/1555676010-DEV.csv?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIA24NS3LKMMRQSYBIG%2F20190419%2Feu-west-2%2Fs3%2Faws4_request&X-Amz-Date=20190419T121906Z&X-Amz-SignedHeaders=host&X-Amz-Expires=600&X-Amz-Signature=809651296b1d5627772682b0dffc7d41dff4523a1b44470e95e92d2ddf7df241');
$lines = explode(PHP_EOL, $csvData);

echo '<pre>'; print_r($lines);
die;

echo date('Y-m-d h:i:s', 1555585943).' -- '.date('Y-m-d h:i:s', 1555585721);
die;
$csv_filename = date("Y-m-d_H-i",time()).".csv";
$fd = fopen ($csv_filename, "w");
$fileContent = "124,\r\n1534";
fputs($fd, $fileContent);
fclose($fd);
die;
$asd = null;
if(is_null($asd)){
    echo 'test';
}
exit;

$apiKey = base64_encode('rgMJyb8qZBMYpWH2yNoG:');
$curl = curl_init();
//?since=2019-03-11T13:49:47Z&offset=0&limit=10&direction=desc&sort=started_at
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.xplenty.com/ci-allscope-heroku-2/api/jobs?direction=desc&sort=started_at",
    //CURLOPT_URL => "https://api.xplenty.com/ci-allscope-heroku-2/api/clusters/704307",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    //CURLOPT_CUSTOMREQUEST => "DELETE",
    CURLOPT_CUSTOMREQUEST => "GET",
    //CURLOPT_POSTFIELDS => json_encode(array('nodes'=>1,'type'=>'sandbox')),
    CURLOPT_HTTPHEADER => array(
        "accept: application/vnd.xplenty+json; version=2",
        "authorization: Basic ".$apiKey,
        "Content-Type: application/json"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
$status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);   //get status code
$data = json_decode($response, true);

if ($status_code == 200) {
    $data = json_decode($response, true);
    $jobList = [];
    if(!empty($data)){
        $i=0;
        foreach($data as $list){
            $jobList[$i]['job_id'] = $list['id'];
            $jobList[$i]['owner_id'] = $list['owner_id'];
            $jobList[$i]['package_id'] = $list['package_id'];
            $jobList[$i]['package_name'] = getPackage($list['package_id']);
            $jobList[$i]['progress'] = $list['progress']*100;
            $jobList[$i]['start_at'] = $list['started_at'];
            $jobList[$i]['completed_at'] = $list['completed_at'];
            $jobList[$i]['status'] = $list['status'];
            $jobList[$i]['errors'] = $list['errors'];
            $i++;
        }
    }

    echo '<pre>'; print_r($jobList);
    die;
}
curl_close($curl);

function getPackage($packageId){

    $apiKey = base64_encode('rgMJyb8qZBMYpWH2yNoG:');
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.xplenty.com/ci-allscope-heroku-2/api/packages/".$packageId,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "accept: application/vnd.xplenty+json",
            "authorization: Basic ".$apiKey,
            "cache-control: no-cache",
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);   //get status code
    $data = json_decode($response, true);

    $packageName = '';
    if ($status_code == 200) {
        $data = json_decode($response, true);
        if(!empty($data)){
            $packageName = $data['name'];
        }
    }
    curl_close($curl);
    return $packageName;
}
?>



