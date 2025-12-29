<?php
class allClass{
/////////////////////////////////////////
function isValidMatricNo($matric_no) {
    // Format 1: 19/69/0053 → 2/2/4 digits
    $pattern1 = '/^\d{2}\/\d{2}\/\d{4}$/';
    // Format 2: 23/105/01/P/0112 → 2/3/2/letter/4 digits
    $pattern2 = '/^\d{2}\/\d{3}\/\d{2}\/[A-Z]\/\d{4}$/i';
    // Format 3: 24/145/0002 → 2/3/4 digits
    $pattern3 = '/^\d{2}\/\d{3}\/\d{4}$/';
    // Check all patterns
    if (preg_match($pattern1, $matric_no) || preg_match($pattern2, $matric_no) || preg_match($pattern3, $matric_no)) {
        return true;
    } else {
        return false;
    }
}

function generatePaymentReference($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[random_int(0, strlen($characters) - 1)];
    }
    return $code;
}

function _get_sequence_count($conn, $counter_id){
	$count=mysqli_fetch_array(mysqli_query($conn,"SELECT counter_value FROM setup_counter_tab WHERE counter_id = '$counter_id' FOR UPDATE"));
	 $num=$count[0]+1;
	 mysqli_query($conn,"UPDATE `setup_counter_tab` SET `counter_value` = '$num' WHERE counter_id = '$counter_id'")or die (mysqli_error($conn));
	 if ($num<10){$no='00'.$num;}elseif($num>=10 && $num<100){$no='0'.$num;}else{$no=$num;}
	 return '[{"no":"'.$no.'"}]';
}

}//end of class
$callclass=new allClass();
?>