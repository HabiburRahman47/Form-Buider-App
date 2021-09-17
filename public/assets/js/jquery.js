$(function () {
    var diagram = [];
    var canvas = $(".canvas");
    $(".tool").draggable({
        helper: "clone",
    });
    canvas.droppable({
        accept: ".tool",
        drop: function (event, ui) {
            var node = {
                _id: new Date().getTime(),
                position: ui.position,
            };
            if (ui.helper.hasClass("tool-1")) {
                node.type = "TOOL-1";
            } else if (ui.helper.hasClass("tool-2")) {
                node.type = "TOOL-2";
            } else if (ui.helper.hasClass("tool-3")) {
                node.type = "TOOL-3";
            } else if (ui.helper.hasClass("tool-4")) {
                node.type = "TOOL-4";
            } else if (ui.helper.hasClass("tool-5")) {
                node.type = "TOOL-5";
            }
            diagram.push(node);
            renderDiagram(diagram);
        },
    });
    function renderDiagram(diagram) {
        canvas.empty();
        for (var d in diagram) {
            var node = diagram[d];
            var html = "";
            if (node.type == "TOOL-1") {
                // html =
                //     '<input type="text" id="fname" class="element" onclick="textInput()" name="firstname" placeholder="Your name..">';
                html =
                    ' <div class="form-group element"><input type="text"id="fname" onclick="textInput()" name="firstname" placeholder="Your name.." class="form-control element"/></div>';
            } else if (node.type == "TOOL-2") {
                // html =
                //     '<input type="button" id="btn"class="element" onclick="myBtn()" value="Button">';
                html =
                    '<div class="form-check element"><label class="form-check-label" for="radio1"><input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>Option 1</label>  </div>';
            } else if (node.type == "TOOL-3") {
                html =
                    '<div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" value="">checkbox-opt-1</label></div>';
            } else if (node.type == "TOOL-4") {
                html =
                    '<button type="button" style="display:flex;justify-content:center;width:50%" class="btn btn-primary btn-block">Submit</button>';
            } else if (node.type == "TOOL-5") {
                html =
                    '<div class="column33" style="border:2px solid red;width:33%;padding:20px"></div>';
            }
            var dom = $(html).css({
                top: node.position.top,
                left: node.position.left,
            });
            canvas.append(dom);
            if (dom.hasClass("column33")) {
                dom.droppable({
                    accept: ".tool",
                    greedy: true,
                    drop: function (event, ui) {
                        var columnItem = $(ui.draggable).clone();
                        dom.append(columnItem);
                    },
                });
            }
            //Column 33/33/33
            // var column33 = $(".column33");
            // var container = [];
            // column33.droppable({
            //     drop: function (event, ui) {
            //         var columnItem = $(ui.draggable).clone();
            //         container.push(columnItem);
            //         console.log(container);
            //         column33.append(container);
            //     },
            // });
        }
    }
});
