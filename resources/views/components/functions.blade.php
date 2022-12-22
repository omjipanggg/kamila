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
function monthToRome($month) {
    $monthTuple = ['0','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
    return $monthTuple[$month];
}
function dayString($day) {
    $dayTuple = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'];
    return $dayTuple[$day];
}
function numString($date) {
    $dateTuple = ['Nol', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan', 'Sepuluh', 'Sebelas'];

    $temp = '';

    if ($date < 12) {
        $temp = $dateTuple[$date];
    } else if ($date < 20) {
        $temp = numString($date - 10) . ' Belas';
    } else if ($date < 100) {
        if ($date%10 == 0) {
            $temp = numString($date/10) . " Puluh";
        } else {
            $temp = numString($date/10) . " Puluh " . numString($date%10);
        }
    } else if ($date < 200) {
        $temp = " Seratus " . numString($date-100);
    } else if ($date < 1000) {
        $temp = numString($date/100) . " Ratus " . numString($date%100);
    } else if ($date < 2000) {
        $temp = " Seribu " . $numString($date-1000);
    } else if ($date < 1000000) {
        $temp = numString($date/1000) . " Ribu " . numString($date%1000);
    } else {
        $temp = "#REF";
    }
    return trim($temp);
}

function monthString($month) {
    $monthTuple = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'Septemper', 'Oktober', 'November', 'Desember'];
    return $monthTuple[$month];
}

function yearString($date) {
    $temp = '';

    return trim($temp);
}

function printId($id) {
    $id = $id+1;
    $year = date('y');

    $result = 'B02' . $year . sprintf('%03s', $id);
    return $result;
}

function countDays($start, $end) {
    $start = date_create($start);
    $end = date_create($end);

    $months = $end->diff($start)->format('%m') + 1;
    $days = $end->diff($start)->format('%d');
 
   return trim($months . ' (' . numString($months) . ') bulan, ' . $days . ' (' . numString($days) . ') hari,');
}
?>