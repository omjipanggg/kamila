<?php

namespace App\Http\Controllers;

use Codedge\Fpdf\Fpdf\Fpdf;
use PhpOffice\PhpWord\PhpWord;
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
        $this->phpWord = new PhpWord();
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
        $form = $builder->create(\App\Forms\InsertForm::class, [
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

        $filename = $request->get('name') . '.' . $request->file('picture')->extension();
        $request->file('picture')->storeAs('uploads/applicants/pictures', $filename);
        
        $result['picture'] = $filename;

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
    public function testing() {}
    public function scoring($id) {}

    public function selectTemplate(Request $request) {
        // $context = [
        //     'title' => 'Fill Variables',
        //     'menus' => $this->getMenu(),
        //     'selectedTemplate' => 'ASD',
        // ];
        // return view('pages.applicant.contractor', $context);
    }

    public function createPKWT($id)
    {
        $context = [
            'title' => 'Generate',
            'menus' => $this->getMenu(),
            'selected' => \App\Models\ProposalApplicant::where('id', $id)->with('applicant', 'proposal')->get(),
        ];
        return view('pages.applicant.templating', $context);
    }

    // public function generatePDF($id) {
    //     $applicant = Applicant::where('id', $id)->pluck('name')->first();
    //     $context = [
    //         'dates' => [
    //             'start' => '2022-12-01',
    //             'end' => '2023-05-01',
    //         ],
    //         'newlyId' => \App\Models\Employee::orderBy('id', 'desc')->pluck('id')->first(),
    //         'applicants' => Applicant::where('id', $id)->get(),
    //     ];
    //     $pdf = \PDF::loadView('pages.applicant.contract', $context)->setPaper('A4');
    //     return $pdf->download('PKWT - ' . $applicant . ' - ' . date('Ymd') . '.pdf');        
    // }
    // foreach($phpWord->getSections() as $section) {
    //     foreach($section->getElements() as $element) {
    //         if (method_exists($element, 'getElements')) {
    //             foreach($element->getElements() as $childElement) {
    //                 if (method_exists($childElement, 'getText')) {
    //                     $content .= $childElement->getText() . ' ';
    //                 }
    //                 else if (method_exists($childElement, 'getContent')) {
    //                     $content .= $childElement->getContent() . ' ';
    //                 }
    //             }
    //         }
    //         // else if (method_exists($element, 'getText')) {
    //         //     $content .= printf($element->getText()) . ' ';
    //         // }
    //     }
    // }

    public function pkwtIndex() {
        $context = [
            'title' => 'Offering Letter',
            'records' => \App\Models\ProposalApplicant::with(['applicant', 'proposal'])->get(),
            'menus' => $this->getMenu(),
        ];
        return view('pages.applicant.offering', $context);
    }

    public function dynamicForm() {
        $request->validate(['template' => 'required', 'selectedId' => 'required|min:1'], ['selectedId.required' => 'The record field is required.']);

        $destination = storage_path('app\\public\\uploads\\templates\\');
        $filename = $request->file('template')->getClientOriginalName();
        $result =  $request->file('template')->move($destination, $filename);
        // \App\Models\TemplateModel::create(['path' => $filename, 'uploaded_by' => $request->user()->id]);

        if (!$result) {
            return back()->with('status', 'Gagal mengunggah.');
            exit;
        }

        $content = ''; 
        $template = storage_path('app\\public\\uploads\\templates\\' . $filename);

        $phpWord = \PhpOffice\PhpWord\IOFactory::load($template);

        foreach($phpWord->getSections() as $section) {
            foreach($section->getElements() as $element) {
                if (method_exists($element, 'getElements')) {
                    foreach($element->getElements() as $childElement) {
                        if (method_exists($childElement, 'getText')) {
                            $content .= $childElement->getText() . ' ';
                        }
                        else if (method_exists($childElement, 'getContent')) {
                            $content .= $childElement->getContent() . ' ';
                        }
                    }
                }
                else if (method_exists($element, 'getText')) {
                    $content .= $element->getText() . ' ';
                }
            }
        }
        
        preg_match_all('/{+(.*?)}/', $content, $matches);

        $form = $builder->create(\App\Forms\InsertPKWTForm::class, [
            'method' => 'POST',
            'url' => route('applicant.generate'),
            'data' => [
                'count' => substr_count($content, '$'),
                'name' => str_ireplace(' ', '', $matches[1]),
            ],
        ]);

    }

    public function uploadTemplate(Request $request) {
        $request->validate(['template' => 'required', 'selectedId' => 'required|min:1'], ['selectedId.required' => 'The record field is required.']);

        $destination = storage_path('app/public/uploads/templates/');
        $filename = $request->file('template')->getClientOriginalName();
        $result =  $request->file('template')->move($destination, $filename);
        // \App\Models\TemplateModel::create(['path' => $filename, 'uploaded_by' => $request->user()->id]);

        if (!$result) {
            return back()->with('status', 'Gagal mengunggah.');
            exit;
        }

        $context = [
            'title' => 'Fill PKWT Variables',
            'menus' => $this->getMenu(),
            'proposalId' => \App\Models\ProposalApplicant::where('id', $request->selectedId)->with(['applicant', 'proposal'])->pluck('id')->first(),
            'templateId' => $filename,
        ];
        return view('pages.applicant.templating', $context);
    }

    public function generatePDF(Request $request, $id)
    {
        $tuples = \App\Models\ProposalApplicant::where('id', $id)->with(['applicant', 'proposal'])->get();

        $word = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/public/uploads/templates/' . $request->templateId));
        
        foreach ($tuples as $tuple) {
            $word->setValues([
                'uniqueHead' => $request->uniqueId,
                'newEmployeeId' => $request->newEmployeeId,
                'startDate' => $this->dateIndo($request->startDate),
                'endDate' => $this->dateIndo($request->endDate),
                'primarySalary' => number_format($request->primarySalary,0,',','.'),
                'secondarySalary' => number_format($request->secondarySalary,0,',','.'),
                'totalSalary' => number_format(intval($request->primarySalary) + intval($request->secondarySalary),0,',','.'),
                'applicantName' => $tuple->applicant->name,
                'dayString' => $this->dayString(date('w')),
                'domString' => $this->numString(date('j')),
                'monthString' => $this->monthString(date('n')),
                'yearString' => $this->numString(date('Y')),
                'fullDate' => date('d/m/Y'),
                'applicantIdNumber' => $tuple->applicant->id_number,
                'applicantBirthPlace' => $tuple->applicant->birth_place,
                'applicantBirthDate' => $this->dateFormat($tuple->applicant->birth_date), 
                'applicantGender' => $tuple->applicant->gender->name,
                'applicantAddress' => $tuple->applicant->current_address,
                'proposalPosition' => $tuple->proposal->position->name, 
                'proposalDepartment' => $tuple->proposal->position->department->name, 
                'proposalVendor' => $tuple->proposal->vendor->name, 
                'workPlace' => $request->workPlace, 
                'countDays' => $this->countDays($request->startDate, $request->endDate),
            ]);
            $name = $tuple->applicant->name;
        }
        $filename = storage_path('app/public/uploads/templates/' . $name);
        $word->saveAs($filename . '.docx');

        $context = [
            'title' => 'Offering Letter',
            'records' => \App\Models\ProposalApplicant::with(['applicant', 'proposal'])->get(),
            'menus' => $this->getMenu(),
        ];

        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ];

        \ConvertApi\ConvertApi::setApiSecret('Z8AyNVOZ8hxKiJY0');
        $pdf = \ConvertApi\ConvertApi::convert('pdf', [
            'File' => $filename . '.docx',
            'PageRange' => '1-10',
            'PageOrientation' => 'portrait',
            'PageSize' => 'a4',
            ], 'docx');
        $pdf->saveFiles(storage_path('app/public/uploads/templates/'));        

        unlink($filename . '.docx');

        return response()->download($filename . '.pdf', date('dmY') . ' - PKWT - ' . $name . '.pdf', $headers)->deleteFileAfterSend(true);
        // return response()->download($filename . '.docx', date('dmY') . ' - PKWT - ' . $name . '.pdf', $headers)->deleteFileAfterSend(true);
    }

    public function previewPDF()
    {
        $context = [
            'dates' => [
                'start' => '2022-12-01',
                'end' => '2023-05-01',
            ],
            'newlyId' => \App\Models\Employee::orderBy('id', 'desc')->pluck('id')->first(),
            'applicants' => Applicant::where('id', 'HXMEPM8Q')->get(),
        ];
        return view('pages.applicant.contract', $context);
    }

    public function destroy($id)
    {
        //
    }
}
