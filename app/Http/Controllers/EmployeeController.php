<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
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

    public function on_duty(Request $request)
    {
        // $img = $request->image;
        // $folderPath = "uploads/attendances/";
         
        // $img_parts = explode(";base64,", $img);
        // $img_aux = explode("image/", $img_parts[0]);
        // $image_type = $img_aux[1];
         
        // $img_base64 = base64_decode($img_parts[1]);
        // $filename = uniqid() . '.jpeg';
         
        // $file = $folderPath . $filename;
        // $upload = \Storage::put($file, $img_base64);

        $request->validate([
            'image' => 'required',
            'schedule' => 'required',
            'latitude' => 'required'
        ], [
            'image.required' => '<strong>Foto</strong>',
            'schedule.required' => '<strong>Jadwal Presensi</strong>',
            'latitude.required' => '<strong>Lokasi</strong>'
        ]);

        $attendance = \App\Models\UserAttendance::create([
            'user_id' => \Auth::id(),
            'attendance_id' => $request->schedule,
            'attendance_date' => today(),
            'on_duty' => now(),
            'on_image' => $request->image,
            'on_latitude' => $request->latitude,
            'on_longitude' => $request->longitude,
            'on_distance' => $request->distance,
        ]);

        $attendance ? $msg = 'Berhasil melakukan presensi masuk.' : $msg = 'Terjadi kesalahan.';
        return redirect()->route('dashboard.index')->with('status', $msg);

        // dd($request->all());
    }

    public function off_duty(Request $request)
    {
        $request->validate([
            'task_done' => 'required',
            'image' => 'required',
            'longitude' => 'required'
        ], [
            'task_done.required' => '<strong>Deskripsi Tugas</strong>',
            'image.required' => '<strong>Foto</strong>',
            'longitude.required' => '<strong>Lokasi</strong>'
        ]);

        $data = \App\Models\UserAttendance::where('user_id', \Auth::id())->orderByDesc('attendance_date')->first();
        $data->off_duty = now();
        $data->off_image = $request->image; 
        $data->off_latitude = $request->latitude; 
        $data->off_longitude = $request->longitude; 
        $data->off_distance = $request->distance;
        $data->task_done = $request->task_done;
        $data->description = $request->description;
        $data->save() ? $msg = 'Berhasil mengakhiri sesi hari ini.' : $msg = 'Terjadi kesalahan.';
        return back()->with('status', $msg);
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
    public function ring()
    {
        // $ip_address = \Request::ip();
        $ip_address = '180.243.8.111';
        $context = [
            'title' => 'Attendance',
            'geo' => \Location::get($ip_address),
            'schedules' => \App\Models\Attendance::all(),
            'done' => \App\Models\UserAttendance::where('user_id', '=', Auth::user()->id)->where('attendance_date', '=', today())->first(),
            'menus' => \App\Models\Menu::where('role_id', '=', \Auth::user()->role_id)->get(),
        ];
        return view('pages.employee.index', $context);
    }
    public function attendance() { return 'ATTENDANCE!'; }
    public function permit() { return 'PERMIT!'; }
    public function overtime() { return 'OVERTIME!'; }
    public function patrol() { return 'PATROL!'; }
    public function payslip() { return 'PAYSLIP!'; }

    public function profile() {
        $context = [
            'title' => 'Profile',
            'records' => \App\Models\Employee::where('user_id', \Auth::user()->id)->with(['user', 'gender', 'bloodType'])->get(),
            'menus' => \App\Models\Menu::where('role_id', '=', \Auth::user()->role_id)->get(),
        ];
        return view('pages.employee.profile', $context);
    }
}