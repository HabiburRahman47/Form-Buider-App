<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Drag and Drop</title>
    {{-- Custome Css file --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link
      href="{{ asset('assets/bootstrap/bootstrap.min.css') }}"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{ asset('assets/js/jquery-ui.css') }}" />
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    {{-- Custom jquery file --}}
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script>
        $(document).ready(function(){
          $("#saveForm").click(function(){
              // var canvas = $(".canvas")[0].outerHTML;
              var canvas = $(".canvas").html();
              var formName = $("#preview").text();

              $.ajax({
              url: "{{ route('save.form') }}",
              type: "post",
              data:{data:canvas,name:formName,"_token": "{{ csrf_token() }}"},
              success: function(data){
                location.href="{{ route('home') }}"
              }
            });
          });
           $('#txt').keyup(function(){
             $('#preview').text($(this).val());
          });
          $("#sendForm").click(function(){
            var formName = $("#preview").text();
             $.ajax({
              url: "",
              type: "get",
               data:{name:formName},
              success: function(data){
                console.log(data);
              }
            });
          });
         });
    </script>
  </head>
  <body>
    @yield('content')
    @yield('scripts')
  </body>
</html>
