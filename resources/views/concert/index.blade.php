@extends('layouts.front')
@section('content')

      
        <div class="card-contents">
                <form action="{{ action('ConcertController@store') }}"  method="post" enctype="multipart/form-data">
                
                @if (count($errors) > 0)
                 <ul>
                  @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                  @endforeach
                 </ul>
                @endif
             
             <h2 class="text-title">コンサート参戦日</h2>    
             <div class="text">
                <input type="text" class="form-control" name="date" value="{{ old('date') }}">
             </div>
                
             <h2 class="text-title">ツアータイトル</h2>
             <div class="text">
             	<input type="text" class="form-control" name="tourname" value="{{ old('tourname') }}">
             </div> 

             <h2 class="text-title">アーティスト名</h2>
             <div class="text">
             	<input type="text" class="form-control" name="artist" value="{{ old('artist') }}">
             </div> 
                   
             <h2 class="text-title">開催地 住所</h2>    
             <div class="text">
                <input type="text" class="form-control" name="address" value="{{ old('address') }}">
             </div>
                
             <h2 class="text-title">会場・ホール名</h2>
             <div class="text">
            	<input type="text" class="form-control" name="where" value="{{ old('where') }}">
             </div>

             <h2 class="text-title">ステータス</h2>
             <div class="text">
               <label class="form-control-2" ><input type="radio" name="status" value="still">　参加予定</label>
               <label class="form-control-2" ><input type="radio" name="status" value="already">　参加済み</label>
               <label class="form-control-2" ><input type="radio" name="status" value="avoid">　不参加</label>
               <label class="form-control-2" ><input type="radio" name="status" value="cancel">　公演中止</label>
             </div>

             <h2 class="text-title">コメント</h2>
             <div class="text">
            	<input type="text" class="form-control" name="comment" value="{{ old('comment') }}">
             </div>
                  
                  {{ csrf_field() }}
                  
                  <div class = text-area>
                  <input type="submit" class="btn" name="next" value="SAVE">
                  </div>
                  
                  </form>
            </div>
      
      
@endsection