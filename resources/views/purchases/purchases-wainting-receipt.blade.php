@extends('adminlte::page')

@section('title', 'Purchases Wainting Receipt')

@section('content_header')
  <div class="row mb-2">
    <div class="col-sm-6">
        <h1>Purchases Wainting Receipt</h1>
    </div>
  </div>
@stop

@section('right-sidebar')

@section('content')

<div class="card">
  @livewire('purchases-wainting-receipt')
<!-- /.card -->
</div>

@stop

@section('css')
@stop

@section('js')
@stop