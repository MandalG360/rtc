<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body style=" background-color:#fff;font-family:'Open Sans',sans-serif,arial,helvetica,verdana">

    <script src="js/jquery-1.11.3.min.js" type="text/javascript" data-library="jquery" data-version="1.11.3"></script>
    <script src="js/jssor.slider-22.0.15.mini.js" type="text/javascript" data-library="jssor.slider.mini" data-version="22.0.15"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            var jssor_1_options = {
              $AutoPlay: true,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 9,
                $SpacingX: 3,
                $SpacingY: 3,
                $Align: 260
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 600);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);

        });
    </script>
    <style>
        .jssora02l, .jssora02r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 55px;
            height: 55px;
            cursor: pointer;
            background: url('slide_Image/img/a02.png') no-repeat;
            overflow: hidden;
        }
        .jssora02l { background-position: -3px -33px; }
        .jssora02r { background-position: -63px -33px; }
        .jssora02l:hover { background-position: -123px -33px; }
        .jssora02r:hover { background-position: -183px -33px; }
        .jssora02l.jssora02ldn { background-position: -3px -33px; }
        .jssora02r.jssora02rdn { background-position: -63px -33px; }
        .jssora02l.jssora02lds { background-position: -3px -33px; opacity: .3; pointer-events: none; }
        .jssora02r.jssora02rds { background-position: -63px -33px; opacity: .3; pointer-events: none; }
        .jssort03 .p {    position: absolute;    top: 0;    left: 0;    width: 62px;    height: 32px;}
        .jssort03 .t {    position: absolute;    top: 0;    left: 0;    width: 100%;    height: 100%;    border: none;}
        .jssort03 .w, .jssort03 .pav:hover .w {    position: absolute;    width: 60px;    height: 30px;    border: white 1px dashed;    box-sizing: content-box;}
        .jssort03 .pdn .w, .jssort03 .pav .w {    border-style: solid;}
        .jssort03 .c {    position: absolute;    top: 0;    left: 0;    width: 62px;    height: 32px;    background-color: #000;    filter: alpha(opacity=45);    opacity: .45;    transition: opacity .6s;    -moz-transition: opacity .6s;    -webkit-transition: opacity .6s;    -o-transition: opacity .6s;}
        .jssort03 .p:hover .c, .jssort03 .pav .c {    filter: alpha(opacity=0);    opacity: 0;}
        .jssort03 .p:hover .c {    transition: none;    -moz-transition: none;    -webkit-transition: none;    -o-transition: none;}* html .jssort03 .w {    width /**/: 62px;    height /**/: 32px;}
    </style>
    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('slide_Image/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">
            <div data-p="112.50" style="display:none;">
                <img data-u="image" src="slide_Image/1 (1).jpg" />
            </div>
            <div data-p="112.50" style="display:none;">
                <img data-u="image" src="slide_Image/1 (2).jpg" />
            </div>
            <div data-p="112.50" style="display:none;">
                <img data-u="image" src="slide_Image/1 (3).jpg" />
            </div>
            <div data-p="112.50" style="display:none;">
                <img data-u="image" src="slide_Image/1 (4).jpg" />
            </div>
            <div data-p="112.50" style="display:none;">
                <img data-u="image" src="slide_Image/1 (5).jpg" />
            </div>
            <div data-p="112.50" style="display:none;">
                <img data-u="image" src="slide_Image/1 (6).jpg" />
            </div>
            <div data-p="112.50" style="display:none;">
                <img data-u="image" src="slide_Image/1 (7).jpg" />
            </div>
            <div data-p="112.50" style="display:none;">
                <img data-u="image" src="slide_Image/1 (8).jpg" />
            </div>
            <div data-p="112.50" style="display:none;">
                <img data-u="image" src="slide_Image/1 (9).jpg" />
            </div>
            <div data-p="112.50" style="display:none;">
                <img data-u="image" src="slide_Image/1 (10).jpg" />
            </div>

            <div data-p="112.50" style="display:none;">
                <img data-u="image" src="slide_Image/1 (11).jpg" />
            </div>
            <div data-p="112.50" style="display:none;">
                <img data-u="image" src="slide_Image/1 (12).jpg" />
            </div>
            <div data-p="112.50" style="display:none;">
                <img data-u="image" src="slide_Image/1 (13).jpg" />
            </div>
            <div data-p="112.50" style="display:none;">
                <img data-u="image" src="slide_Image/1 (14).jpg" />
            </div>
            <div data-p="112.50" style="display:none;">
                <img data-u="image" src="slide_Image/1 (15).jpg" />
            </div>
            <div data-p="112.50" style="display:none;">
                <img data-u="image" src="slide_Image/1 (16).jpg" />
            </div>
            <div data-p="112.50" style="display:none;">
                <img data-u="image" src="slide_Image/1 (17).jpg" />
            </div>
            <div data-p="112.50" style="display:none;">
                <img data-u="image" src="slide_Image/1 (18).jpg" />
            </div>
            <div data-p="112.50" style="display:none;">
                <img data-u="image" src="slide_Image/1 (19).jpg" />
            </div>
            <div data-p="112.50" style="display:none;">
                <img data-u="image" src="slide_Image/1 (20).jpg" />
            </div>
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort03" style="position:absolute;left:0px;bottom:0px;width:600px;height:60px;" data-autocenter="1">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height:100%; background-color: #000; filter:alpha(opacity=30.0); opacity:0.3;"></div>
            <!-- Thumbnail Item Skin Begin -->
            <div data-u="slides" style="cursor: default;">
                <div data-u="prototype" class="p">
                    <div class="w">
                        <div data-u="thumbnailtemplate" class="t"></div>
                    </div>
                    <div class="c"></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora02l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora02r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
    </div>
    <!-- #endregion Jssor Slider End -->
</body>
</html>
