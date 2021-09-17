@extends('layouts/layout')
@section('content')

  <div class="container-fluid">
      <div class="card h-50 text-center">
        <div class="card-header h2">
          Create Your Form
        </div>
        <div class="card-body h-100">
          <h5 class="card-title">Create Your Awsome Form </h5>
          <p class="card-text">There are notheing ambiguous to write code.You can make your form easeily</p>
          <span class="navbar-brand mb-0 h1">
            <input id="txt" type="text"  style="width:40%" value="" placeholder="Enter Form Name">
         </span> 
        </div>
      </div>
    
    <div class="row bg-secondary text-white">
      <div class="col-3">
         <h3>Tool</h3>
      </div>
      <div class="col-9" style="display: flex">
        <div class="col-8">
               <h3 id="preview">Form Name</h3>
        </div>
         <div class="col-4">
             <button type="button"id="saveForm"class="btn btn-primary float-right">Save</button>
         </div>
          {{-- <button type="button"id="sendForm"class="btn btn-info float-right">Semd Form </button> --}}
          
      </div>
    </div>
    <div class="row">
      <div class="col-3 header-tool">
        {{-- <h2>Tool</h2> --}}
        <h3 class="tool tool-1">Text Field</h3>        
        <h3 class="tool tool-2">Radio Button</h3>
        <h3 class="tool tool-3">Check Box</h3>
        <h3 class="tool tool-4">Button</h3>
        <h3 class="tool tool-5">Column</h3>
      </div>
      <div class="col-9 right-aside canvas">
        
      </div>
    </div>
  </div>
@endsection
@section('scripts')
<script>
  function textInput(){
     var fname =document.getElementById('fname');
     var placeHolder = prompt("Enter place holder");
     var id = prompt("Enter new id");
     fname.placeholder=placeHolder;
     fname.id=id;
  }
   function myBtn(){
     var btn =document.getElementById('btn');
     var btnValue = prompt("Enter button value");
     btn.value=btnValue;
   }
  
</script>
@endsection