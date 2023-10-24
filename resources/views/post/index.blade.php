@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
@foreach ($posts as $post) 
  <div class="col-md-8 col-md-2 mx-auto">
    <div class="card-wrap">
      <div class="card">
        <div class="card-header align-items-center d-flex">
          <!-- ユーザー部分の表示 -->
          <a class="no-text-decoration" href="/users/{{ $post->user->id }}">
            @if ($post->user->image)
                <img class="post-profile-icon round-img" src="data:image/png;base64,{{ $post->user->image }}"/>
            @else
                <img class="post-profile-icon round-img" src="{{ asset('/images/blank_profile.png') }}"/>
            @endif
          </a>
          <a class="black-color no-text-decoration" title="{{ $post->user->name }}" href="/users/{{ $post->user->id }}">
            <strong>{{ $post->user->name }}</strong>
          </a>
          @if ($post->user->id == Auth::user()->id)
          	<a class="ml-auto mx-0 my-auto" rel="nofollow" href="/postsdelete/{{ $post->id }}">
              <div class="delete-post-icon">
              </div>
          	</a>
          @endif
        </div>

        <!-- 写真の表示 -->
        <a href="/users/{{ $post->user->id }}">
          <img src="{{ asset('storage/post_images' . $post->image) }}" class="card-img-top" />
        </a>

        <!-- タグの表示 -->
        <div class="card-body"> 
          <div class="d-flex flex-wrap">
            @if(!empty($post->tagLabel_1))
              @for($i = 1; $i <= 5; $i++)
                @php
                  $columnName = 'tagLabel_' . $i;
                  $tagValue = $post->$columnName;
                @endphp
                @if(!empty($tagValue))
                  <p class="text-primary mb-0">#{{$tagValue}}</p>
                @else
                  <?php break; ?>
                @endif
              @endfor
            @else
              <p class="text-secondary mb-0">タグが保存されてません</p>
            @endif
          </div>
          <!-- いいね表示 -->
          <div class="row parts">
            <div id="like-icon-post-{{ $post->id }}">
              @if ($post->likedBy(Auth::user())->count() > 0)
                <a id="loved" class="loved hide-text custom-heart" data-name="{{$post->id}}" data-remote="true" rel="nofollow" data-method="POST">
                  <svg class="likeButton " width="40px" height="40px" viewBox="0 0 500 500">
                    <circle class="explosion" r="150" cx="250" cy="250"></circle>
                    <g class="particleLayer">
                      <circle fill="#8CE8C3" cx="130" cy="126.5" r="12.5"/>
                      <circle fill="#8CE8C3" cx="411" cy="313.5" r="12.5"/>
                      <circle fill="#91D2FA" cx="279" cy="86.5" r="12.5"/>
                      <circle fill="#91D2FA" cx="155" cy="390.5" r="12.5"/>
                      <circle fill="#CC8EF5" cx="89" cy="292.5" r="10.5"/>
                      <circle fill="#9BDFBA" cx="414" cy="282.5" r="10.5"/>
                      <circle fill="#9BDFBA" cx="115" cy="149.5" r="10.5"/>
                      <circle fill="#9FC7FA" cx="250" cy="80.5" r="10.5"/>
                      <circle fill="#9FC7FA" cx="78" cy="261.5" r="10.5"/>
                      <circle fill="#96D8E9" cx="182" cy="402.5" r="10.5"/>
                      <circle fill="#CC8EF5" cx="401.5" cy="166" r="13"/>
                      <circle fill="#DB92D0" cx="379" cy="141.5" r="10.5"/>
                      <circle fill="#DB92D0" cx="327" cy="397.5" r="10.5"/>
                      <circle fill="#DD99B8" cx="296" cy="392.5" r="10.5"/>
                    </g>
                    <path class="loved" d="M250,187.4c-31.8-47.8-95.5-19.8-95.5,32.2c0,35.2,31.8,60.3,55.7,79.2c24.9,19.7,31.8,23.9,39.8,31.8 c7.9-7.9,14.6-12.6,39.8-31.8c24.3-18.5,55.7-44.4,55.7-79.6C345.5,167.6,281.8,139.7,250,187.4z"/>
                  </svg>
                </a>
              @else
                <a id="love" class="love hide-text custom-heart" data-name="{{$post->id}}" data-remote="true" rel="nofollow" data-method="POST">
                  <svg class="likeButton" width="40px" height="40px" viewBox="0 0 500 500">
                    <circle class="explosion" r="150" cx="250" cy="250"></circle>
                    <g class="particleLayer">
                      <circle fill="#8CE8C3" cx="130" cy="126.5" r="12.5"/>
                      <circle fill="#8CE8C3" cx="411" cy="313.5" r="12.5"/>
                      <circle fill="#91D2FA" cx="279" cy="86.5" r="12.5"/>
                      <circle fill="#91D2FA" cx="155" cy="390.5" r="12.5"/>
                      <circle fill="#CC8EF5" cx="89" cy="292.5" r="10.5"/>
                      <circle fill="#9BDFBA" cx="414" cy="282.5" r="10.5"/>
                      <circle fill="#9BDFBA" cx="115" cy="149.5" r="10.5"/>
                      <circle fill="#9FC7FA" cx="250" cy="80.5" r="10.5"/>
                      <circle fill="#9FC7FA" cx="78" cy="261.5" r="10.5"/>
                      <circle fill="#96D8E9" cx="182" cy="402.5" r="10.5"/>
                      <circle fill="#CC8EF5" cx="401.5" cy="166" r="13"/>
                      <circle fill="#DB92D0" cx="379" cy="141.5" r="10.5"/>
                      <circle fill="#DB92D0" cx="327" cy="397.5" r="10.5"/>
                      <circle fill="#DD99B8" cx="296" cy="392.5" r="10.5"/>
                    </g>
                    <path class="heart" d="M250,187.4c-31.8-47.8-95.5-19.8-95.5,32.2c0,35.2,31.8,60.3,55.7,79.2c24.9,19.7,31.8,23.9,39.8,31.8 c7.9-7.9,14.6-12.6,39.8-31.8c24.3-18.5,55.7-44.4,55.7-79.6C345.5,167.6,281.8,139.7,250,187.4z"/>
                  </svg>
                </a>
              @endif
            </div>
            <!-- コメント表示 -->
            <a class="comment" href="#"></a>
          </div>
          <div id="like-text-post-{{ $post->id }}">
            @include('post.like_text')
          </div>
          <div>
            <span><strong>{{ $post->user->name }}</strong></span>
            <span>{{ $post->caption }}</span>
            <div id="comment-post-{{ $post->id }}">
              @include('post.comment_list')
            </div>
            <a class="light-color post-time no-text-decoration" href="/posts/{{ $post->id }}">{{ $post->created_at }}</a>
            <hr>
            <div class="row actions" id="comment-form-post-{{ $post->id }}">
           	  <form class="w-100" id="new_comment" action="/posts/{{ $post->id }}/comments" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="&#x2713;" />
             	  {{csrf_field()}} 
                <input value="{{ Auth::user()->id }}" type="hidden" name="user_id" />
                <input value="{{ $post->id }}" type="hidden" name="post_id" />
                <input class="form-control comment-input border-0" placeholder="コメント ..." autocomplete="off" type="text" name="comment" />
              </form>
            </div>
          </div>
        </div> 
      </div>
    </div>
  </div>
@endforeach
@endsection



@section('scripts')
  @vite(['resources/js/asyncs/likeAsync.js'])
@endsection
