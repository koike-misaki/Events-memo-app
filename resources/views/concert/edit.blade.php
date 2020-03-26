@extends('layouts.front')
@section('content')

        <div class="card-contents">
            <form action="{{ action('ConcertController@update') }}"  method="post" enctype="multipart/form-data">
                
                @if (count($errors) > 0)
                 <ul>
                  @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                  @endforeach
                 </ul>
                @endif
             
             <h2 class="text-title">コンサート参戦日</h2>    
             <div class="text">
                <input type="text" class="form-control" name="date" value="{{ $concert->date }}">
             </div>
                
             <h2 class="text-title">ツアータイトル</h2>
             <div class="text">
             	<input type="text" class="form-control" name="tourname" value="{{ $concert->tourname }}">
             </div> 

             <h2 class="text-title">アーティスト名</h2>
             <div class="text">
             	<input type="text" class="form-control" name="artist" value="{{ $concert->artist }}">
             </div> 

             <h2 class="text-title">住所</h2>    
             <div class="text">
                <input type="text" class="form-control" name="address"" value="{{ $concert->address }}">
             </div>
                
             <h2 class="text-title">会場・ホール名</h2>
             <div class="text">
            	<input type="text" class="form-control" name="where" value="{{ $concert->where }}">
             </div>

             <h2 class="text-title">ステータス</h2>
             <div class="text">
               <label class="form-control-2" ><input type="radio" name="status" value="still" {{ $concert->status == "still" ? 'checked' :  '' }}>　参加予定</label>
               <label class="form-control-2" ><input type="radio" name="status" value="already" {{ $concert->status == "already" ? 'checked' :  '' }}>　参加済み</label>
               <label class="form-control-2" ><input type="radio" name="status" value="avoid" {{ $concert->status == "avoid" ? 'checked' :  '' }}>　不参加</label>
               <label class="form-control-2" ><input type="radio" name="status" value="cancel" {{ $concert->status == "cancel" ? 'checked' :  '' }}>　公演中止</label>
             </div>

             <h2 class="text-title">コメント</h2>
             <div class="text">
            	<input type="text" class="form-control" name="comment" value="{{ $concert->comment }}">
             </div>
             
             
             <input type="hidden" name="id" value="{{ $concert->id }}">
             {{ csrf_field() }}
                  
             <div class = text-area>
               <input type="submit" class="btn" name="next" value="SAVE">
             </div>
            
            </form>
            </div>
      
@endsection