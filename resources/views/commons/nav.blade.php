@if(Auth::check())

    <ul class="navigation">
        <li>
            <a href="{{ route('sales.create') }}">教科書登録</a>
        </li>
        <li>
            <a href="{{ route('home') }}">マイページ</a>
        </li>
        <li>
            <a href="#" onclick="logout()">
                ログアウト
            </a>
            <form id="logout-form" action="{{ route('logout')}}" method="post">
                @csrf
            </form>
            <script type="text/javascript">
                function logout() {
                    event.preventDefault();
                    if(window.confirm('ログアウトしますか？')) {
                        document.getElementById("logout-form").submit();
                    }
                }
            </script>
        </li>
    </ul>

@else
<ul class="navigation">
    <li>
        <a href="{{ route('register') }}">新規会員登録</a>
    </li>
    <li>
        <a href="{{ route('login') }}">ログイン</a>
    </li>
</ul>

@endif