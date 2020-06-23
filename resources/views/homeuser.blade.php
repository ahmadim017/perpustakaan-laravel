@extends('layouts.materialize')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m12">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Welcome User</span>
              <p>You are logged in! <b>{{auth::user()->name}}</b></p>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection