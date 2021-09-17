@extends('layouts/layout')
@section('content')
  {{-- <h2>{{ $formData->name }}</h2>
  <form action="">
      {!! $formData->code !!}
  </form> --}}
  <div class="container-fluid h-100 bg-light text-dark">
  <div class="row justify-content-center  text-center align-items-center">
    <h1>{{ $formData->name }}</h1>    
  </div>
  <hr/>
  <div class="row justify-content-center align-items-center h-100">
    <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
      <form action="">
          {!! $formData->code !!}

      </form>
    </div>
  </div>
</div>
@endsection