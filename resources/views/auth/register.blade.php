@extends('layouts.app')
@include('footer')
@section('content')
<div class="main">
  <div class="card devise-card">
    <div class="form-wrap">
      <div class="form-group text-center">
        <h2 class="logo-img mx-auto"></h2>
        <p class="text-secondary">友達の写真や動画をチェックしよう</p>
      </div>
      <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <input class="form-control" placeholder="メールアドレス" autocomplete="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <div class="form-group">
          <input class="form-control" placeholder="ユーザーネーム" type="text" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="form-group">
          <input class="form-control" placeholder="パスワード" autocomplete="off" type="password" name="password" required>
        </div>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <div class="form-group">
          <input class="form-control" placeholder="パスワードの確認" autocomplete="off" type="password" name="password_confirmation" required>
        </div>

        <div class="actions">
          <input type="submit" name="commit" value="登録する" class="btn btn-primary w-100">
        </div>
      </form>
      <br>

      <p class="devise-link">
        アカウントをお持ちですか？
        <a href="/users/sign_in">サインインする</a>
      </p>
    </div>
  </div>
</div>
@endsection
 