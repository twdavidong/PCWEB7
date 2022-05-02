@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h3>Test</h3>              
            <?php 
                $query = "";
                $query_run = mysqli_query($con, $query);

                if(mysqli_num_rows($query_run) > 0) {
                    $_SESSION["username"] = $user;

                }
            ?>

        </div>
    </div>
</div>
@endsection