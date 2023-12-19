<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo mr-auto"><a href="{{ url('/') }}"><span>{{ __('Dnv') }}</span>{{ __('Master') }}</a></h1>
        <nav class="nav-menu d-none d-lg-block">
            <ul>

                <li class="active"><a href="{{ url('/') }}">{{ __('Главная') }}</a></li>
                <li class="drop-down"><a href="">{{ __('О нас') }}</a>
                    <ul>
                        <li><a href="about.html">{{ __('Мы') }}</a></li>
                        <li><a href="team.html">{{ __('Наша команда') }}</a></li>
                        <li><a href="testimonials.html">Testimonials</a></li>
                        <li class="drop-down"><a href="#">Deep Drop Down</a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li><a href="services.html">Services</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="pricing.html">Pricing</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="{{ route('login') }}">{{ __('Войти') }}</a></li>

            </ul>
        </nav>
        <!-- .nav-menu -->
        <div class="header-social-links">
            <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
            <a href="https://www.facebook.com/profile.php?id=100076021606866" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
            <a href="https://www.linkedin.com/in/mikolai-dziamko-08653a286/" class="linkedin"><i class="icofont-linkedin"></i></i></a>
        </div>
    </div>
</header>
