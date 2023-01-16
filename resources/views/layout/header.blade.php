<div class="navbar navbar-expand-lg d-flex justify-content-center py-4 bg-transparent @yield('border')" >
    <div class="d-flex flex-row align-items-center justify-content-between" style="width: 80%">
        <div class="navbar-brand m-0 p-0" style="color: @yield('logo'); font-family: 'Comfortaa'; font-weight: 500">Tripify</div>
        <!-- #3DA43A -->
        <div class="navbar-nav" style="color:black">
            <a class="nav-link mx-2 @yield('navHome') hover-underline-animation" href="/">Home</a>
            <a class="nav-link mx-2 @yield('navTour') hover-underline-animation" href="/tour">Tour</a>
            <a class="nav-link mx-2 @yield('navReq') hover-underline-animation" href="/requestTrip">Request Trip</a>
            <a class="nav-link mx-2 @yield('navGuide') hover-underline-animation" href="#">Guide</a>
            <a class="nav-link mx-3 @yield('navAbout') hover-underline-animation" href="/about">About Us</a>
        </div>
        
    @guest
        <div class="navbar-nav">
        @if (Route::has('login'))
            <div class="nav-item">
                <a class="nav-link @yield('login') hover-underline-animation" href="{{ route('login') }}">{{ __('Login') }}</a>
            </div>
        @endif

        @if (Route::has('register'))
            <div class="nav-item">
                <a class="nav-link @yield('register') hover-underline-animation" href="{{ route('register') }}">{{ __('Register') }}</a>
            </div>
        @endif
        </div>
    @else
        
            
        <div class="nav-item dropdown">
            <div class="navbar-nav align-items-center" style="font-size:20px;">
                @if(Auth::user()->is_admin == false)
                <a href="/cart/{{Auth::user()->id}}" style="color: @yield('cart'); text-decoration:none"> 
                    <i class="bi bi-cart3"></i>
                </a>
                @endif
                <a id="navbarDropdown" class="nav-link ms-3" style="color: @yield('profile');" href="#" role="button" data-bs-toggle="dropdown"  aria-expanded="false" v-pre>
                    <i class="bi bi-person-circle"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/inbox/{{Auth::user()->id}}">
                        Inbox
                    </a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item" href="/payment/{{Auth::user()->id}}" >
                        Payment History
                    </a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    
                </div>
            </div>
        </div>
    @endguest
    </div>
</div>
