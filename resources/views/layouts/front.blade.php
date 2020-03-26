<!DOCTYPE HTML>
<html>
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Events memo app</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
  </head>
  
  <body>
   <header>
    <div class="container">
      <div class="header-title-area">
        <h1 class="logo">コンサート/イベント予定表</h1>
      </div>
    
    
    <ul class="header-navigation">
        <li><a href="{{ action('ConcertController@create') }}">add</a></li>    
        <li><a href="{{ action('ConcertController@all') }}">all</a></li>
        @guest
          <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
            @else
          <li>
            <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
              </a>
              </li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
              </form>
          @endguest
    </ul>
    
    </div>
   </header>
      
    <div class="main">
     @yield('content')
    </div>
    
    <footer>
     <p class="copyright">2020-03-13 / Events memo app </p>
    </footer>
    
  </body>
  </html>