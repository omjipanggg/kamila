<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'check', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $context = [
            'title' => 'Dashboard',
            'menus' => $this->getMenu(),
            'schedules' => \App\Models\Attendance::all(),
            'done' => \App\Models\UserAttendance::where('user_id', '=', Auth::user()->id)->where('attendance_date', '=', today())->first(),
        ];
        return view('pages.dashboard.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function faq() {
        $context = [
            'title' => 'FAQ',
            'menus' => $this->getMenu(),
        ];

        return view('pages.dashboard.faq', $context);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function display($table)
    {
        $model = '\\App\\Models\\' . ucfirst($table);
        $context = [
            'title' => ucfirst($table),
            'model' => new $model,
            'records' => $model::all(),
            'columns' => $this->getColNames(new $model),
            'colTypes' => $this->getColTypes(new $model),
            'menus' => $this->getMenu(),
        ];
        return view('pages.dashboard.show', $context);
    }

    public function storeBatch(Request $request, $table)
    {

    }

    public function search() {
    }

    public function searchVar(Request $request) {
        return $request->all();
    }

}