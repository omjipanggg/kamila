<?php
date_default_timezone_set('Asia/Jakarta');
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
function greetings() {
    $lead = date('G');
    if ($lead >= 4 && $lead <= 11) { $greetings = 'pagi'; }
    else if ($lead >= 12 && $lead <= 14) { $greetings = 'siang'; }
    else if ($lead >= 16 && $lead <= 18) { $greetings = 'sore'; }
    else { $greetings = 'malam'; }
    
    return $greetings;
}
?>