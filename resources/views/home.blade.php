@extends('layouts.app')

@section ('title') {{ $page_title }} @stop

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="container">
    <div class="row">
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
    </div>
    <div class="row">
      <div class="widget style1 navy-bg">
          <div class="row">
              <div class="col-xs-4">
                  <i class="fa fa-cloud fa-5x"></i>
              </div>
              <div class="col-xs-8 text-right">
                  <span> Today degrees </span>
                  <h2 class="font-bold">26'C</h2>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
