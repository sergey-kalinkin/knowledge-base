<div class="container-fluid">
    <div class="navigation">
        <div class="row">
            <ul class="topnav">
                <li></li>
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fa fa-home"></i> Главная
                    </a>
                </li>
                <li>
                    <a href="{{ route('articles.index') }}">
                        <i class="fa fa-file-text-o"></i> Статьи
                    </a>
                </li>
                @can('not-be-admin')
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="fa fa-sign-out"></i> Выйти
                    </a>
                </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
