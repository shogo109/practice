@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="profile-wrap">
  <div class="my-row">
    <div class="col-md-4 text-center">
      @if ($user->image)
        <p>
          <img class="round-img" src="data:image/png;base64,{{ $user->image }}"/>
        </p>
        @else
          <img class="round-img" src="{{ asset('/images/blank_profile.png') }}"/>
      @endif
      <h6>{{ $user->name }}</h6>
    </div>
    <div class="col-md-8">
      <div class="row">
        @if ($user->id == Auth::user()->id)
          <a class="btn btn-outline-dark common-btn edit-profile-btn" href="/users/edit">プロフィールを編集</a>
          <a class="btn btn-outline-dark common-btn edit-profile-btn" rel="nofollow" data-method="POST" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
        @endif
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">設定</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="list-group text-center">
                <a class="list-group-item list-group-item-action" rel="nofollow" data-method="POST" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                <a class="list-group-item list-group-item-action" data-dismiss="modal" href="#">キャンセル</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <p class="my-p"> 
          {{ $user->email }}

        </p>
      </div>
    </div>
  </div>
</div>
@endsection
