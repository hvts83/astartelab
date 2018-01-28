@extends('layouts.app')

@section('content')


<div class="wrapper wrapper-content animated fadeInRight">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="text-center m-t-lg">
            <h1>
                Bienvendo
            </h1>
            <small>
                It is an application skeleton for a typical web app. You can use it to quickly bootstrap your webapp projects.
            </small>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
