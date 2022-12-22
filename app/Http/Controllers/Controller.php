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
        return \App\Models\Menu::where('role_id', '=', \Auth::user()->role_id)->get();
    }
}
