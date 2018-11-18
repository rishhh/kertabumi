@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard {{ Auth::user()->username }}</div>

                <div class="card-body">

                @component('component.who')
                @endcomponent
                <br>

                </div>
                <form action="adminstok/store" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="file" name="file">
                    <br>
                    <input type="submit" value="Upload">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection