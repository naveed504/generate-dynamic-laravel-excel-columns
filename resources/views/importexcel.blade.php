@extends('layouts.master')
@section('content')
<div class="container"> 
  <div class="row" style="margin-top: 80px;">
  <div class="col-md-6 offset-3">  
    <form action="{{route('importexcel')}}" method="post" enctype="multipart/form-data" id="importexcel">
        @csrf
        <div class="custom-file">
            <input type="file" name="excelfile" class="form-control input__box--wrapper custom-file-input"  >
            <span class="custom-file-label" for="validatedCustomFile">Choose Excel File</span>
        </div> 
      <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>
    </form>  
  </div>
  </div>
</div>
@endsection