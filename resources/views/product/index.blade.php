<!-- This is rendered from [index.blade.php] -->
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

@extends('adminlte::page')

@section('title', '銀行経営指標')

@section('content_header')
    <h1>銀行経営指標比較</h1>
@stop

@section('content')
    {{-- 完了メッセージ --}}
    @if (session('message'))
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                ×
            </button>
            {{ session('message') }}
        </div>
    @endif

    {{-- 新規登録画面へ --}}
    <a class="btn btn-primary mb-2" href="{{ route('product.create') }}" role="button">新規登録</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>銀行名</th>
                        <th>PBR</th>
                        <th style="width: 70px"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            {{-- 数字フォーマット --}}
                            <td>{{ number_format($product->price, 2) }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm mb-2" href="{{ route('product.edit', $product->id) }}"
                                    role="button">編集</a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    {{-- 簡易的に確認メッセージを表示 --}}
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('削除してもよろしいですか?');">
                                        削除
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- ページネーション --}}
        @if ($products->hasPages())
            <div class="card-footer clearfix">
                {{ $products->links() }}
            </div>
        @endif
    </div>
@stop
