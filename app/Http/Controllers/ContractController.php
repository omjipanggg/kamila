<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContractController extends Controller
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
            'title' => 'PKWT Digital',
            'records' => \App\Models\ProposalApplicant::with(['applicant', 'proposal'])->get(),
            'menus' => $this->getMenu(),
        ];
        return view('pages.contract.index', $context);
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

    public function upload(Request $request) {
        $request->validate(
            ['template' => 'required', 'selectedId' => 'required|min:1'],
            ['selectedId.required' => 'The record field is required.'],
        );

        $destination = storage_path('app/public/uploads/templates/');
        $filename = $request->file('template')->getClientOriginalName();
        $result =  $request->file('template')->move($destination, $filename);

        // ACTIVATE THIS IF NEEDED
        // \App\Models\TemplateModel::create(['path' => $filename, 'uploaded_by' => $request->user()->id]);

        if (!$result) { return back()->with('status', 'Gagal mengunggah.'); }

        $context = [
            'title' => 'PKWT Variables',
            'menus' => $this->getMenu(),
            'proposalId' => \App\Models\ProposalApplicant::where('id', $request->selectedId)->with(['applicant', 'proposal'])->pluck('id')->first(),
            'templateId' => $filename,
            'lastId' => \App\Models\Employee::orderBy('id', 'desc')->pluck('id')->first(),
        ];
        return view('pages.contract.fields', $context);
    }

    // public function generate($id) {
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

    //     foreach($phpWord->getSections() as $section) {
    //         foreach($section->getElements() as $element) {
    //             if (method_exists($element, 'getElements')) {
    //                 foreach($element->getElements() as $childElement) {
    //                     if (method_exists($childElement, 'getText')) {
    //                         $content .= $childElement->getText() . ' ';
    //                     }
    //                     else if (method_exists($childElement, 'getContent')) {
    //                         $content .= $childElement->getContent() . ' ';
    //                     }
    //                 }
    //             }
    //             // else if (method_exists($element, 'getText')) {
    //             //     $content .= printf($element->getText()) . ' ';
    //             // }
    //         }
    //     }
    // }

    public function generate(Request $request, $id)
    {
        $tuples = \App\Models\ProposalApplicant::where('id', $id)->with(['applicant', 'proposal'])->get();

        $word = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/public/uploads/templates/' . $request->templateId));

        $newlyId = '';

        if (!isset($request->newEmployeeId)) { $newlyId = \App\Models\Employee::orderBy('id', 'desc')->pluck('id')->first(); }
        else { $newlyId = $request->newEmployeeId; }
        
        foreach ($tuples as $tuple) {
            $name = $tuple->applicant->name;
            $word->setValues([
                'uniqueHead' => $request->latestId . '/' . $request->uniqueId,
                'newEmployeeId' => $newlyId,
                'startDate' => $this->dateIndo($request->startDate),
                'endDate' => $this->dateIndo($request->endDate),
                'primarySalary' => number_format($request->primarySalary,0,',','.'),
                'secondarySalary' => number_format($request->secondarySalary,0,',','.'),
                'totalSalary' => number_format(intval($request->primarySalary) + intval($request->secondarySalary),0,',','.'),
                'applicantName' => $name,
                'applicantNameBig' => strtoupper($name),
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
        }
        $filename = storage_path('app/public/uploads/templates/' . $name);
        $word->saveAs($filename . '.docx');

        $headers = [
            // 'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'Content-Type' => 'application/pdf',
        ];

        \ConvertApi\ConvertApi::setApiSecret('Z8AyNVOZ8hxKiJY0');
        $pdf = \ConvertApi\ConvertApi::convert('pdf', [
            'File' => $filename . '.docx',
            'PageRange' => '1-10',
            'PageOrientation' => 'portrait',
            'PageSize' => 'a4',
            ], 'docx');
        $pdf->saveFiles(storage_path('app/public/uploads/templates/'));        

        // PHPWord Library
        // \PhpOffice\PhpWord\Settings::setPdfRendererName(\PhpOffice\PhpWord\Settings::PDF_RENDERER_DOMPDF);
        // \PhpOffice\PhpWord\Settings::setPdfRendererPath('.');
        // $temp = \PhpOffice\PhpWord\IOFactory::load($filename . '.docx');
        // $pdf = \PhpOffice\PhpWord\IOFactory::createWriter($temp, 'PDF');
        // $pdf->save($filename . '.pdf', true);

        unlink($filename . '.docx');
        // unlink(storage_path('app/public/uploads/templates/' . $request->templateId));

        return response()->download($filename . '.pdf', date('dmY') . ' - PKWT - ' . $name . '.pdf', $headers)->deleteFileAfterSend(true);
    }

    public function preview(Request $request)
    {
        $context = [
            'dates' => [
                'start' => '2022-12-01',
                'end' => '2023-05-01',
            ],
            'newlyId' => \App\Models\Employee::orderBy('id', 'desc')->pluck('id')->first(),
            'applicants' => Applicant::where('id', $request->id)->get(),
        ];
        return view('pages.contract.preview', $context);
    }
}