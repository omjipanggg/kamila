<?php

namespace App\Http\Controllers;

use Codedge\Fpdf\Fpdf\Fpdf;
use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $fpdf;

    public function __construct()
    {
        $this->middleware('auth');
        $this->fpdf = new Fpdf('P', 'cm', 'A4');
    } 

    public function getMenu()
    {
        return \App\Models\Menu::where('role_id', '=', \Auth::user()->role_id)->get();
    }

    public function index()
    {
        $context = [
            'title' => 'Data Pelamar',
            'menus' => \App\Models\Menu::where('role_id', '=', \Auth::user()->role_id)->get(),
            'model' => new Applicant,
            'records' => Applicant::all(),
            'columns' => $this->getColNames(new Applicant),
        ];
        return view('pages.applicant.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(\Kris\LaravelFormBuilder\FormBuilder $fb)
    {
        $form = $fb->create('\App\Forms\InsertForm', [
            'method' => 'POST',
            'url' => route('applicant.store'),
            'data' => [
                'gender_id' => \App\Models\Gender::pluck('name', 'id')->toArray(),
                'religion_id' => \App\Models\Religion::pluck('name', 'id')->toArray(),
                'blood_type_id' => \App\Models\BloodType::pluck('name', 'id')->toArray(),
            ],
            'model' => new Applicant,
        ]);

        $context = [
            'title' => 'Applicant',
            'form' => $form,
            'menus' => $this->getMenu(),
        ];
        return view('pages.applicant.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $request->all();
        $result['id'] = \Str::uuid(8)->toString();
        $save = Applicant::create($result);
        if ($save) {
            return back()->with('status', 'Berhasil menyimpan data.');
        }
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function testing($id) {}
    public function scoring($id) {}
    public function offering($id) {}

    public function genderateFpdf($table, Request $request)
    {

        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->AddPage();
        $this->fpdf->Cell(40, 10, $request->all(), 1);
        $this->fpdf->Cell(60, 10, $table, 1);
        $this->fpdf->Output();
    }

    public function destroy($id)
    {
        //
    }
}
