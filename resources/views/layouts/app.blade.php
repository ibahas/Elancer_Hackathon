<!-- Start Header and side nav -->
<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>

    <meta charset="UTF-8">

    <meta name="description" content="">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="icon" type="image/png" href="https://new.sahel-motor.sa/site/images/logo.png">

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta name="og:image" content="https://new.sahel-motor.sa/site/images/logo.png" />
    <meta name="facebook:image" content="https://new.sahel-motor.sa/site/images/logo.png" />
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="https://new.sahel-motor.sa/site/vendor/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/UserProfile.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">

    <title>@lang('site.title') @yield('title')</title>
</head>

<body>

    @yield('conent')
    <!-- header start -->
    <header id="header" class="header">
        <div class="container">
            <div class="header-main">

            </div>
        </div>
    </header>
    <!-- header end -->
    <header class="header">
        <nav class="nav bg-grid">
            <div class="profile-top-nav-tools">
                <div class="nav__toggle" id="nav-toggle">
                    <i class="bx bx-menu"></i>
                </div>


                <!-- return user to main page  -->
                <a href="#" class="nav__toggle">
                    <i class="bx bx-home-alt"></i>
                </a>
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @lang('site.languages')
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li><a class="dropdown-item" id="{{ $localeCode }}-lang-small"
                                    hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>

            <!-- Shadow of small nav  -->
            <div class="menu-overlay"></div>

            <div class="nav__menu nav-menu" id="nav-menu">

                <div class="nav__close" id="nav-close">
                    <i class="bx bx-x"></i>
                </div>

                <ul class="nav__list">
                    @if (Auth::user()->role == 'client')
                        <li class="nav__item">
                            <a href="#queue" class="nav__link active">
                                <i class='bx bx-home'></i>
                                {{ trans('site.queues') }}
                            </a>
                        </li>
                    @else
                        <li class="nav__item">
                            <a href="#clients" class="nav__link active">
                                <i class='bx bx-user'></i>
                                {{ trans('site.clients') }}
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="#categories" class="nav__link active">
                                <i class='bx bxs-add-to-queue'></i>
                                {{ trans('site.categories') }}
                            </a>
                        </li>
                    @endif
                    <li class="nav__item">
                        <a href="#settings" class="nav__link active">
                            <i class='bx bx-analyse'></i>
                            {{ trans('site.settings') }}
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout').submit();"
                            title=" تسجيل خروج" class="nav__link">
                            <i class='bx bx-log-out'></i>
                            {{ trans('site.logout') }}
                        </a>
                        <div class="user-panel mt-3 pb-3 mb-3">
                            <form class="logout-form-nav" style="display: hidden" action="{{ route('logout') }}"
                                method="post" id="logout">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout').submit();"></a>
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- ==Header and Side navigation of user Profile only== -->

    <!-- Start profile content -->
    <section class="profile-section">
        <!-- Side navigation contain all list of page  -->
        <div class="profile-top-nav">
            <header class="header profile-top-header" id="profile-top-header">
                <nav class="nav bg-grid">
                    <div class="profile-top-nav-tools">
                        <!-- Retunr user to main page -->
                        <a href="{{ route('/') }}" class="pr-top-nav-icon">
                            <i class='bx bx-home-alt'></i>
                        </a>
                    </div>

                    <!-- Name of user was registered -->
                    <div>
                        <a href="#" class="pr-top-nav-user">{{ Auth::user()->name }}</a>
                    </div>
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            @lang('site.languages')
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li><a class="dropdown-item" id="{{ $localeCode }}-lang"
                                        hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </nav>
            </header>
        </div>
        <script>
            $(document).ready(function() {
                location.href = '#' + localStorage.getItem('href');
                // localStorage.setItem('href', '');

                $('#header').remove();
                $('footer').remove();
                $('body').css('background', 'white');
                $('.header').addClass('header-profile');

                var currentLocation = window.location.href;
                var hrefLocation = currentLocation.split("#");
                if (hrefLocation[1]) {
                    $(this).find('a').removeClass('active');
                } else {
                    $('a[href$="home"]').addClass('active');
                }
                $(window).scroll(function() {
                    // //Get max data-percent-viewport
                    // var $newArray = [];
                    // $("[data-percent-viewport]").each(function(index, element) {
                    //     $newArray.push($(this).attr('data-percent-viewport').split(' '));
                    // });
                    // //Find Max
                    // // console.log(Math.max(...$newArray.map(o => o)));
                    // var maxValueOfPercent = Math.max(...$newArray.map(o => o));
                    // // console.log($(`[data-percent-viewport='${maxValueOfPercent}']`));
                    // var classesElement = $(`[data-percent-viewport='${maxValueOfPercent}']`).attr('class');
                    // // console.log(classesElement);
                    // var lastClass = classesElement.substr(classesElement.lastIndexOf('') + 1);
                    // localStorage.setItem('href', lastClass);
                    // $('.nav__item').each(function(index, element) {
                    //     // element == this
                    //     $(this).find('a').removeClass('active');
                    // });
                    // $('a[href$="' + lastClass + '"]').addClass('active');
                    // // window.location = "#" + lastClass;

                });


                //Click to nav
                $('.nav__item').click(function() {
                    $('.nav__item').each(function(index, element) {
                        // element == this
                        $(this).find('a').removeClass('active');
                    });

                    $('.profile-container').each(function(index, element) {
                        // element == this
                        $(this).css('margin-top', '');
                    });

                    $(this).find('a').addClass('active');
                    var hrefElement = $(this).find('a').attr('href');
                    var newValue = '.' + hrefElement.replace('#', '');
                    $('html, body').animate({
                        scrollTop: $(newValue).offset().top
                    }, 1000)
                    $(newValue).css('margin-top', '12rem');
                });

                var currentLocation = window.location.href;
                var hrefLocation = currentLocation.split("#");
                $('.nav__item').each(function(index, element) {
                    // element == this
                    $(this).find('a').removeClass('active');

                });
                try {
                    var link = '#' + hrefLocation[1];
                    $($('a[href$="' + link + '"]')).addClass('active');
                    $('html, body').animate({
                        scrollTop: $('.' + hrefLocation[1]).offset().top
                    }, 1000);
                    $('.' + hrefLocation[1]).css('margin-top', '12rem');
                } catch (error) {

                }

            });
        </script>

        @yield('content')

        <footer id="footer">
            <div id="detail"></div>
            <div id="user"></div>
            <div id="open"></div>
            <div id="search"></div>
            <div id="search2"></div>
            <div id="cart"></div>
            <div id="cart2"></div>
            <div id="a-home"></div>
            <div id="a-about"></div>
            <div id="a-contact"></div>
            <div id="a-services"></div>
            <div id="a-pages"></div>
            <div id="a-categories"></div>
        </footer>
    </section>
    <script src="{{ asset('js/app/index.js') }}"></script>
    <script>
        function navSecond() {
            $(document).ready(function() {
                $('#header *').css('color', '#000000');
                $('.header .menu > .menu-item > a').css('color', '#000000');
                $('.product-count').css('color', '');
                $('.bx-x').css('color', '');
            });
        }

        function pagination() {
            if ($('.pagination')) {
                $('.pagination > li').hover(function() {
                    // over
                    $(this).find('a').css('color', '#fff');
                }, function() {
                    // out
                    $(this).find('a').css('color', 'var(--yellow)');
                });
            }
        }
    </script>

</body>

</html>
