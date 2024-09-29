@extends('layouts.app')
@section('title','Update User Profile')
@section('content')

<div class="container bootstrap snippets bootdeys" style="margin-top: 100px;">
<div class="row d-flex justify-content-center">
  <div class="col-xs-12 col-sm-9">
   <livewire:change-data :user="$user->id">
  
  </div>
</div>
</div>
@endsection