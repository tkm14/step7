@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">商品新規登録画面</h1>

    <a href="{{ route('juices.index') }}" class="btn btn-primary mb-3">戻る</a>

    <form method="POST" action="{{ route('juice.store') }}" enctype="multipart/form-data">

        @csrf



        <div class="mb-3">
            <label for="name" class="form-label">商品名:</label>
            <input id="name" type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="maker" class="form-label">メーカー</label>
            <select class="form-select" id="maker" name="maker">
                @foreach($makers as $maker)
                    <option value="{{ $maker->maker }}">{{ $maker->maker }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="kakaku" class="form-label">価格:</label>
            <input id="kakaku" type="text" name="kakaku" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="zaiko" class="form-label">在庫数:</label>
            <input id="zaiko" type="text" name="zaiko" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="comment" class="form-label">コメント:</label>
            <textarea id="comment" name="comment" class="form-control" rows="3" ></textarea>
        </div>

        <div class="mb-3">
            <label for="img_path" class="form-label">商品画像:</label>
            <input id="img_path" type="file" name="img_path" class="form-control" >
        </div>

        <button type="submit" class="btn btn-primary">登録</button>
    </form>


</div>
@endsection

