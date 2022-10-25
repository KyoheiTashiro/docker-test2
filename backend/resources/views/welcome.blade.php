@extends('layouts.app')

@section('content')

<div id="app">
    <v-app>
        <app-component auth='{{Auth::id()}}'></app-component>
    </v-app>
</div>
@endsection

{{-- このbladeは下記のパス以外を表示で使用 --}}

{{-- 下記のパス、bladeはlayouts.app2で@yieldする --}}
{{-- (ヘッダーのVueRouterが仕様上、動かないため) --}}

{{-- /login --}}
{{-- /register --}}
{{-- /login-success --}}
