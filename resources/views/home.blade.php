    <!-- Styles -->
    <link href="{{ asset('css/tabheaders.css') }}" rel="stylesheet">

        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />

    <script type="text/javascript" src="js/myapp.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/home.js') }}"></script>


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

                    <h2 class="animate__animated animate__rotateIn">You are logged in!</h2>

                </div>
                <tr class="spacer">
                        <tr>
                            <td class='color'>
                            <h2><a href="{{ url('/profile') }}">Profile</a>
                            </h2></td>
                            <td class='color'>
                            <h2><a href="{{ url('/[post/show]') }}">View Items</a>
                            </h2></td>
                            <td class='color'>
                            <h2><a href="{{ url('/post/create') }}">Add Item</a>
                            </h2></td>
                        </tr>
                    </tr>
            </div>
        </div>
    </div>
</div>
@endsection
