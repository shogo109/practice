@extends('layouts.app')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')

<div class="d-flex flex-column align-items-center mt-3">
  <div class="col-xl-7 col-lg-8 col-md-10 col-sm-11 post-card">
    <div class="card">
      <div class="card-header">
        検索画面
      </div>
      <div class="card-body">
        <form class="upload-images p-0 border-0" id="new_post" enctype="multipart/form-data" action="{{ url('posts/filter')}}" accept-charset="UTF-8" method="POST">
        {{csrf_field()}} 
          <div class="form-group row mt-2">
            <div class="col-auto pr-0">
              <img class="post-profile-icon round-img" src="{{ asset('storage/user_images/' . Auth::user()->id . '.jpg') }}"/>
            </div>
            <div class="col pl-0">
              <input class="form-control border-0" placeholder="検索したいタブを書く。例)#アカシア集成材#ツーバイフォー" type="text" name="searchTags" value="{{ old('list_name') }}"/>
            </div>
          </div>
          <input type="submit" name="commit" value="検索する" class="btn btn-primary" data-disable-with="検索する" />
        </form>     
      </div>
    </div>
  </div>
</div>

@endsection
