@extends('layouts/layout')
@section('content')
<div class="container">
  <div class="card h-50 text-center">
    <div class="card-header h2">
      Form Buider App
    </div>
    <div class="card-body h-100">
      <h5 class="card-title">Create Your Awsome Form </h5>
      <p class="card-text">There are notheing ambiguous to write code.You can make your form easeily</p>
      <a href="{{ route('create.page') }}" class="btn btn-primary">Create Form</a>
    </div>
    <div class="card h-50 text-center">
    <div class="card-header h2">
      Forms List
    </div>
    <div class="card-body h-100">
      <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Form Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
           
            <tr>
              @foreach($forms as $key => $value)            
              <th scope="row">{{ $key+1 }}</th>
              <td>{{ $value->name }}</td>
              <td>
                <a href="{{ route('show.form',[$value->id]) }}" target="_blank " class="btn btn-info">view</a>
                <a href="#" id="getUrl" class="btn btn-primary" data-id="{{ $value->id }}" data-toggle="modal" data-target="#myModal">send</a>
                <input type="hidden" value="{{ $value->id }}" id="h_v">
                <a href="{{ route('delete.form',[$value->id]) }}" class="btn btn-warning">delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
      </table>
    </div>
    
</div>
<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
         <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#link">link</button>
         <button type="button" id="embedLink" class="btn btn-info" data-toggle="collapse" data-target="#iframe">iframe</button>
         <input type="hidden" id="headerInput" value="">      

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         
          <div id="link" class="collapse">
            <input type="text" id="showForm" value="">
            <button id="link">Copy link</button>
          </div>
          <div id="iframe" class="collapse">
            <h3>Embed HTML</h3>
            <p>Embed form on your website</p>
            <p>Copy and paste this code snippet in your website to display form.</p>
          
             <textarea name="" id="textArea" rows="10" cols="30">
                  
                     
                 
             </textarea> 
         
            <button id="iframe">Copy</button>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
@endsection

@section('scripts')
 <script>
   $(function(){
      $(document).on("click", "#getUrl", function () {
        var id = $(this).data('id');
        var url="http://127.0.0.1:8000/form/show/"+id;
        $(".modal-body #showForm").val(url);
        $("#headerInput").val(url);
        $("#framInput").val(url);

          // $('#iframe #framInput').attr('src', "http://www.google.com");
    });
    $(document).on("click", "#embedLink", function () {
        var textArea=$("#textArea");
        var url = $('#headerInput').val();
        $("#framInput").val(url);
        var iframe =document.getElementById('ifrm');
        var html= '<iframe\n id="ifrm" \nsrc="'+url+'"\nwidth="100%" \nheight="600" \nframeborder="0"\n>\n</iframe>';
        textArea.text(html);        
    });

    $("#link").click(function(){
        $("#showForm").select();
        document.execCommand('copy');
    });

    $("#iframe").click(function(){
        $("#textArea").select();
        document.execCommand('copy');
    });
  });   
 </script>
@endsection
