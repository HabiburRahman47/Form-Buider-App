<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Grid Template</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script
      type="text/javascript"
      src="http://code.jquery.com/jquery.min.js"
    ></script>
    <script
      type="text/javascript"
      src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"
    ></script>
    <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: black;
      }

      * {
        box-sizing: border-box;
      }
      .container-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 10px;
        width: 60%;
        border: 5px solid red;
        margin: auto;
      }
      .container-grid > div {
        padding: 10px;
        font-size: 30px;
        text-align: left;
      }
      .header {
        background-color: gold;
        grid-column: 1/4;
        height: 25vh;
        display: grid;
        justify-content: center;
      }
      .header-input {
        width: 70%;
      }

      .menu-1 {
        background-color: #0d8d0d;
      }
      .menu-2 {
        background-color: lightseagreen;
        grid-column: 2/4;
        display: grid;
        grid-template-columns: 1fr 1fr;
      }
      .menu-2 > div {
        padding: 10px;
      }
      .sub-section {
        background-color: rgb(126, 128, 0);
        height: auto;
        display: grid;
        grid-template-columns: auto;
        grid-gap: 10px;
      }
      /* 50-50 Column*/
      .column-50 {
        display: grid;
        grid-template-columns: auto auto;
        width: auto;
      }
      .column-50 .col-50 {
        padding: 15px;
        width: 100%;
      }
      .col-50-1 {
        background-color: red;
      }
      .col-50-2 {
        background-color: green;
      }
      /* 33-33-33 Column*/
      .column-33 {
        display: grid;
        grid-template-columns: auto auto auto;
        grid-gap: 5px;
      }
      .column-33 > div {
        background-color: rgb(63, 70, 63);
        padding: 15px;
      }
      .main-section {
        background-color: #c1c1c1;
        grid-column: 2/4;
        height: auto;
        display: grid;
        grid-template-columns: auto;
      }
      .main-section > div {
        padding: auto;
      }
      .main-section .submit {
        bottom: 0;
        width: 100%;
      }
      /* Form css
       */
      label {
        padding: 12px 12px 12px 0;
        display: inline-block;
        font-size: 20px;
      }

      input[type="text"] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
      }
      input[type="submit"] {
        background-color: #04aa6d;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
      }

      .footer {
        background-color: greenyellow;
        grid-column: 1/4;
      }
    </style>
    <script>
      $(function () {
        $(".text-field,.checkbox,.radiobox,.column-50,.column-33").draggable({
          helper: "clone",
          start: function (event, ui) {
            $(this).addClass("my_class");
          },
        });
        $(".main-section").droppable({
          accept: ".text-field,.checkbox,.radiobox,.column-50,.column-33",
          drop: function (event, ui) {
            var droppedItem = $(ui.draggable).clone();
            $(this).append(droppedItem);
            if (droppedItem.hasClass("column-50")) {
              $(".col-50").droppable({
                accept: ".text-field,.checkbox,.radiobox",
                greedy: true,
                drop: function (e, ui) {
                  var target = $(ui.draggable).clone();
                  $(this).append(target);
                },
              });
            } else if (droppedItem.hasClass("column-33")) {
              $(".col-33").droppable({
                accept: ".text-field,.checkbox,radiobox",
                greedy: true,
                drop: function (e, ui) {
                  var target = $(ui.draggable).clone();
                  $(this).append(target);
                },
              });
            }
          },
        });
      });
    </script>
  </head>
  <body>
    <div class="container-grid">
      <div class="header">
        <div class="header-title">Create Your Form</div>
        <div class="header-input">
          <input
            type="text"
            id="fname"
            name="formname"
            placeholder="Enter Form name.."
          />
        </div>
      </div>
      <div class="menu-1">Tools</div>
      <div class="menu-2">
        <div class="name">
           <h3 id="preview">Form Name</h3>
        </div>
        <div class="save">
          <button type="button"id="saveForm"class="btn btn-primary float-right">Save</button>
        </div>
      </div>
      <div class="sub-section">
        <div class="text-field" data-toggle="modal" data-target="#myModal">
          <label for="" id="label"><span>Text field</span></label>
          <input
            type="text"
            id="fname"
            name="firstname"
            placeholder="Your name.."
          />
        </div>
        <div class="checkbox">
          <input type="checkbox" id="fname" name="vehicle1" value="Bike" />
          <label for="vehicle1">checkbox</label>
        </div>
        <div class="radiobox">
          <input type="radio" id="fname" name="fav_language" value="HTML" />
          <label for="html">Radiobox</label><br />
        </div>
        <div class="column-50">
          <div class="col-50 col-50-1">1</div>
          <div class="col-50 col-50-2">2</div>
        </div>
        <div class="column-33">
          <div class="col-33 col-33-1">1</div>
          <div class="col-33 col-33-2">2</div>
          <div class="col-33 col-33-3">3</div>
        </div>
      </div>
      <div class="main-section canvas">
        <!-- <div class="submit">
          <input type="submit" value="Submit">
        </div> -->
      </div>
      <div class="footer">Footer</div>
    </div>

    <!-- The Modal For Text Input -->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Modal Heading</h4>
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form action="#" id="myForm">
              <div class="form-group">
                <label for="email">Label:</label>
                <input
                  type="text"
                  class="form-control"
                  id="label"
                  placeholder="Enter Label"
                  name="label"
                />
              </div>
              <div class="form-group">
                <label for="pwd">Placeholder:</label>
                <input
                  type="text"
                  class="form-control"
                  id="placeholder"
                  placeholder="Enter placeholder"
                  name="placeholder"
                />
              </div>
              <div class="form-group">
                <label for="email">Font Size:</label>
                <input
                  type="number"
                  class="form-control"
                  id="fontSize"
                  placeholder="Enter font size"
                  name="fontsize"
                />
              </div>
              <div class="form-group">
                <label for="email">Color:</label>
                <input
                  type="text"
                  class="form-control"
                  id="color"
                  placeholder="Enter color"
                  name="color"
                />
              </div>
            </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button
              type="button"
              id="textInput"
              class="btn btn-success"
              data-dismiss="modal"
            >
              Save
            </button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
    <script>
      $(function () {
        $("#textInput").click(function () {
          var $inputs = $("#myForm :input");
          var values = {};
          $inputs.each(function () {
            values[this.name] = $(this).val();
          });
          console.log(values);
          var fieldLabel = $(".main-section .text-field #label:first");
          var placeholder = $(".main-section .text-field #fname:first");
          // var fontSize=$("input");
          var input = $(".main-section #fname:first").select();
          console.log(input);
          input.attr("id", values.label);
          // console.log(input);
          fieldLabel.text(values.label);
          fieldLabel.attr("id", values.label);
          fieldLabel.id;
          placeholder.attr("placeholder", values.placeholder);
          input.css("font-size", parseInt(values.fontsize));
          input.css("color", values.color);
        });
      });
    </script>
  </body>
</html>
