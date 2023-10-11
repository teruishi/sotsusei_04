@extends('adminlte::page')

@section('title', '銀行経営指標登録')

@section('content_header')
    <h1>銀行経営指標登録</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible">
            {{-- エラーの表示 --}}
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- 登録画面 --}}
    <div class="card">
        <form action="{{ route('product.store') }}" method="post">
            @csrf
            <div class="card-body">
                {{-- 商品名入力 --}}
                <div class="form-group">
                    <label for="name">銀行名</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                        placeholder="銀行名" />
                </div>
                {{-- 価格入力 --}}
                <div class="form-group">
                    <label for="price">PBR</label>
                    <input type="decimal" class="form-control" id="price" name="price" value="{{ old('price') }}"
                        placeholder="PBR" />
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <a class="btn btn-default" href="{{ route('product.index') }}" role="button">戻る</a>
                    <div class="ml-auto">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
