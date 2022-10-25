@extends('layouts.app2')

@section('content')

@include('component/header')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #0B5ED7">
                    <p class="text-center text-lg text-white">{{ Auth::user()->name }}{{ __('さん ようこそ！') }}</p>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <p class="text-lg py-2 flex justify-center">マイリストでお気に入りのイベントを管理しましょう！
                    </p>
                    <div class="flex justify-center text-lg py-2">
                        <a href="/events" class="px-4 py-1 text-white border-2 rounded-md  hover:bg-blue-600" style="background-color: #0B5ED7">イベントを探しに行く</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
