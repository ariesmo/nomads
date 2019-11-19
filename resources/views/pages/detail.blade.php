@extends('layouts.app')

@section('title')
    Detail Travel
@endsection

@section('content')
<!-- Main -->
<main>
    <section class="section-details-header"></section>
     <section class="section-details-content">
         <div class="container">
             <div class="row">
                 <div class="col p-0">
                     <nav>
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item">Paket Travel</li>
                             <li class="breadcrumb-item active">Details</li>
                         </ol>
                     </nav>
                 </div>
             </div>
             <div class="row">
                 <div class="col-lg-8 pl-lg-0">
                     <div class="card card-details">
                         <h1>{{ $items->title }}</h1>
                         <p>{{ $items->location }}</p>

                         @if ($items->galleries->count())
                         <div class="gallery">
                                <div class="xzoom-container">
                                    <img class="xzoom"  src="{{ Storage::url($items->galleries->first()->image) }}"  id="xzoom-default" xoriginal="{{ Storage::url($items->galleries->first()->image)  }}">
                                </div>
                                <div class="xzoom-thumbs">
                                    @foreach ($items->galleries as $gallery)
                                    <a href="{{ Storage::url($gallery->image) }}">
                                            <img class="xzoom-gallery" src="{{ Storage::url($gallery->image) }}"   width="128" xpreview="{{ Storage::url($gallery->image) }}"></a>
                                    @endforeach
                                </div>
                            </div>
                         @endif


                         <h2>Tentang Wisata</h2>
                         <p>{!! $items->about !!}</p>
                         <div class="features">
                             <div class="row">
                                 <div class="col-md-4">
                                     <img src="{{ url('frontend/images/icon/features.png') }}" alt="" class="features-image">
                                     <div class="description">
                                         <h3>Featured Event</h3>
                                         <p>{{ $items->featured_event }}</p>
                                     </div>
                                 </div>
                                 <div class="col-md-4 border-left">
                                         <img src="{{ url('frontend/images/icon/languange.png') }}" alt="" class="features-image">
                                     <div class="description">
                                         <h3>Languange</h3>
                                         <p>{{ $items->languange }}</p>
                                     </div>
                                 </div>
                                 <div class="col-md-4 border-left">
                                         <img src="{{ url('frontend/images/icon/food.png') }}" alt="" class="features-image">
                                     <div class="description">
                                         <h3>Foods</h3>
                                         <p>{{ $items->foods }}</p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4">
                     <div class="card card-details card-right">
                         <h2>Members are going</h2>
                         <div class="members my-2 px-4">
                             <img src="{{ url('frontend/images/testimoni/Group_testimoni1.png') }}" alt="" class="member-image mr-1">
                             <img src="{{ url('frontend/images/testimoni/Group_testimoni2.png') }}" alt="" class="member-image mr-1">
                             <img src="{{ url('frontend/images/testimoni/Group_testimoni3.png') }}" alt="" class="member-image mr-1">
                             <img src="{{ url('frontend/images/testimoni/Group_testimoni4.jpg') }}" alt="" class="member-image mr-1 rounded-circle">
                             <img src="{{ url('frontend/images/testimoni/member5.png') }}" alt="" class="member-image mr-1">
                        </div>
                         <hr>
                         <h2>Trip Informations</h2>
                         <table class="trip-informations">
                             <tr>
                                 <th width="50%">Date of Departure</th>
                                 <td width="50%" class="text-right">{{ \Carbon\Carbon::create($items->departure_date)->format('F n, Y') }}</td>
                             </tr>
                             <tr>
                                 <th width="50%">Duration</th>
                                 <td width="50%" class="text-right">{{ $items->duration }}</td>
                             </tr>
                             <tr>
                                 <th width="50%">Type</th>
                                 <td width="50%" class="text-right">{{ $items->type }}</td>
                             </tr>
                             <tr>
                                 <th width="50%">Price</th>
                                 <td width="50%" class="text-right">${{ $items->price }},00 / person</td>
                             </tr>
                         </table>
                     </div>
                     <div class="join-container">
                        @guest
                            <a href="{{ url('login') }}" class="btn btn-block btn-join-now mt-3 my-2">Login or Register</a>
                        @endguest

                        @auth
                            <form action="{{ route('checkout_process', $items->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                Join Now
                                </button>
                            </form>
                        @endauth


                     </div>
                 </div>
             </div>
         </div>
     </section>
</main>
 <!-- End Main -->
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
<script>
$(document).ready(function(){
    $('.xzoom, .xzoom-gallery').xzoom({
        zoomWidth: 500,
        title: false,
        tint: '#333',
        xoffset: 15
    });
});

</script>
@endpush


