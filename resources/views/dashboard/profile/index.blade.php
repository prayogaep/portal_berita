@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

    </div>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                @if ($profile->foto != 'default.png')
                <img src="{{ asset('profile/' . $profile->foto) }}" class="img-fluid rounded-start">
                @else
                <img src="{{ asset('img/' . $profile->foto) }}" class="img-fluid rounded-start">
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $profile->nama }}</h5>
                    <p class="card-text"><span class="text-muted">{{ $profile->profesi }} | {{ $profile->contact }}</span>
                    </p>
                    <p class="card-text">{!! $profile->description !!}</p>
                    @if (Auth::user()->id == $profile->user_id && $profile->foto)
                        <div class="d-flex align-items-end flex-column ">
                            <a href="/updateProfile/{{ base64_encode($profile->id) }}" class="btn btn-primary"><span
                                    data-feather="edit"></span></a>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
