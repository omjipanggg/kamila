<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'check']);
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
            'done' => \App\Models\UserAttendance::orderBy('created_at')->where('user_id', '=', Auth::user()->id)->where('attendance_date', '=', today())->first(),
        ];
        return view('pages.dashboard.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($table, \Kris\LaravelFormBuilder\FormBuilder $builder)
    {
        $model = '\\App\\Models\\' . $table;
        $form = $builder->create(\App\Forms\InsertForm::class, [
            'method' => 'POST',
            'url' => route('dashboard.store', $table),
            'model' => new $model,
        ]);

        $context = [
            'title' => $table,
            'form' => $form,
            'menus' => $this->getMenu(),
        ];

        return view('pages.dashboard.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $table)
    {
        $prefix = '\\App\\Models\\';
        $model = $prefix . $table;
        $store = $model::create($request->all());
        $store->save();

        return back()->with('status', '['. $table .'] berhasil ditambahkan.');
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
    public function edit($table, $id, \Kris\LaravelFormBuilder\FormBuilder $builder)
    {
        $model = '\\App\\Models\\' . $table;
        $form = $builder->create(\App\Forms\EditForm::class, [
            'method' => 'POST',
            'url' => route('dashboard.update', [$table, $id]),
            'model' => new $model,
            'data' => [
                'records' => $model::where('id', $id)->get(),
            ],
        ]);

        $context = ['form' => $form];
        return view('pages.dashboard.edit', $context);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $table)
    {
        $model = '\\App\\Models\\' . $table;
        $result = $model::updateOrCreate(['id' => $request->id], $request->all());

        return redirect()->route('dashboard.display', $table)->with('status', 'Berhasil menyunting data.');
    }

    public function search(Request $request) {
        return $request->all();
    }

    public function faq() {
        $context = [
            'title' => 'FAQ',
            'menus' => $this->getMenu(),
        ];

        return view('pages.dashboard.faq', $context);
    }

    public function display($table)
    {
        $model = '\\App\\Models\\' . ucfirst($table);

        $context = [
            'title' => ucwords($table),
            'model' => new $model,
            // LOOK FOR HOW TO SELECT WITHOUT ID AND/OR ANY SENSITIVE DATA
            'records' => $model::orderBy('id')->get(),
            'columns' => $this->getColNames(new $model),
            'colTypes' => $this->getColTypes(new $model),
            'menus' => $this->getMenu(),
        ];
        return view('pages.dashboard.display', $context);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($table, $id)
    {
        $model = '\\App\\Models\\' . $table;
        $model::destroy($id);
        return back()->with('status', 'Data berhasil dihapus.');   
    }
}