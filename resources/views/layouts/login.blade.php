<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <!-- bootstrapCDN(css)↓-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div class="top-page">
            <div class="atlas-icon">
            <h1><a href="/top"><img src="images/atlas.png" class="atlas-icon" width="80"></a></h1>
            </div>
            <div class="head-container">
                <div class="username">
                    <!-- ログインユーザー名表示 -->
                    <p>{{ Auth::user()->username }} さん</p>
                </div>
                <div class="accordion">
                    <p class="nav-btn"><img src="images/arrow.png" class="arrow"></p>
                    <ul class="nav-menu">
                        <li class="nav-list"><a href="/top">HOME</a></li>
                        <li class="nav-list"><a href="/profile">プロフィール編集</a></li>
                        <li class="nav-list"><a href="/logout">ログアウト</a></li>
                    </ul>
                </div>
                <div class="img">
                    <img src="{{ asset('storage/' . Auth::user()->images) }}" width="25" height="25">
                </div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div>
                <p>フォロー数</p>
                <!-- フォロー数の表示 -->
                <p>{{ Auth::user()->following()->get()->count() }}名</p>
                </div>
                <button type="button" class="btn btn-primary"><a href="/follow-list">フォローリスト</a></button>
                <div>
                <p>フォロワー数</p>
                <!-- フォロワー数の表示 -->
                <p>{{ Auth::user()->follower()->get()->count() }}名</p>
                </div>
                <button type="button" class="btn btn-primary"><a href="/follower-list">フォロワーリスト</a></button>
            </div>
            <button type="button" class="btn btn-primary"><a href="/search">ユーザー検索</a></button>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('js/script.js')}}"></script>
    <!-- bootstrapCDN(JavaScript)↓ -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"crossorigin="anonymous"></script>
</body>
</html>
