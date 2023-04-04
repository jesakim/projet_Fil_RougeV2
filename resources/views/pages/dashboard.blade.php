@extends('layouts.dashboard')

@section('dashbtn','active')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn bg-success text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Make reservation
  </button>
  @if ($errors->any())
  <div class="alert alert-danger border-0 alert-dismissible fade show m-0 mt-2" role="alert">
      <ul class="m-0">
          @foreach ($errors->all() as $error)
              <li class="text-white">{{ $error }}</li>
          @endforeach
      </ul>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('reservations.store')}}" method="POST">
                @csrf
            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Select patient</label>
                <select class="selectpicker" data-live-search="true" name="patient_id">
                    @foreach ($patients as $patient)
                    <option value="{{$patient->id}}">{{$patient->name}}</option>
                    @endforeach
                </select>
              </div>
            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Reservation date</label>
                <input type="datetime-local" class="form-control" id="exampleFormControlInput1" name='date'>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn bg-gradient-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Money</p>
                <h5 class="font-weight-bolder">
                  $53,000
                </h5>
                <p class="mb-0">
                  <span class="text-success text-sm font-weight-bolder">+55%</span>
                  since yesterday
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Users</p>
                <h5 class="font-weight-bolder">
                  2,300
                </h5>
                <p class="mb-0">
                  <span class="text-success text-sm font-weight-bolder">+3%</span>
                  since last week
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">New Clients</p>
                <h5 class="font-weight-bolder">
                  +3,462
                </h5>
                <p class="mb-0">
                  <span class="text-danger text-sm font-weight-bolder">-2%</span>
                  since last quarter
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
                <h5 class="font-weight-bolder">
                  $103,430
                </h5>
                <p class="mb-0">
                  <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


@livewire('patient-waiting-list')

<style>
    .dropdown-menu{
        width: 100% !important;
        min-width: unset !important;
    }
    .bootstrap-select{
        width: 100% !important;

    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
@endsection
