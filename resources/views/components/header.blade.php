<header class="header">
    <div class="container">

        <div class="header__main">
            <button class="header__hamburger" aria-label="Открыть или закрыть меню">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/header/logo.svg') }}" alt="Логотип &quot;Алые паруса&quot;" class="header__logo"
                    width="120px" height="120px">
            </a>
            <div class="header__search-wrapper" id="title-search">
                <form action="https://odarendeti73.ru/search/index.php">
                    <input id="title-search-input" type="search" class="header__search" placeholder="Поиск"
                        name="q" value="" size="40" maxlength="50" autocomplete="off">
                </form>
            </div>
            <div class="header__info">
                <ul class="header__contacts">
                    <li class="header__contacts-item">
                        <a href="tel:88422229383" class="header__contacts-link header__contacts-link_phone"
                            aria-label="Позвонить на номер 8 8422 22-93-83">
                            8 8422 22-93-83
                            <svg class="header__icon" width="45" height="45" viewBox="0 0 45 45"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="22.5" cy="22.5" r="22.5"></circle>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.2389 13.6059C15.4467 13.3984 15.6962 13.2374 15.9709 13.1337C16.2456 13.0299 16.5391 12.9857 16.8322 13.004C17.1252 13.0223 17.4111 13.1027 17.6707 13.2399C17.9303 13.377 18.1579 13.5677 18.3382 13.7994L20.4697 16.5379C20.8604 17.0403 20.9981 17.6946 20.8438 18.3121L20.1942 20.9129C20.1606 21.0476 20.1624 21.1887 20.1995 21.3225C20.2365 21.4563 20.3075 21.5782 20.4056 21.6765L23.3232 24.5943C23.4215 24.6926 23.5437 24.7637 23.6777 24.8008C23.8117 24.8378 23.953 24.8395 24.0879 24.8057L26.6873 24.1561C26.992 24.0799 27.31 24.074 27.6174 24.1388C27.9247 24.2036 28.2133 24.3374 28.4613 24.5302L31.1996 26.6607C32.184 27.4266 32.2743 28.8814 31.3932 29.7614L30.1653 30.9893C29.2866 31.8681 27.9733 32.254 26.749 31.823C23.6155 30.7203 20.7705 28.9263 18.4249 26.574C16.0729 24.2286 14.279 21.3837 13.1763 18.2504C12.7464 17.0272 13.1324 15.7126 14.0111 14.8338L15.2389 13.6059Z">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="header__contacts-item">
                        <a href="mailto:koushkre@mail.ru" class="header__contacts-link header__contacts-link_mail"
                            aria-label="Отправить письмо на email">
                            <svg class="header__icon" width="45" height="45" viewBox="0 0 45 45"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="22.5" cy="22.5" r="22.5"></circle>
                                <path
                                    d="M12 18.124L22.1697 23.665C22.2717 23.7206 22.385 23.7496 22.5 23.7496C22.615 23.7496 22.7283 23.7206 22.8303 23.665L33 18.125V27.75C33.0001 28.5801 32.6969 29.3788 32.1527 29.9822C31.6085 30.5856 30.8645 30.948 30.0734 30.995L29.8977 31H15.1023C14.3099 31.0001 13.5475 30.6824 12.9715 30.1123C12.3955 29.5422 12.0496 28.7628 12.0048 27.934L12 27.75V18.124ZM15.1023 13H29.8977C30.6901 12.9999 31.4525 13.3176 32.0285 13.8877C32.6045 14.4578 32.9504 15.2372 32.9952 16.066L33 16.25V16.434L22.5 22.154L12 16.434V16.25C11.9999 15.4199 12.3031 14.6212 12.8473 14.0178C13.3915 13.4144 14.1355 13.052 14.9266 13.005L15.1023 13H29.8977H15.1023Z">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="header__contacts-item">
                        <a href="https://t.me/odarendeti73" class="header__contacts-link header__contacts-link_telegram"
                            target="_blank" rel="noopener" aria-label="Телеграм">
                            <svg class="header__icon" width="45" height="45" viewBox="0 0 45 45"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="22.5" cy="22.5" r="22.5"></circle>
                                <path
                                    d="M31.4475 13.1184L11.074 20.4496C9.68354 20.9708 9.69159 21.6946 10.8189 22.0173L16.0496 23.54L28.1519 16.4146C28.7242 16.0897 29.247 16.2645 28.8172 16.6205L19.012 24.8782H19.0097L19.012 24.8793L18.6511 29.9105C19.1797 29.9105 19.413 29.6842 19.7095 29.4172L22.2501 27.1118L27.5348 30.7544C28.5093 31.2551 29.2091 30.9978 29.4515 29.9126L32.9207 14.656C33.2758 13.3275 32.3772 12.7259 31.4475 13.1184Z">
                                </path>
                            </svg>
                        </a>
                    </li>
                </ul>
                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="header__login gap-1" aria-label="Войти в личный кабинет">
                            Войти
                            <svg class="header__icon" width="46" height="45" viewBox="0 0 46 45"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="23.1411" cy="22.5" r="22.5" />
                                <path
                                    d="M15.2244 31C15.2244 31 13.6411 31 13.6411 29.5C13.6411 28 15.2244 23.5 23.1411 23.5C31.0578 23.5 32.6411 28 32.6411 29.5C32.6411 31 31.0578 31 31.0578 31H15.2244ZM23.1411 22C24.4009 22 25.6091 21.5259 26.4999 20.682C27.3907 19.8381 27.8911 18.6935 27.8911 17.5C27.8911 16.3065 27.3907 15.1619 26.4999 14.318C25.6091 13.4741 24.4009 13 23.1411 13C21.8813 13 20.6732 13.4741 19.7824 14.318C18.8916 15.1619 18.3911 16.3065 18.3911 17.5C18.3911 18.6935 18.8916 19.8381 19.7824 20.682C20.6732 21.5259 21.8813 22 23.1411 22Z" />
                            </svg>
                        </a>
                    @endif
                @else
                    <div class="dropdown">
                        <button class="btn header__login gap-1 border-0" type="button">
                            {{ Auth()->user()->first_name }} {{ Auth()->user()->surname }}
                            <svg class="header__icon header__login" width="46" height="45" style="margin-left: 0;"
                                viewBox="0 0 46 45" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="23.1411" cy="22.5" r="22.5" />
                                <path
                                    d="M15.2244 31C15.2244 31 13.6411 31 13.6411 29.5C13.6411 28 15.2244 23.5 23.1411 23.5C31.0578 23.5 32.6411 28 32.6411 29.5C32.6411 31 31.0578 31 31.0578 31H15.2244ZM23.1411 22C24.4009 22 25.6091 21.5259 26.4999 20.682C27.3907 19.8381 27.8911 18.6935 27.8911 17.5C27.8911 16.3065 27.3907 15.1619 26.4999 14.318C25.6091 13.4741 24.4009 13 23.1411 13C21.8813 13 20.6732 13.4741 19.7824 14.318C18.8916 15.1619 18.3911 16.3065 18.3911 17.5C18.3911 18.6935 18.8916 19.8381 19.7824 20.682C20.6732 21.5259 21.8813 22 23.1411 22Z" />
                            </svg>
                        </button>
                        <ul class="dropdown__menu border-0 rounded-0 pt-0" style="top: unset;">
                            @if(Auth()->user()->is_admin==1)
                            <li class="dropdown__menu-item">
                                <a class="dropdown__menu-link" href="{{ route('showUsers') }}">Админ панель</a>
                            </li>
                            @endif
                            <li class="dropdown__menu-item">
                                <a class="dropdown__menu-link" href="{{ route('profile.page') }}">Профиль</a>
                            </li>

                            <li class="dropdown__menu-item">
                                @if (empty(\Session::get('cart')))
                                    <a class="dropdown__menu-link" href="{{ route('cart.list') }}">Корзина</a>
                                @else
                                    <a class="dropdown__menu-link" href="{{ route('cart.list') }}">Корзина
                                        <span class="badge bg-danger rounded-pill">
                                            {{ count(\Session::get('cart')) }}
                                        </span>
                                    </a>
                                @endif
                            </li>

                            <li class="dropdown__menu-item">
                                <a class="dropdown__menu-link" href="{{ route('catalog.list') }}">Каталог
                                    товаров</a>
                            </li>
                            <li class="dropdown__menu-item">
                                <a class="dropdown__menu-link logout" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('Выйти') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
            </div>
        </div>

        <nav class="header__nav">
            <ul class="header__list">

                <li class="header__list-item dropdown">
                    <button class="dropdown__header">О центре</button>
                    <ul class="dropdown__menu dropdown__menu_center">

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/about/basic-information/">Основные сведения</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/about/board-of-trustees/">Попечительский совет</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/about/board-of-experts/">Экспертный совет</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/about/partners/">Партнеры</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/news/">Новости</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/announcements/">Анонсы</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://forms.gle/3Dkve2t6dPWgophV8">Анкета НОКО 2022</a></li>

                    </ul>
                </li>

                <li class="header__list-item dropdown"><button class="dropdown__header">Образовательные
                        программы</button>
                    <ul class="dropdown__menu dropdown__menu_center">

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/education/nauka">Наука</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/education/iskusstvo">Искусство</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/education/sport">Спорт</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/education/literaturnoe-tvorchestvo">Литературное
                                творчество</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/education/distance-education">Дистанционная школа</a>
                        </li>

                    </ul>
                </li>

                <li class="header__list-item dropdown"><button class="dropdown__header">Олимпиады и конкурсы</button>
                    <ul class="dropdown__menu dropdown__menu_center">

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/competition/olimpiady-i-konkursy">Календарь
                                мероприятий</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/competition/all-russian-contest/">ВсОШ</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/competition/big-challenges/">Большие вызовы</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/competition/regional-contest/">Региональные олимпиады и
                                конкурсы</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/competition/federal-and-regional-list/">Федеральные и
                                региональные перечни</a>
                        </li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/competition/stipendii-i-vyplaty">Стипендии и меры
                                поддержки обучающихся</a></li>

                    </ul>
                </li>

                <li class="header__list-item dropdown"><button class="dropdown__header">Загородный кампус</button>
                    <ul class="dropdown__menu dropdown__menu_center">

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/campus/summer-in-scarlet-sails/">Лето в Алых парусах</a>
                        </li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/campus/programs-and-camps/">Интенсивные (профильные)
                                смены</a></li>

                    </ul>
                </li>

                <li class="header__list-item dropdown"><button class="dropdown__header">Педагогам</button>
                    <ul class="dropdown__menu dropdown__menu_center">

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/pedagogam/obrazovatelnye-programmy/">Образовательные
                                программы</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/pedagogam/metodicheskaya-kopilka/">Методическая
                                копилка</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/pedagogam/lektorium/?clear_cache=Y">Лекториум</a></li>

                    </ul>
                </li>

                <li class="header__list-item dropdown"><button class="dropdown__header">Сведения об ОО</button>
                    <ul class="dropdown__menu dropdown__menu_center">

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/osnovnye-svedeniya/">Основные
                                сведения</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/struktura-i-organy-upravleniya/">Структура
                                и органы
                                управления образовательной организацией</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/dokumenty/">Документы</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/obrazovanie/">Образование</a>
                        </li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/standarty-i-trebovaniya/">Образовательные
                                стандарты и
                                требования</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/rukovodstvo-pedagogicheskiy-sostav/">Руководство.
                                Педагогический (научно-педагогический) состав </a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/materialno-tekhnicheskoe-obespechenie-i-osnashchennost/">Материально-техническое
                                обеспечение и оснащенность образовательного процесса </a></li>


                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/stipendii-i-mery-podderzhki/">Стипендии
                                и меры
                                поддержки обучающихся</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/platnye-obrazovatelnye-uslugi/">Платные
                                образовательные услуги</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/finansovo-khozyaystvennaya-deyatelnost/">Финансово-хозяйственная
                                деятельность</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/vakantnye-mesta-dlya-priema/">Вакантные
                                места для
                                приема (перевода) обучающихся</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/dostupnaya-sreda/">Доступная
                                среда</a></li>

                        <li class="dropdown__menu-item"><a class="dropdown__menu-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/mezhdunarodnoe-sotrudnichestvo/">Международное
                                сотрудничество</a></li>

                    </ul>
                </li>
            </ul>
        </nav>
        <nav class="header__mobile">
            <div class="header__mobile-info">
                <img src="{{ asset('assets/header/logo.svg') }}" alt="Логотип &quot;Алые паруса&quot;"
                    class="header__mobile-logo">
                <ul class="header__contacts header__contacts_mobile">
                    <li class="header__contacts-item">
                        <a href="tel:88422229383" class="header__contacts-link header__contacts-link_phone"
                            aria-label="Позвонить на номер 8 8422 22-93-83">
                            8 8422 22-93-83
                            <svg class="header__icon" width="45" height="45" viewBox="0 0 45 45"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="22.5" cy="22.5" r="22.5"></circle>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.2389 13.6059C15.4467 13.3984 15.6962 13.2374 15.9709 13.1337C16.2456 13.0299 16.5391 12.9857 16.8322 13.004C17.1252 13.0223 17.4111 13.1027 17.6707 13.2399C17.9303 13.377 18.1579 13.5677 18.3382 13.7994L20.4697 16.5379C20.8604 17.0403 20.9981 17.6946 20.8438 18.3121L20.1942 20.9129C20.1606 21.0476 20.1624 21.1887 20.1995 21.3225C20.2365 21.4563 20.3075 21.5782 20.4056 21.6765L23.3232 24.5943C23.4215 24.6926 23.5437 24.7637 23.6777 24.8008C23.8117 24.8378 23.953 24.8395 24.0879 24.8057L26.6873 24.1561C26.992 24.0799 27.31 24.074 27.6174 24.1388C27.9247 24.2036 28.2133 24.3374 28.4613 24.5302L31.1996 26.6607C32.184 27.4266 32.2743 28.8814 31.3932 29.7614L30.1653 30.9893C29.2866 31.8681 27.9733 32.254 26.749 31.823C23.6155 30.7203 20.7705 28.9263 18.4249 26.574C16.0729 24.2286 14.279 21.3837 13.1763 18.2504C12.7464 17.0272 13.1324 15.7126 14.0111 14.8338L15.2389 13.6059Z">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="header__contacts-item">
                        <a href="#" class="header__contacts-link header__contacts-link_mail"
                            aria-label="Отправить письмо на email">
                            <svg class="header__icon" width="45" height="45" viewBox="0 0 45 45"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="22.5" cy="22.5" r="22.5"></circle>
                                <path
                                    d="M12 18.124L22.1697 23.665C22.2717 23.7206 22.385 23.7496 22.5 23.7496C22.615 23.7496 22.7283 23.7206 22.8303 23.665L33 18.125V27.75C33.0001 28.5801 32.6969 29.3788 32.1527 29.9822C31.6085 30.5856 30.8645 30.948 30.0734 30.995L29.8977 31H15.1023C14.3099 31.0001 13.5475 30.6824 12.9715 30.1123C12.3955 29.5422 12.0496 28.7628 12.0048 27.934L12 27.75V18.124ZM15.1023 13H29.8977C30.6901 12.9999 31.4525 13.3176 32.0285 13.8877C32.6045 14.4578 32.9504 15.2372 32.9952 16.066L33 16.25V16.434L22.5 22.154L12 16.434V16.25C11.9999 15.4199 12.3031 14.6212 12.8473 14.0178C13.3915 13.4144 14.1355 13.052 14.9266 13.005L15.1023 13H29.8977H15.1023Z">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="header__contacts-item">
                        <a href="https://t.me/odarendeti73"
                            class="header__contacts-link header__contacts-link_telegram" target="_blank"
                            rel="noopener" aria-label="Телеграм">
                            <svg class="header__icon" width="45" height="45" viewBox="0 0 45 45"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="22.5" cy="22.5" r="22.5"></circle>
                                <path
                                    d="M31.4475 13.1184L11.074 20.4496C9.68354 20.9708 9.69159 21.6946 10.8189 22.0173L16.0496 23.54L28.1519 16.4146C28.7242 16.0897 29.247 16.2645 28.8172 16.6205L19.012 24.8782H19.0097L19.012 24.8793L18.6511 29.9105C19.1797 29.9105 19.413 29.6842 19.7095 29.4172L22.2501 27.1118L27.5348 30.7544C28.5093 31.2551 29.2091 30.9978 29.4515 29.9126L32.9207 14.656C33.2758 13.3275 32.3772 12.7259 31.4475 13.1184Z">
                                </path>
                            </svg>
                        </a>
                    </li>

                </ul>
            </div>

            <ul class="header__mobile-list">



                <li class="header__mobile-item">
                    <h3 class="header__mobile-subtitle">О центре</h3>
                    <ul class="header__mobile-sublist">

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/about/basic-information/">Основные сведения</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/about/board-of-trustees/">Попечительский совет</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/about/board-of-experts/">Экспертный совет</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/about/partners/">Партнеры</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/news/">Новости</a>
                        </li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/announcements/">Анонсы</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://forms.gle/3Dkve2t6dPWgophV8">Анкета НОКО 2022</a></li>

                    </ul>
                </li>

                <li class="header__mobile-item">
                    <h3 class="header__mobile-subtitle">Образовательные программы</h3>
                    <ul class="header__mobile-sublist">

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/education/nauka">Наука</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/education/iskusstvo">Искусство</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/education/sport">Спорт</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/education/literaturnoe-tvorchestvo">Литературное
                                творчество</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/education/distance-education">Дистанционная школа</a>
                        </li>

                    </ul>
                </li>

                <li class="header__mobile-item">
                    <h3 class="header__mobile-subtitle">Олимпиады и конкурсы</h3>
                    <ul class="header__mobile-sublist">

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/competition/olimpiady-i-konkursy">Календарь
                                мероприятий</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/competition/all-russian-contest/">ВсОШ</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/competition/big-challenges/">Большие вызовы</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/competition/regional-contest/">Региональные олимпиады и
                                конкурсы</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/competition/federal-and-regional-list/">Федеральные и
                                региональные перечни</a>
                        </li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/competition/stipendii-i-vyplaty">Стипендии и меры
                                поддержки обучающихся</a></li>

                    </ul>
                </li>

                <li class="header__mobile-item">
                    <h3 class="header__mobile-subtitle">Загородный кампус</h3>
                    <ul class="header__mobile-sublist">

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/campus/summer-in-scarlet-sails/">Лето в Алых парусах</a>
                        </li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/campus/programs-and-camps/">Интенсивные (профильные)
                                смены</a></li>

                    </ul>
                </li>

                <li class="header__mobile-item">
                    <h3 class="header__mobile-subtitle">Педагогам</h3>
                    <ul class="header__mobile-sublist">

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/pedagogam/obrazovatelnye-programmy/">Образовательные
                                программы</a></li>


                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/pedagogam/metodicheskaya-kopilka/">Методическая
                                копилка</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/pedagogam/lektorium/?clear_cache=Y">Лекториум</a></li>

                    </ul>
                </li>

                <li class="header__mobile-item">
                    <h3 class="header__mobile-subtitle">Сведения об ОО</h3>
                    <ul class="header__mobile-sublist">

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/osnovnye-svedeniya/">Основные
                                сведения</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/struktura-i-organy-upravleniya/">Структура
                                и органы
                                управления образовательной организацией</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/dokumenty/">Документы</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/obrazovanie/">Образование</a>
                        </li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/standarty-i-trebovaniya/">Образовательные
                                стандарты и
                                требования</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/rukovodstvo-pedagogicheskiy-sostav/">Руководство.
                                Педагогический (научно-педагогический) состав </a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/materialno-tekhnicheskoe-obespechenie-i-osnashchennost/">Материально-техническое
                                обеспечение и оснащенность образовательного процесса </a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/stipendii-i-mery-podderzhki/">Стипендии
                                и меры
                                поддержки обучающихся</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/platnye-obrazovatelnye-uslugi/">Платные
                                образовательные услуги</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/finansovo-khozyaystvennaya-deyatelnost/">Финансово-хозяйственная
                                деятельность</a></li>


                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/vakantnye-mesta-dlya-priema/">Вакантные
                                места для
                                приема (перевода) обучающихся</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/dostupnaya-sreda/">Доступная
                                среда</a></li>

                        <li class="header__mobile-subitem"><a class="header__mobile-link"
                                href="https://odarendeti73.ru/svedeniya-ob-organizatsii/mezhdunarodnoe-sotrudnichestvo/">Международное
                                сотрудничество</a></li>

                    </ul>
                </li>
            </ul>
        </nav>

    </div>

</header>
