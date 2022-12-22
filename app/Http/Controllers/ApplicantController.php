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

    public function index()
    {
        $context = [
            'title' => 'Data Pelamar',
            'model' => new Applicant,
            'records' => Applicant::all(),
            'menus' => $this->getMenu(),
            'columns' => $this->getColNames(new Applicant),
        ];

        return view('pages.applicant.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(\Kris\LaravelFormBuilder\FormBuilder $builder)
    {
        $form = $builder->create('\App\Forms\InsertForm', [
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
            'title' => 'Data Pelamar',
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
        $result['id'] = substr(\Str::uuid(), 0, 8);
        // $result['status'] = 1;
        $result['created_at'] = now();
        $result['updated_at'] = now();
        $save = Applicant::create($result);
        if ($save) {
            return redirect()->route('applicant.index')->with('status', 'Berhasil menyimpan data.');
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

    public function indexFpdf() {
    }

    public function createPDF($id)
    {
        $applicant = Applicant::where('id', $id)->pluck('name')->first();
        $context = [
            'dates' => [
                'start' => '2022-12-01',
                'end' => '2023-05-01',
            ],
            'newlyId' => \App\Models\Employee::orderBy('id', 'desc')->pluck('id')->first(),
            'applicants' => Applicant::where('id', $id)->get(),
        ];
        $pdf = \PDF::loadView('pages.applicant.contract', $context)->setPaper('A4');
        return $pdf->download('PKWT - ' . $applicant . ' - ' . date('Ymd') . '.pdf');
    }

    public function previewPDF()
    {
        // applicant
        // vendor
        // department
        // join_date
        // expire_date
        // salary

        $context = [
            'dates' => [
                'start' => '2022-12-01',
                'end' => '2023-05-01',
            ],
            'newlyId' => \App\Models\Employee::orderBy('id', 'desc')->pluck('id')->first(),
            'applicants' => Applicant::where('id', 'e0d096b9')->get(),
        ];
        return view('pages.applicant.contract', $context);
    }

    public function destroy($id)
    {
        //
    }
}
