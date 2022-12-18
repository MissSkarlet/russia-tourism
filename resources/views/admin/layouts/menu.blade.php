<div class="d-flex flex-column flex-shrink-0 p-3 bg-white" style="width: 280px; height: 100%">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('admin.home') }}" class="nav-link @if (Route::currentRouteName() == 'admin.home') active @else link-dark @endif" aria-current="page">
                Главная
            </a>
        </li>
        <li>
            <a href="{{ route('admin.bid.index') }}" class="nav-link @if (Route::currentRouteName() == 'admin.bid.index') active @else link-dark @endif">
                Заказы
            </a>
        </li>
        <li>
            <a href="{{ route('admin.tour.index') }}" class="nav-link @if (Route::currentRouteName() == 'admin.tour.index') active @else link-dark @endif">
                Туры
            </a>
        </li>
        <li>
            <a href="{{ route('admin.city.index') }}" class="nav-link @if (Route::currentRouteName() == 'admin.city.index') active @else link-dark @endif">
                Города
            </a>
        </li>
        <li>
            <a href="{{ route('admin.user.index') }}" class="nav-link @if (Route::currentRouteName() == 'admin.user.index') active @else link-dark @endif">
                Пользователи
            </a>
        </li>
        <li>
            <a href="{{ route('admin.admin.index') }}" class="nav-link @if (Route::currentRouteName() == 'admin.admin.index') active @else link-dark @endif">
                Админы
            </a>
        </li>
    </ul>
</div>
