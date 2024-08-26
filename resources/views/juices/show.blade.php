@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">商品情報詳細</h1>

    <a href="{{ route('juices.index') }}" class="btn btn-primary mt-3">戻る</a>

    <dl class="row mt-3" >
        <dt class="col-sm-3">商品情報ID</dt>
        <dd class="col-sm-9">{{ $juice->id }}</dd>

        <dt class="col-sm-3">商品画像</dt>
        <dd class="col-sm-9">{{ $juice->name }}</dd>

        <dt class="col-sm-3">メーカー</dt>
        <dd class="col-sm-9">{{ $juice->maker }}</dd>

        <dt class="col-sm-3">価格</dt>
        <dd class="col-sm-9">{{ $juice->kakaku }}</dd>

        <dt class="col-sm-3">在庫数</dt>
        <dd class="col-sm-9">{{ $juice->zaiko }}</dd>

        <dt class="col-sm-3">コメント</dt>
        <dd class="col-sm-9">{{ $juice->comment }}</dd>

        <dt class="col-sm-3">商品画像</dt>
        <dd class="col-sm-9"><img src="{{ asset($juice->img_path) }}" width="300"></dd>
    </dl>
    <a href="{{ route('juices.edit', $juice) }}" class="btn btn-primary btn-sm mx-1">商品情報を編集する</a>

</div>
@endsection

