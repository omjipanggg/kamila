@extends('layouts.base')
@section('content')
<main class="main" id="main">
    <div class="container-fluid">

        <div class="row">
            <div class="col">
                <h1 class="dash mt-3">Dashboard</h1>
                @include('components.breadcrumb')
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <div class="group">
                    {{ Form::open(['route' => ['applicant.generate', $proposalId], 'files' => true,]) }}
                        <input type="hidden" name="templateId" value="{{ $templateId }}" />
                        <div class="d-flex gap-2 flex-wrap">
                            <div class="form-floating flex-fill">
                              <input autocomplete="off" type="text" class="form-control" id="uniqueId" placeholder="Head" name="uniqueId" />
                              <label for="uniqueId">Nomor PKWT</label>
                            </div>
                            <div class="form-floating mb-2 flex-fill">
                              <input autocomplete="off" type="text" class="form-control" id="newEmployeeId" placeholder="B0222001" name="newEmployeeId" />
                              <label for="newEmployeeId">NIK (Baru)</label>
                            </div>
                            <div class="form-floating mb-2 flex-fill">
                              <input autocomplete="off" type="text" class="form-control" id="workPlace" placeholder="Jakarta" name="workPlace" />
                              <label for="workPlace">Lokasi kerja</label>
                            </div>
                        </div>
                        <div class="d-flex gap-2 flex-wrap">
                            <div class="form-floating flex-fill">
                              <input autocomplete="off" type="date" class="form-control" id="startDate" placeholder="Tanggal mulai" name="startDate" />
                              <label for="startDate">Tanggal mulai</label>
                            </div>
                            <div class="form-floating flex-fill">
                              <input autocomplete="off" type="date" class="form-control" id="endDate" placeholder="Tanggal berakhir" name="endDate" />
                              <label for="endDate">Tanggal berakhir</label>
                            </div>
                            <div class="form-floating flex-fill">
                              <input autocomplete="off" type="number" class="form-control" id="primarySalary" placeholder="Gaji pokok" name="primarySalary" />
                              <label for="primarySalary">Gaji pokok</label>
                            </div>
                            <div class="form-floating flex-fill">
                              <input autocomplete="off" type="number" class="form-control" id="secondarySalary" placeholder="Tunjangan tetap" name="secondarySalary" />
                              <label for="secondarySalary">Tunjangan tetap</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg btn-color my-2">Generate&nbsp;&nbsp;<i class="fas fa-floppy-disk"></i></button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</main>
<div class="big"></div>
@endsection