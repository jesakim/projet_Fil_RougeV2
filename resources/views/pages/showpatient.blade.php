@extends('layouts.dashboard')


@section('content')
<div class="card-body bg-white p-3 rounded-3">
    <div class="row gx-4 align-items-center">
        <div class="col-auto">
        <div class="avatar avatar-xl position-relative">
        <img src="https://ui-avatars.com/api/?name={{$patient->name}}&background=random&size=350&uppercase=false&font-size=0.5" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
        </div>
        </div>
    <div class="col-auto my-auto">
        <div class="h-100">
        <h5 class="mb-1">
            {{$patient->name}}
        </h5>
        <p class="mb-0 font-weight-bold text-sm">
            {{$patient->phone}}
        </p>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
    <div class="nav-wrapper position-relative end-0">
    <ul class="nav nav-pills nav-fill p-1" role="tablist">
    <li class="nav-item">
        <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center active" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
        <i class="fa-regular fa-user"></i>
        <span class="ms-2">Patient</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
        <i class="fa-solid fa-calendar-days"></i>
        <span class="ms-2">Reservations</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
        <i class="fa-solid fa-file-invoice"></i>
        <span class="ms-2">factures</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
        <i class="fa-solid fa-notes-medical"></i>
        <span class="ms-2">Ordonnace</span>
    </a>
    </li>
    <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 99px;"><a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">-</a></div></ul>
    </div>
     </div>
    </div>
</div>
@if (session()->has('success'))
<div class="alert alert-success  border-0 text-white m-0 mt-2" role="alert">
    {{ session()->get('success') }}
</div>
@endif

<div class="row mt-3">
<div class="col-md-6">
    <div class="card">
    <div class="card-body">
    <p class="text-uppercase text-bold">Patient Information</p>
    <div class="row align-items-center">
<form action="{{route('patients.update',$patient->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="col">
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Patient name</label>
            <input class="form-control pat-int" type="text" value="{{$patient->name}}" disabled name="name">
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Patient phone</label>
            <input class="form-control pat-int " type="text" value="{{$patient->phone}}" disabled name="phone">
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Patient assurance</label>
            <select class="form-control pat-int" id="exampleFormControlSelect1" disabled name="assurance_id">
                @foreach ($assurances as $assurance)
                <option value="{{$assurance->id}}" {{$assurance->id == $patient->assurance_id ? 'selected' : ''}}>{{$assurance->name}}</option>
                @endforeach
            </select>
          </div>
    </div>
    <div class="col">
        <div class="form-group mt-3 m-0">
            <button type="button" class="btn btn-primary w-100 m-0" onclick="editPatient(this)">Edit</button>
            <button type="submit" class="btn btn-primary w-100 d-none m-0">Save Changes</button>
        </div>
    </div>
</form>
    </div>

    </div>
    </div>
</div>

<div class="col-md-6">
    <div class="card mb-4">
    <div class="card-header pb-0">
    <h6>Projects table</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
     <table class="table align-items-center justify-content-center mb-0">
    <thead>
    <tr>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Patient</th>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Completion</th>
    <th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($patient->reservations as $reservation)


    <tr>
        <td>
        <div class="d-flex px-2">
        <div>
        <img src="https://ui-avatars.com/api/?name={{$patient->name}}&background=random&size=350&uppercase=false&font-size=0.5" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
        </div>
        <div class="my-auto">
        </div>
        </div>
        </td>
        <td>
        <p class="text-sm font-weight-bold mb-0">$2,500</p>
        </td>
        <td>
        <span class="text-xs font-weight-bold">working</span>
        </td>
        <td class="align-middle text-center">
        <div class="d-flex align-items-center justify-content-center">
        <span class="me-2 text-xs font-weight-bold">60%</span>
        <div>
        <div class="progress">
        <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
        </div>
        </div>
        </div>
        </td>
        <td class="align-middle">
        <button class="btn btn-link text-secondary mb-0">
        <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
        </button>
        </td>
    </tr>
    @endforeach


    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>

</div>
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<div class="form-group w-100">
    <select class="selectpicker w-100" data-live-search="true">
        @foreach ($assurances as $assurance)
        <option value="{{$assurance->id}}" {{$assurance->id == $patient->assurance_id ? 'selected' : ''}}>{{$assurance->name}}</option>
        @endforeach
    </select>
</div> --}}




@endsection
