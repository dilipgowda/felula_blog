@extends('layouts.app')

@section('content')
 
<div class="container mt-5">
 
   
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
 
  <div class="card">
 
    <div  style="padding:30px;"  class="card-header font-weight-bold">
      <h2  class="float-left">Import CSV File for posts</h2>
      
    </div>
 
    <div class="card-body">
 
        <form id="excel-csv-import-form" method="POST"  action="{{ url('import-excel-csv-file') }}" accept-charset="utf-8" enctype="multipart/form-data">
 
          @csrf
                   
            <div class="row">
 
                <div style="padding:30px;"  class="col-md-12">
                    <div class="form-group">
                        <input type="file" name="file" placeholder="Choose file">
                    </div>
                    @error('file')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>              
  
                <div style="padding:30px;" class="col-md-12">
                    <button type="submit" class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl" id="submit">Submit</button>
                </div>
            </div>     
        </form>
 
    </div>
 
  </div>
 
</div>  
@endsection