{{--
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>{{ config('app.name') }}</title>
    <script> //会員登録の警告文の処理 //変更点 5/25
        window.addEventListener('load', function() {
            sessionStorage.removeItem('w_text');
        });
    </script>
</head>
<body>

<h1 style="text-align:center">ログイン</h1>

@include('commons/flash')

<form action="{{route('login')}}"method="post"><br>
    @csrf
    <p style="text-align:center">
        <label>メールアドレス</label><br>

        <input type="email" name="email" value="{{old('email')}}">
</p>
<p  style="text-align:center" >
    <label style="text-align:center">パスワード</label><br>
    <input type="password" name="password" value="">
</p><br><br>

<p  style="text-align:center" >
    <a href="{{ route('register') }}">会員登録</a>
    <button type="submit">ログイン</button>
</p>
</form>
</body>
</html>
--}}
{{-- <style>
    body{
        animation: bgchange 20s ease infinite;/*変化の時間を変更したい場合は20sの部分を好きな時間に変更*/
    }

    @keyframes bgchange{
        0%   {background:#ffe6e1;}/*変化させたい色*/
        25%  {background:#fdcb9e;}/*変化させたい色*/
        50%  {background:#fdcbc1;}/*変化させたい色*/
        75%  {background:#ffff8c;}/*変化させたい色*/
        90%  {background:#b2dffb;}/*変化させたい色*/
        100% {background:#ffe6e1;}/*変化させたい色*/
   }
</style> --}}


@extends('layouts.app')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>{{ config('app.name') }}</title>
    <script> //会員登録の警告文の処理 //変更点 5/25
        window.addEventListener('load', function() {
            sessionStorage.removeItem('w_text');
        });
    </script>
    <link rel="stylesheet" type="text/css" href="http://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/move02/5-10/css/reset.css">
    <link rel="stylesheet" type="text/css" href="http://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/move02/5-10/css/5-10.css">
    <style>
    /*========= レイアウトのためのCSS ===============*/
    #wrapper{
        width:100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        position: relative;
    }

    /*========= waveを描画するエリア設定 ===============*/
    canvas{
        position: absolute;
        bottom: 0;
        left:0;
        width: 100%;
    }
    </style>
    <script>
    var unit = 100,
        canvasList, // キャンバスの配列
        info = {}, // 全キャンバス共通の描画情報
        colorList; // 各キャンバスの色情報

    /**
    * Init function.
    * 
    * Initialize variables and begin the animation.
    */
    function init() {
        info.seconds = 0;
        info.t = 0;
        canvasList = [];
        colorList = [];
        // canvas1個めの色指定
        canvasList.push(document.getElementById("waveCanvas"));
        colorList.push(['#43c0e4']);
    // 各キャンバスの初期化
        for(var canvasIndex in canvasList) {
            var canvas = canvasList[canvasIndex];
            canvas.width = document.documentElement.clientWidth; //Canvasのwidthをウィンドウの幅に合わせる
            canvas.height = 200;//波の高さ
            canvas.contextCache = canvas.getContext("2d");
        }
    // 共通の更新処理呼び出し
        update();
    }

    function update() {
        for(var canvasIndex in canvasList) {
            var canvas = canvasList[canvasIndex];
            // 各キャンバスの描画
            draw(canvas, colorList[canvasIndex]);
        }
        // 共通の描画情報の更新
        info.seconds = info.seconds + .014;
        info.t = info.seconds*Math.PI;
        // 自身の再起呼び出し
        setTimeout(update, 35);
    }

    /**
    * Draw animation function.
    * 
    * This function draws one frame of the animation, waits 20ms, and then calls
    * itself again.
    */
    function draw(canvas, color) {
        // 対象のcanvasのコンテキストを取得
        var context = canvas.contextCache;
        // キャンバスの描画をクリア
        context.clearRect(0, 0, canvas.width, canvas.height);

        //波を描画 drawWave(canvas, color[数字（波の数を0から数えて指定）], 透過, 波の幅のzoom,波の開始位置の遅れ )
        drawWave(canvas, color[0], 1, 3, 0);//drawWave(canvas, color[0],0.5, 3, 0);とすると透過50%の波が出来る
    }

    /**
    * 波を描画
    * drawWave(色, 不透明度, 波の幅のzoom, 波の開始位置の遅れ)
    */
    function drawWave(canvas, color, alpha, zoom, delay) {
        var context = canvas.contextCache;
        context.fillStyle = color;//塗りの色
        context.globalAlpha = alpha;
        context.beginPath(); //パスの開始
        drawSine(canvas, info.t / 0.5, zoom, delay);
        context.lineTo(canvas.width + 10, canvas.height); //パスをCanvasの右下へ
        context.lineTo(0, canvas.height); //パスをCanvasの左下へ
        context.closePath() //パスを閉じる
        context.fill(); //波を塗りつぶす
    }

    /**
    * Function to draw sine
    * 
    * The sine curve is drawn in 10px segments starting at the origin. 
    * drawSine(時間, 波の幅のzoom, 波の開始位置の遅れ)
    */
    function drawSine(canvas, t, zoom, delay) {
        var xAxis = Math.floor(canvas.height/2);
        var yAxis = 0;
        var context = canvas.contextCache;
        // Set the initial x and y, starting at 0,0 and translating to the origin on
        // the canvas.
        var x = t; //時間を横の位置とする
        var y = Math.sin(x)/zoom;
        context.moveTo(yAxis, unit*y+xAxis); //スタート位置にパスを置く

        // Loop to draw segments (横幅の分、波を描画)
    for (i = yAxis; i <= canvas.width + 10; i += 10) {
        x = t+(-yAxis+i)/unit/zoom;
        y = Math.sin(x - delay)/3;
        context.lineTo(i, unit*y+xAxis);
        }
    }

    init();
    </script>
</head>
<body>

<h1 style="text-align:center">ログイン</h1>
@include('commons/flash')
<form action="{{route('login')}}"method="post"><br>
    @csrf
    <p style="text-align:center">
        <label>メールアドレス</label><br>

        <input type="email" name="email" value="{{old('email')}}">
    </p>
<p  style="text-align:center" >
    <label style="text-align:center">パスワード</label><br>
    <input type="password" name="password" value="">
</p><br><br>

<p  style="text-align:center" >
    <a href="{{ route('register') }}"  class="btn-r" id="btn_register">会員登録</a>
    <button type="submit" class="btn-b" id="btn_login">ログイン</button>
</p>
</form>
{{-- <div id="wrapper"> --}}
    <canvas id="waveCanvas"></canvas>
{{-- </div> --}}
</body>
<script src="http://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/move02/5-10/js/5-10.js"></script>
@endsection