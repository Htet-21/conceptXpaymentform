@extends('layouts.admin-app')

@section('title')
Order Detail | ConceptX
@endsection

@section('content')

<div id="renewed-driver" class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">

        <h1 style="text-align:left;" id="edit-license-type">Order and Payemnt Detail</h1>

        <p>Name: {{$donation_detail->customer_name}}</p>
        <hr>

        <p>Gender: {{$donation_detail->customer_gender}}</p>
        <hr>

        <p>Birthday: {{$donation_detail->birth}}</p>
        <hr>

        <p>Cis student: {{$donation_detail->cis}}</p>
        <hr>

        <p>Student's previous grade: {{$donation_detail->grade}}</p>
        <hr>

        <p>phone number: {{$donation_detail->phone}}</p>
        <hr>

        <p>Mother's name: {{$donation_detail->name1}}</p>
        <hr>

        <p>Mother's nrc: {{$donation_detail->nrc1}}</p>
        <hr>

        <p>Father's name: {{$donation_detail->name2}}</p>
        <hr>

        <p>Father's nrc: {{$donation_detail->nrc2}}</p>
        <hr>

        <p>Parents' occupation: {{$donation_detail->occupation}}</p>
        <hr>

        <p>siblings: {{$donation_detail->sibling_num}}</p>
        <hr>

        <p>siblings name and age: {{$donation_detail->sibling}}</p>
        <hr>

        <p>Guardian phone number: {{$donation_detail->guardian}}</p>
        <hr>

        <p>Viber phone number: {{$donation_detail->viber}}</p>
        <hr>

        <p>States / Regions: {{$donation_detail->states}}</p>
        <hr>

        <p>Address: {{$donation_detail->address}}</p>
        <hr>

        <p>Mail: {{$donation_detail->email}}</p>
        <hr>

        <p>Order ID: {{$donation_detail->order_id}}</p>
        <hr>

        <p>Amount: {{$donation_detail->amount}}</p>
        <hr>

        <p>Payment status: {{$donation_detail->transaction_status}}</p>
        <hr>

        @if($donation_detail->remark !== null)
        <p>Remark: {{$donation_detail->remark}}</p>
        <hr>
        @endif
      </div>
    </div>
  </div>
</div>


@endsection

@section('scripts')

@endsection