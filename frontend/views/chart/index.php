<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\web\View;

$js_global_variables = '
    $.ajaxSetup({
    data: ' . \yii\helpers\Json::encode([
        \yii::$app->request->csrfParam => \yii::$app->request->csrfToken,
    ]) . '
    });' . PHP_EOL;
$this->registerJs($js_global_variables, yii\web\View::POS_HEAD, 'js_global_variables');

$this->registerJs("var imagePath = ". json_encode($image_path).";",View::POS_HEAD);
$sumenh = 'PHỤNG DƯỠNG TỔ TIÊN, ÔNG BÀ, CHA MẸ, ANH EM LÀ SỨ MỆNH CỦA CON CHÁU DÒNG HỌ ĐỖ';
$this->title = 'LƯỢC ĐỒ TỘC PHẢ';
?>
<section id="content">
    <div class="content-wrap">
        <div class="container-fluid">
            <h1 class="text-center"><?= Html::encode($sumenh) ?></h1>
            <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
            <hr>

            <div id="sample">
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <h3>Lược đồ trích dẫn</h3>
                <div>
                    <p><label>1) Gia phả của</label>
                        <input type="text" id="parent_name" name="parent_name" autofocus placeholder="Nhập tên" style="text-align: center; min-width: 203px;">
                        <span style="margin-left: 20px;"><button id="reloadInit" onclick="loadConChau();">Tìm Con Cháu</button></span>
                        <span style="margin-left: 22px;"><button id="reloadToTien" onclick="loadToTien();">Tìm Tổ Tiên</button></span>
                    </p>
                </div>
                <div style="margin-top: 20px;">
                    <p><label>2) Quan hệ họ hàng</label>
                        <input type="text" id="member_name1" name="member_name1" placeholder="Người 1 (bắt buộc)" style="text-align: center;">
                        <label>Và</label>
                        <input type="text" id="member_name2" name="member_name2" placeholder="Người 2 (bắt buộc)" style="text-align: center;">
                        <button id="reloadToTien" onclick="loadToTien2();" style="margin-left: 20px;">Tìm</button>
                    </p>
                </div>

                <div id="myDiagramDiv" style="background-color: #929292; border: solid 1px black; width: 100%; height: 550px; margin-top: 20px;"></div>

            </div>
        </div>
    </div>
</section><!-- #content end -->

<script id="code">
    function init() {
        if (window.goSamples) goSamples();  // init for these samples -- you don't need to call this
        var $ = go.GraphObject.make;  // for conciseness in defining templates

        myDiagram =
            $(go.Diagram, "myDiagramDiv",  // must be the ID or reference to div
                {
                    "toolManager.hoverDelay": 100,  // 100 milliseconds instead of the default 850
                    allowCopy: false,
                    layout:  // create a TreeLayout for the family tree
                        $(go.TreeLayout,
                            {
                                angle: 90,
                                nodeSpacing: 10,
                                layerSpacing: 40,
                                layerStyle: go.TreeLayout.LayerUniform
                            }),
                    "undoManager.isEnabled": true // enable undo & redo

                });

        var bluegrad = '#90CAF9';
        var pinkgrad = '#F48FB1';

        // get tooltip text from the object's data
        function tooltipTextConverter(person) {
            var str = "";
            str += "Năm sinh: " + person.birthYear;
            if (person.deathYear !== undefined) str += "\n\nNăm mất: " + person.deathYear;
            if (person.vo !== undefined) str += "\n\nVợ: " + person.vo;
            if (person.chong !== undefined) str += "\n\nChồng: " + person.chong;
            return str;
        }

        // This converter is used by the Picture.
        function findHeadShot(key) {
            if (key < 0 || key > 17) return imagePath +"/images/HSnopic.png"; // There are only 16 images on the server
            return imagePath +"/images/HS" + key + ".png"
        }

        // define tooltips for nodes
        var tooltiptemplate =
            $(go.Adornment, "Auto",
                $(go.Shape, "Rectangle",
                    { fill: "whitesmoke", stroke: "red" }),
                $(go.TextBlock,
                    { font: "bold 8pt Helvetica, bold Arial, sans-serif",
                        wrap: go.TextBlock.WrapFit,
                        margin: 5 },
                    new go.Binding("text", "", tooltipTextConverter))
            );

        // define Converters to be used for Bindings
        function genderBrushConverter(gender) {
            if (gender === "M") return bluegrad;
            if (gender === "F") return pinkgrad;
            return "orange";
        }

        // replace the default Node template in the nodeTemplateMap
        myDiagram.nodeTemplate =
            $(go.Node, "Auto",
                { deletable: false, toolTip: tooltiptemplate },
                new go.Binding("text", "name"),
                $(go.Shape, "Rectangle",
                    { fill: "lightgray",
                        stroke: null, strokeWidth: 0,
                        stretch: go.GraphObject.Fill,
                        alignment: go.Spot.Center },
                    new go.Binding("fill", "gender", genderBrushConverter)),
                $(go.Panel, "Horizontal",
                    $(go.Picture,
                        {
                            name: 'Picture',
                            desiredSize: new go.Size(39, 50),
                            margin: new go.Margin(6, 8, 6, 10),
                        },
                        new go.Binding("source", "key", findHeadShot)),
                    $(go.TextBlock,
                        { font: "700 12px Droid Serif, sans-serif",
                            textAlign: "start",
                            margin: 10, maxSize: new go.Size(100, NaN) },
                        new go.Binding("text", "name"))
                ),
                {
                    click: function(e, obj) { var member_ids = obj.part.data.key; openWindow('POST',
                        "<?=Yii::$app->urlManager->createUrl('detail/index');?>", {member_id: member_ids}, '_blank')}
                }
            );

        myDiagram.initialContentAlignment = go.Spot.Center;
        // enable Ctrl-Z to undo and Ctrl-Y to redo
        myDiagram.undoManager.isEnabled = true;

        // define the Link template
        myDiagram.linkTemplate =
            $(go.Link,  // the whole link panel
                { routing: go.Link.Orthogonal, corner: 5, selectable: false },
                $(go.Shape, { strokeWidth: 1, stroke: 'red' }));  // the gray link shape

        // here's the family data
        loadData();
        // create the model for the family tree
        myDiagram.model = new go.TreeModel(nodeDataArray);

        document.getElementById('zoomToFit').addEventListener('click', function() {
            myDiagram.zoomToFit();
        });

        document.getElementById('centerRoot').addEventListener('click', function() {
            myDiagram.scale = 1;
            myDiagram.scrollToRect(myDiagram.findNodeForKey(0).actualBounds);
        });
    }
    //load mac dinh
    function loadData() {
        csrfToken = $('meta[name="csrf-token"]').attr("content");
        var form_data = {
            member_id: 1,
            depth: 8,
            _csrf: yii.getCsrfToken()
        };
        $.ajax({
            type: "POST",
            url: '<?=Yii::$app->urlManager->createUrl('chart/ajaxloadmembers');?>',
            dataType: 'json',
            data: form_data,
            async: false,
            success: function (jsonData) {
                if ($.isEmptyObject(jsonData))
                    nodeDataArray = [];
                else{
                    nodeDataArray = jsonData;
                }

            },
            error: function (xhr, tStatus, e) {
                if (!xhr) {
                    alert(" We have an error ");
                    alert(tStatus + "   " + e.message);
                } else {
                    alert("else: " + e.message); // the great unknown
                }
            }
        });
    }
    //load tat ca con chau cua nguoi nay theo do depth da chon
    function loadConChau() {
        csrfToken = $('meta[name="csrf-token"]').attr("content");
        var form_data = {
            member_name: $('#parent_name').val(),
            depth: 8,
            _csrf: yii.getCsrfToken()
        };
        //console.log(form_data);parent_id
        $.ajax({
            type: "POST",
            url: '<?=Yii::$app->urlManager->createUrl('chart/ajaxloadmembers');?>',
            dataType: 'json',
            data: form_data,
            async: false,
            success: function (jsonData) {
                if ($.isEmptyObject(jsonData))
                    nodeDataArray = [];
                else{
                    nodeDataArray = jsonData;
                }
                var dataLoad  = '{"class": "go.TreeModel",' +
                    '"nodeDataArray": \n'+JSON.stringify(jsonData)+'}';
                myDiagram.model = go.Model.fromJson(dataLoad);
            },
            error: function (xhr, tStatus, e) {
                if (!xhr) {
                    alert(" We have an error ");
                    alert(tStatus + "   " + e.message);
                } else {
                    alert("else: " + e.message); // the great unknown
                }
            }
        });
    }
    //load to tien cua nguoi nay
    function loadToTien() {
        csrfToken = $('meta[name="csrf-token"]').attr("content");
        var member = $('#parent_name').val().trim();
        if (member=='') {
            alert('Bạn chưa nhập tên người cần tìm tổ tiên');
            return;
        }
        var form_data = {
            member_name: member,
            depth: 8,
            _csrf: yii.getCsrfToken()
        };

        $.ajax({
            type: "POST",
            url: '<?=Yii::$app->urlManager->createUrl('chart/ajaxloadtotien');?>',
            dataType: 'json',
            data: form_data,
            async: false,
            success: function (jsonData) {
                if ($.isEmptyObject(jsonData))
                    nodeDataArray = [];
                else{
                    nodeDataArray = jsonData;

                }
                var dataLoad  = '{"class": "go.TreeModel",' +
                    '"nodeDataArray": \n'+JSON.stringify(jsonData)+'}';
                myDiagram.model = go.Model.fromJson(dataLoad);
            },
            error: function (xhr, tStatus, e) {
                if (!xhr) {
                    alert(" We have an error ");
                    alert(tStatus + "   " + e.message);
                } else {
                    alert("else: " + e.message); // the great unknown
                }
            }
        });
    }
    //load to tien cua 2 nguoi nay
    function loadToTien2() {
        csrfToken = $('meta[name="csrf-token"]').attr("content");
        var member1 = $('#member_name1').val().trim();
        var member2 = $('#member_name2').val().trim();
        if (member1=='') {
            alert('Bạn chưa nhập tên người cần tìm tổ tiên');
            return;
        }
        if (member2=='') {
            alert('Bạn chưa nhập tên người cần tìm tổ tiên');
            return;
        }
        var form_data = {
            member_name1: member1,
            member_name2: member2,
            depth: 8,
            _csrf: yii.getCsrfToken()
        };
        //console.log(form_data);parent_id
        $.ajax({
            type: "POST",
            url: '<?=Yii::$app->urlManager->createUrl('chart/ajaxloadquanhe');?>',
            dataType: 'json',
            data: form_data,
            async: false,
            success: function (jsonData) {
                if ($.isEmptyObject(jsonData))
                    nodeDataArray = [];
                else{
                    nodeDataArray = jsonData;

                }
                var dataLoad  = '{"class": "go.TreeModel",' +
                    '"nodeDataArray": \n'+JSON.stringify(jsonData)+'}';
                myDiagram.model = go.Model.fromJson(dataLoad);
            },
            error: function (xhr, tStatus, e) {
                if (!xhr) {
                    alert(" We have an error ");
                    alert(tStatus + "   " + e.message);
                } else {
                    alert("else: " + e.message); // the great unknown
                }
            }
        });
    }
    // Arguments :
    //  verb : 'GET'|'POST'
    //  target : an optional opening target (a name, or "_blank"), defaults to "_self"
    var openWindow = function(verb, url, data, target) {
        var form = document.createElement("form");
        form.action = url;
        form.method = verb;
        form.target = target || "_self";

        var input = document.createElement("textarea");
        form.appendChild(input);

        if (data) {
            for (var key in data) {
                var input = document.createElement("textarea");
                input.name = key;
                input.value = typeof data[key] === "object" ? JSON.stringify(data[key]) : data[key];
                form.appendChild(input);
            }
        }

        form.style.display = 'none';
        document.body.appendChild(form);
        form.submit();
    };
</script>
