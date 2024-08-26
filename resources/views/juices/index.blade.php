@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">商品情報一覧画面</h1>

    <a href="{{ route('juice.create') }}" class="btn btn-primary mb-3">商品新規登録</a>

</div>
<form action="{{ route('juices.index') }}" method="GET">
    @csrf
    <div class="row">
        <div class="col-md-2 offset-md-1">
      <input type="text" class="form-control" name='keyword' id="floatingInputGrid" placeholder="商品名" value="{{$keyword}}">
    </div>
        <div class="col-md-2">
        <select class="form-control" name="makerList" aria-label="Floating label select example" value="{{$makerList}}">
        <option value="">メーカー</option>
                @foreach($makers as $maker)
                    <option value="{{ $maker->maker }}">{{ $maker->maker }}</option>
                @endforeach
            </select>
</div>
        <div class="col-md-2">
    <input class="btn btn-primary" type="submit" value="検索">
</form>
</div>
</div>
</div>
        <div class="juices mt-5">
        <h2>商品情報</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>商品画像</th>
                    <th>商品名</th>
                    <th>価格</th>
                    <th>在庫数</th>
                    <th>メーカー名</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($juices as $juice)
                <tr>
                    <td>{{ $juice->id }}</td>
                    <td><img src="{{ asset($juice->img_path) }}" alt="商品画像" width="100" height="100"></td>
                    <td>{{ $juice->name }}</td>
                    <td>{{ $juice->kakaku }}</td>
                    <td>{{ $juice->zaiko }}</td>
                    <td>{{ $juice->maker }}</td>
                    </td>
                    <td>
                        <a href="{{ route('juices.show', $juice) }}" class="btn btn-info btn-sm mx-1">詳細表示</a>
                        <a href="{{ route('juices.edit', $juice) }}" class="btn btn-primary btn-sm mx-1">編集</a>
                        <form method="POST" action="{{ route('juices.destroy', $juice) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mx-1">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    
</div>
{!! $juices->links('pagination::bootstrap-5') !!}
@endsection
