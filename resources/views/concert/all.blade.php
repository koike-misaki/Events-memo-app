@extends('layouts.front')
@section('content')     
        <div class="cond_text_area">
                <form action="{{ action('ConcertController@all') }}" method="get">
                    <label class="cond_text_title">検索</label>
                    <input type="text" class="cond_form" name="cond_title" value="{{ $cond_title }}">
                    {{ csrf_field() }}
                    
                    <input type="submit" class="btn-2" value="検索">
                </form>
        </div> 

        <div class={{ $caution != "" ? "cond_text_area-2" :  "cond_text_area" }}>
            {{ $caution != "" ? $caution : ""}}
        </div>     
                    <table class="all_title">
                        <thead>
                            <tr>
                                <th class="all_title-1">日時</th>
                                <th class="all_title-2">ﾂｱｰ名</th>
                                <th class="all_title-2">ｱｰﾃｨｽﾄ名</th>
                                <th class="all_title-1">住所</th>
                                <th class="all_title-2">会場名</th>
                                <th class="all_title-1">ｽﾃｰﾀｽ</th>
                                <th class="all_title-3">ｺﾒﾝﾄ</th>
                                <th class="all_title-4">　</th>
                            </tr>
                        </thead>
                        <tbody class="all_memo_table">
                            @foreach($posts as $post)
                                <tr>
                                    <td class="all_table-1">{{ $post->date }}</td>
                                    <td class="all_table-2">{{ $post->tourname }}</td>
                                    <td class="all_table-2">{{ $post->artist }}</td>
                                    <td class="all_table-1">{{ $post->minaddress }}</td>
                                    <td class="all_table-2">{{ $post->where }}</td>
                                    
                                    <?php if($post->status === "still"): ?>
                                        <td class="all_table-1">参加予定</td>
                                    <?php elseif($post->status === "already"): ?>
                                        <td class="all_table-1">参加済み</td>
                                    <?php elseif($post->status === "avoid"): ?>
                                        <td class="all_table-1">不参加</td>
                                    <?php elseif($post->status === "cancel"): ?>
                                        <td class="all_table-1">公演中止</td>
                                    <?php endif; ?>
                                    
                                    <td class="all_table-3">{{ $post->comment }}</td>
                                    <td class="all_table-4">
                                            <div class="action"><a href="{{ action('ConcertController@detail', ['id' => $post->id]) }}">地図</a></div>   
                                            <div class="action"><a href="{{ action('ConcertController@edit', ['id' => $post->id]) }}">編集</a></div>
                                            <div class="action"><a href="{{ action('ConcertController@delete', ['id' => $post->id]) }}">削除</a></div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

        <div class="paging-area">
            <div class="paging-side">
            </div>
            <div class="paging">
                {{ $posts->links() }}
            </div> 
            <div class="paging-side">
            </div>         
        </div> 
            
@endsection