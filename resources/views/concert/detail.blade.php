<!DOCTYPE HTML>
<html>
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Events memo app</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBgNaknUhxwga-QQD8lhuhryYruZ5GoYl0&language=ja"></script>
    <script type="text/javascript" src="{{ asset('bower_components/gmaps/gmaps.min.js') }}"></script>
    <script type="text/javascript">
      // コントローラから渡された住所を取得
      var addressStr = "{{ $concert->address }}";
 
      $(document).ready(function(){
          // Gmapsを利用してマップを生成
          var map = new GMaps({
              div: '#map',
              lat: -12.043333,
              lng: -77.028333
          });
 
          // 住所からマップを表示
          GMaps.geocode({
              address: addressStr.trim(),
              callback: function(results, status) {
                  if (status == 'OK') {
                      var latlng = results[0].geometry.location;
                      map.setCenter(latlng.lat(), latlng.lng());
                      map.addMarker({
                          lat: latlng.lat(),
                          lng: latlng.lng()
                      });
                  }
              }
          });
      });
    </script>
    
    <style>
      @charset "utf-8";
      #map {
        height: 400px;
      }
    </style>
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
      <p>住所：{{ $concert->address }}</p>
      <p>会場：{{ $concert->where }}</p>
      <div id="map"></div>

    </div>
    
    <footer>
     <p class="copyright">2020-03-13 / Events memo app </p>
    </footer>
    
  </body>
  </html>