@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br>
                    <br>
                    ”予約する”を押して予約フォームへ移動してください
                        <div>
                        <br>
                            <form action="/user/index">
                                <button type="submit" class="btn btn-primary">
                                    予約する
                                </button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
