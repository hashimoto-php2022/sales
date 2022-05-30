@if(Auth::check())

    <ul class="navigation">
        <li>
            <a href="{{ route('sales.create') }}">教科書登録</a>
        </li>
        <li>
            <a href="{{ route('home.index') }}">マイページ</a>
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
        <li>
            @if(Auth::user()->administrator == 1)
                <a href="{{ route('users.index') }}">管理者</a>
            @endif
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