@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{-- {{ __('A fresh verification link has been sent to your email address.') }} --}}
                            新しい確認用リンクがあなたのメールアドレスに送信されました
                        </div>
                    @endif

                    {{-- {{ __('Before proceeding, please check your email for a verification link.') }} --}}
                    続行する前に、確認用リンクのメールをご確認ください
                    {{-- {{ __('If you did not receive the email') }}, --}}
                    もしメールが届かない場合は、
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                            {{-- {{ __('click here to request another') }} --}}
                            こちらをクリック
                        </button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
