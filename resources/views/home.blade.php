@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <a href="{{route('createDbBackup')}}">Create A Sql Backup</a>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <ul>
                        @foreach(\App\DatabaseHandeler::all() as $db)
                        <li><a href="{{asset('database/'.$db->path)}}">{{$db->path}}</a></li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
