<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $context = [
            'title' => 'Data Lamaran',
            'model' => new Proposal,
            'records' => Proposal::all(),
            'columns' => $this->getAllColumns(new Proposal),
        ];
        return view('pages.proposal.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.proposal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getSingle(Request $request)
    {
        return $proposal = Proposal::where($request)->first();
    }

    public function store(Request $request)
    {
        Proposal::create($request->all());
        return redirect()->route('pages.proposal.index')->with('status', 'Lamaran baru berhasil diposting.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show(Proposal $proposal)
    {
        return view('pages.proposal.show', compact('proposal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal)
    {
        return view('pages.proposal.edit', compact('proposal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
    {
        $request->validate([

        ]);

        $proposal->update($request->all());
        return redirect()->route('pages.proposal.index')->with('status', 'Berhasil menyunting lamaran.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposal $proposal)
    {
        $proposal->delete();
        return redirect('pages.proposal.index', 'refresh')->with('status', 'Lamaran berhasil dihapus.');
    }
}
