<!DOCTYPE html>
<!-- <html manifest="cache.manifest"> -->
<html>

<head>
    <title>DICOM Web Viewer</title>

    <meta charset="UTF-8">
    <meta name="description" content="DICOM Web Viewer (DWV) static version">
    <meta name="keywords" content="DICOM,HTML5,JavaScript,medical,imaging,DWV">
    <link type="text/css" rel="stylesheet" href="js/dicom/css/style.css">
    <style type="text/css" >
        body { background-color: #222; color: white; font-size: 80%; }
        #pageHeader h1 { display: inline-block; margin: 0; color: #fff; }
        #pageHeader a { color: #ddf; }
        #pageHeader .toolbar { display: inline-block; float: right; }
        .toolList ul { padding: 0; }
        .toolList li { list-style-type: none; }
        #pageMain { position: absolute; height: 92%; width: 99%; bottom: 5px; left: 5px; background-color: #333; }
        .infotl { text-shadow: 0 1px 0 #000; }
        .infotc { text-shadow: 0 1px 0 #000; }
        .infotr { text-shadow: 0 1px 0 #000; }
        .infocl { text-shadow: 0 1px 0 #000; }
        .infocr { text-shadow: 0 1px 0 #000; }
        .infobl { text-shadow: 0 1px 0 #000; }
        .infobc { text-shadow: 0 1px 0 #000; }
        .infobr { text-shadow: 0 1px 0 #000; }
        .dropBox { margin: 20px; }
        .ui-icon { zoom: 125%; }
        .tagsTable tr:nth-child(even) { background-color: #333; }
        .drawList tr:nth-child(even) { background-color: #333; }
        button, input, li, table { margin-top: 0.2em; }
        li button, li input { margin: 0; }
        .history_list { width: 100%; }
    </style>
    <link type="text/css" rel="stylesheet" href="js/dicom/ext/jquery-ui/themes/ui-darkness/jquery-ui-1.12.1.min.css">
    <style type="text/css" >
        .ui-widget-content { background-color: #222; background-image: url();}
    </style>
    <!-- Third party (dwv) -->
    <script type="text/javascript" src="js/dicom/ext/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="js/dicom/ext/i18next/i18next.min.js"></script>
    <script type="text/javascript" src="js/dicom/ext/i18next/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="js/dicom/ext/i18next/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="js/dicom/ext/konva/konva.min.js"></script>
    <script type="text/javascript" src="js/dicom/ext/magic-wand/magic-wand.js"></script>
    <script type="text/javascript" src="js/dicom/ext/jszip/jszip.min.js"></script>
    <!-- Third party (viewer) -->
    <script type="text/javascript" src="js/dicom/ext/jquery/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/dicom/ext/jquery-ui/jquery-ui-1.12.1.min.js"></script>
    <script type="text/javascript" src="js/dicom/ext/flot/jquery.flot.min.js"></script>
    <!-- decoders -->
    <script type="text/javascript" src="js/dicom/decoders/pdfjs/jpx.js"></script>
    <script type="text/javascript" src="js/dicom/decoders/pdfjs/util.js"></script>
    <script type="text/javascript" src="js/dicom/decoders/pdfjs/arithmetic_decoder.js"></script>
    <script type="text/javascript" src="js/dicom/decoders/pdfjs/jpg.js"></script>
    <script type="text/javascript" src="js/dicom/decoders/rii-mango/lossless-min.js"></script>
    <!-- Local -->
    <script type="text/javascript" src="js/dicom/src/app/application.js"></script>
    <script type="text/javascript" src="js/dicom/src/app/drawController.js"></script>
    <script type="text/javascript" src="js/dicom/src/app/infoController.js"></script>
    <script type="text/javascript" src="js/dicom/src/app/toolboxController.js"></script>
    <script type="text/javascript" src="js/dicom/src/app/viewController.js"></script>
    <script type="text/javascript" src="js/dicom/src/app/state.js"></script>
    <script type="text/javascript" src="js/dicom/src/dicom/dicomParser.js"></script>
    <script type="text/javascript" src="js/dicom/src/dicom/dictionary.js"></script>

    <script type="text/javascript" src="js/dicom/src/gui/clock.js"></script>

    <script type="text/javascript" src="js/dicom/src/gui/filter.js"></script>
    <script type="text/javascript" src="js/dicom/src/gui/generic.js"></script>
    <script type="text/javascript" src="js/dicom/src/gui/help.js"></script>
    <script type="text/javascript" src="js/dicom/src/gui/html.js"></script>
    <script type="text/javascript" src="js/dicom/src/gui/info.js"></script>
    <script type="text/javascript" src="js/dicom/src/gui/layer.js"></script>
    <script type="text/javascript" src="js/dicom/src/gui/loader.js"></script>
    <script type="text/javascript" src="js/dicom/src/gui/style.js"></script>
    <script type="text/javascript" src="js/dicom/src/gui/tools.js"></script>
    <script type="text/javascript" src="js/dicom/src/gui/undo.js"></script>
    <script type="text/javascript" src="js/dicom/src/image/decoder.js"></script>
    <script type="text/javascript" src="js/dicom/src/image/dicomBufferToView.js"></script>
    <script type="text/javascript" src="js/dicom/src/image/domReader.js"></script>
    <script type="text/javascript" src="js/dicom/src/image/filter.js"></script>
    <script type="text/javascript" src="js/dicom/src/image/geometry.js"></script>
    <script type="text/javascript" src="js/dicom/src/image/image.js"></script>
    <script type="text/javascript" src="js/dicom/src/image/luts.js"></script>
    <script type="text/javascript" src="js/dicom/src/image/view.js"></script>
    <script type="text/javascript" src="js/dicom/src/io/filesLoader.js"></script>
    <script type="text/javascript" src="js/dicom/src/io/urlsLoader.js"></script>
    <script type="text/javascript" src="js/dicom/src/io/memoryLoader.js"></script>
    <script type="text/javascript" src="js/dicom/src/io/dicomDataLoader.js"></script>
    <script type="text/javascript" src="js/dicom/src/io/jsonTextLoader.js"></script>
    <script type="text/javascript" src="js/dicom/src/io/rawImageLoader.js"></script>
    <script type="text/javascript" src="js/dicom/src/io/rawVideoLoader.js"></script>
    <script type="text/javascript" src="js/dicom/src/io/zipLoader.js"></script>
    <script type="text/javascript" src="js/dicom/src/math/matrix.js"></script>
    <script type="text/javascript" src="js/dicom/src/math/bucketQueue.js"></script>
    <script type="text/javascript" src="js/dicom/src/math/point.js"></script>
    <script type="text/javascript" src="js/dicom/src/math/scissors.js"></script>
    <script type="text/javascript" src="js/dicom/src/math/shapes.js"></script>
    <script type="text/javascript" src="js/dicom/src/math/stats.js"></script>
    <script type="text/javascript" src="js/dicom/src/math/vector.js"></script>
    <script type="text/javascript" src="js/dicom/src/tools/arrow.js"></script>
    <script type="text/javascript" src="js/dicom/src/tools/draw.js"></script>
    <script type="text/javascript" src="js/dicom/src/tools/drawCommands.js"></script>
    <script type="text/javascript" src="js/dicom/src/tools/editor.js"></script>
    <script type="text/javascript" src="js/dicom/src/tools/ellipse.js"></script>
    <script type="text/javascript" src="js/dicom/src/tools/filter.js"></script>
    <script type="text/javascript" src="js/dicom/src/tools/floodfill.js"></script>
    <script type="text/javascript" src="js/dicom/src/tools/freeHand.js"></script>
    <script type="text/javascript" src="js/dicom/src/tools/livewire.js"></script>
    <script type="text/javascript" src="js/dicom/src/tools/protractor.js"></script>
    <script type="text/javascript" src="js/dicom/src/tools/rectangle.js"></script>
    <script type="text/javascript" src="js/dicom/src/tools/roi.js"></script>
    <script type="text/javascript" src="js/dicom/src/tools/ruler.js"></script>
    <script type="text/javascript" src="js/dicom/src/tools/scroll.js"></script>
    <script type="text/javascript" src="js/dicom/src/tools/toolbox.js"></script>
    <script type="text/javascript" src="js/dicom/src/tools/undo.js"></script>
    <script type="text/javascript" src="js/dicom/src/tools/windowLevel.js"></script>
    <script type="text/javascript" src="js/dicom/src/tools/zoomPan.js"></script>
    <script type="text/javascript" src="js/dicom/src/utils/browser.js"></script>
    <script type="text/javascript" src="js/dicom/src/utils/i18n.js"></script>
    <script type="text/javascript" src="js/dicom/src/utils/listen.js"></script>
    <script type="text/javascript" src="js/dicom/src/utils/progress.js"></script>
    <script type="text/javascript" src="js/dicom/src/utils/string.js"></script>
    <script type="text/javascript" src="js/dicom/src/utils/uri.js"></script>
    <script type="text/javascript" src="js/dicom/src/utils/thread.js"></script>

    <!-- Launch the app -->
    <script type="text/javascript" src="js/dicom/appgui.js"></script>
    <script type="text/javascript" src="js/dicom/applauncher.js"></script>
</head>

<body>

<!-- DWV -->
<div id="dwv">

    <div id="pageHeader">

        <!-- Title -->
        <h1  style = " text-align:center; color: grey; text-shadow: 1px 1px 2px grey, 0 0 25px grey, 0 0 5px grey">FITPU-AI DICOM Viewer <span class="dwv-version"></span></h1>

        <!-- Toolbar -->
        <div class="toolbar"></div>
        <div id="mydate" onload="startTime()">

        </div><!-- /pageHeader -->

        <div id="pageMain">

            <!-- Open file -->
            <div class="openData" title="File">
                <div class="loaderlist"></div>
                <div id="progressbar"></div>
                <input type="button" value="DeIdentify" onclick="window.location.href='http://10.217.133.83/FITPU/DWVII/tests/anom/DeIdentify6.html'" />
                <input type="button" value="Annotate""/>
            </div>

            <!-- Toolbox -->
            <div class="toolList" title="Toolbox"></div>

            <!-- History -->
            <div class="history" title="History"></div>

            <!-- Tags -->
            <div class="tags" title="Tags"></div>

            <!-- DrawList -->
            <div class="drawList" title="Draw list"></div>

            <!-- Help -->
            <div class="help" title="Help"></div>

            <!-- Layer Container -->
            <div class="layerDialog" title="Image">
                <div class="dropBox"></div>
                <div class="layerContainer">
                    <canvas class="imageLayer">Only for HTML5 compatible browsers...</canvas>
                    <div class="drawDiv"></div>
                    <div class="infoLayer">
                        <div class="infotl"></div>
                        <div class="infotc"></div>
                        <div class="infotr"></div>
                        <div class="infocl"></div>
                        <div class="infocr"></div>
                        <div class="infobl"></div>
                        <div class="infobc"></div>
                        <div class="infobr" style="bottom: 64px;"></div>
                        <div class="plot"></div>
                    </div><!-- /infoLayer -->
                </div><!-- /layerContainer -->
            </div><!-- /layerDialog -->

        </div><!-- /pageMain -->

    </div><!-- /dwv -->

</body>
</html>
