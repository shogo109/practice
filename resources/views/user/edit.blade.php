@extends('layouts.app')
@include('navbar')
@include('footer')
@include('common.errors')
@section('content')
<div class="col-md-offset-2 mb-4 edit-profile-wrapper">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="profile-form-wrap">
        <form class="edit_user" enctype="multipart/form-data" action="/users/update" accept-charset="UTF-8" method="post">
          <input name="utf8" type="hidden" value="&#x2713;" />
          <input type="hidden" name="id" value="{{ $user->id }}" />
          {{csrf_field()}} 
          <div class="form-group">
            <label for="user_profile_photo">プロフィール写真</label><br>
                @if ($user->profile_photo)
                    <p>
                        <img src="{{ asset('storage/user_images/' . $user->profile_photo) }}" alt="avatar" />
                    </p>
                @endif
            <input type="file" name="user_profile_photo"  value="{{ old('user_profile_photo',$user->id) }}" accept="image/jpeg,image/gif,image/png" />
          </div>

          <div class="form-group">
            <label for="user_name">名前</label>
            <input autofocus="autofocus" class="form-control" type="text" value="{{ old('user_name',$user->name) }}" name="user_name" />
          </div>

          <div class="form-group">
            <label for="user_email">メールアドレス</label>
            <input autofocus="autofocus" class="form-control" type="email" value="{{ old('user_email',$user->email) }}" name="user_email" />
          </div>

          <div class="form-group">
            <label for="user_password">パスワード</label>
            <input autofocus="autofocus" class="form-control" type="password" value="{{ old('user_password',$user->password) }}" name="user_password" />
          </div>

          <div class="form-group">
            <label for="user_password_confirmation">パスワードの確認</label>
            <input autofocus="autofocus" class="form-control" type="password" name="user_password_confirmation" />
          </div>

          <input type="submit" name="commit" value="変更する" class="btn btn-primary" data-disable-with="変更する" />
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
