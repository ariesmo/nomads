@extends('layouts.success')

@section('title')
    Success Checkout
@endsection

@section('content')
            <!-- Main -->
            <main>
                <section class="section-success d-flex align-items-center">
                    <div class="col text-center">
                         <img src="{{ url('frontend/images/icon/success.png') }}">
                        <h1>Yeay! Success</h1>
                        <p>We've sent you email for trip instruction<br>please read it ass well</p>
                        <a href="{{ url('/') }}" class="btn btn-homepage mt-3 px-5">Home Page</a>

                    </div>
                </section>
            </main>
             <!-- End Main -->
@endsection

