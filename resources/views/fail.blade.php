@extends('layouts.status-app')

@section('title')
ConceptX | Payment Form
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div id="yttc-form-div">

            <div class="container">

                <h1 id="yttc-title">ConceptX</h1>
                <br>
                <div class="alert alert-danger">
                    <p>Your order was failed, you can try again <a href="{{ url('/') }}">here</a>.</p>
                </div>

            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    @endsection