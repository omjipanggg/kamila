<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    }

   	public function getColNames($model)
   	{
   		return \Schema::getColumnListing($model->getTable());
   	}

    public function getColTypes($model)
    {
      $table = $model->getTable();
      $colNames = \Schema::getColumnListing($table);
      $colTypes = array();
      foreach ($colNames as $key => $value) {
        array_push($colTypes, [
          'field' => $value,
          'type' => \Schema::getColumnType($table, $value),
        ]);
      }
      return $colTypes;
    }
    
    public function getMenu()
    {
        return \App\Models\Menu::where('role_id', '=', \Auth::user()->role_id)->orderBy('id')->get();
    }

    public function newlyId() {
        return \App\Models\Employee::orderBy('id', 'desc')->pluck('id')->first() + 1;
    }

    public function monthToRome($month) {
        $monthTuple = ['0','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
        return $monthTuple[$month];
    }
    public function dayString($day) {
        $dayTuple = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'];
        return $dayTuple[$day];
    }
    public function numString($date) {
        $dateTuple = ['Nol', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan', 'Sepuluh', 'Sebelas'];

        $temp = '';

        if ($date < 12) {
            $temp = $dateTuple[$date];
        } else if ($date < 20) {
            $temp = $this->numString($date - 10) . ' Belas';
        } else if ($date < 100) {
            if ($date%10 == 0) {
                $temp = $this->numString($date/10) . " Puluh";
            } else {
                $temp = $this->numString($date/10) . " Puluh " . $this->numString($date%10);
            }
        } else if ($date < 200) {
            $temp = " Seratus " . $this->numString($date-100);
        } else if ($date < 1000) {
            $temp = $this->numString($date/100) . " Ratus " . $this->numString($date%100);
        } else if ($date < 2000) {
            $temp = " Seribu " . $$this->numString($date-1000);
        } else if ($date < 1000000) {
            $temp = $this->numString($date/1000) . " Ribu " . $this->numString($date%1000);
        } else {
            $temp = "#REF";
        }
        return trim($temp);
    }

    public function monthString($month) {
        $monthTuple = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'Septemper', 'Oktober', 'November', 'Desember'];
        return $monthTuple[$month];
    }

    public function yearString($date) {
        $temp = '';
        return trim($temp);
    }

    public function printId($id) {
        $id = $id+1;
        $year = date('y');

        $result = 'B02' . $year . sprintf('%03s', $id);
        return $result;
    }

    public function countDays($start, $end) {
        $start = date_create($start);
        $end = date_create($end);

        $dateDif = date_diff($end, $start);

        if ($dateDif->format('%m') !== 0) {
            $months = $dateDif->format('%m');
        } else {
            $months = $dateDif->format('%m') + 1;
        }
        $days = $dateDif->format('%d');

        return trim($months . ' (' . $this->numString($months) . ') bulan, ' . $days . ' (' . $this->numString($days) . ') hari,');
    }

    function dateFormat($date) {
        $date = date_create($date);
        return date_format($date, 'd F Y');
    }

    function dateIndo($date) {
        $date = date_create($date);
        return date_format($date, 'd/m/Y');
    }
}
