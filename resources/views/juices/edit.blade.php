@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('juices.index') }}" class="btn btn-primary mt-1 mb-3">戻る</a>
                <div class="card">
                    <div class="card-header"><h2>商品情報を変更する</h2></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('juices.update', $juice) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">商品名</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $juice->name }}" required>
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
                                <label for="kakaku" class="form-label">価格</label>
                                <input type="number" class="form-control" id="kakaku" name="kakaku" value="{{ $juice->kakaku }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="zaiko" class="form-label">在庫数</label>
                                <input type="number" class="form-control" id="zaiko" name="zaiko" value="{{ $juice->zaiko }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="comment" class="form-label">コメント</label>
                                <textarea id="comment" name="comment" class="form-control" rows="3">{{ $juice->comment }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="img_path" class="form-label">商品画像:</label>
                                <input id="img_path" type="file" name="img_path" class="form-control">
                                <img src="{{ asset($juice->img_path) }}" alt="商品画像" class="juice-image">
                            </div>

                            <button type="submit" class="btn btn-primary">更新</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

