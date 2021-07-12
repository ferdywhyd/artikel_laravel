@extends('layouts.app')

@section('content')
@if ($data != null)
<div class="row justify-content-center">
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h2 class="h2">Author Profile</h2>
            </div>
            <div class="card-body">
                <form action="{{ url('/register/author') }}" method="post">
                    @csrf
                    <div class="row">
                        @if ($author_existing)
                        <div class="col-sm-12 col-md-5">
                            <div class="form-floating">
                                <label for="name" class="form-label">Name : </label>
                                <input type="text" name="name_author" value="{{ Auth::user()->name }}" class="form-control" id="name" disabled readonly>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-5">
                            <div class="form-floating">
                                <label for="email_author" class="form-label">Email : </label>
                                <input type="email" name="email_author" value="{{ Auth::user()->email }}" class="form-control" id="email_author" aria-describedby="emailHelp" disabled readonly>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2">
                            <div class="form-floating">
                                <label for="" class="form-label text-white">btn</label>
                                <button class="btn btn-primary btn-block" type="submit" disabled>Save</button>
                            </div>
                        </div>
                </form>
                @else
                <div class="col-sm-12 col-md-5">
                    <div class="form-floating">
                        <label for="name" class="form-label">Name : </label>
                        <input type="text" name="name_author" value="{{ Auth::user()->name }}" class="form-control" id="name">
                    </div>
                </div>
                <div class="col-sm-12 col-md-5">
                    <div class="form-floating">
                        <label for="email_author" class="form-label">Email : </label>
                        <input type="email" name="email_author" value="{{ Auth::user()->email }}" class="form-control" id="email_author" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="form-floating">
                        <label for="" class="form-label text-white">btn</label>
                        <button class="btn btn-primary btn-block" type="submit">Save</button>
                    </div>
                </div>
                @endif
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h2 class="h2">My Articles</h2>
        </div>

        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <div class="row">
                @foreach ($data as $item)
                {{-- 58 adalah ID author ferdy wahyudi --}}
                @if ($item->author == 58)
                <div class="col-sm 12 col-md-6">
                    <div id="{{ $item->id }}" class="card text-left my-2">
                        <div class="card-body">
                            <a href="{{ url('articles/detail/'.$item->id) }}" class="nav-link p-0 text-dark">
                                <h3 class="card-title">{{ $item->title }}</h3>
                            </a>
                            <p class="card-text">{!! $item->content !!}</p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@else
<div class="alert alert-primary" role="alert">
    <h4 class="alert-heading">Cache sedang dibersihkan!</h4>
    <p><strong>Pembersihan Cache bertujuan agar perubahan data dapat dilihat secara langsung</strong></p>
    <hr>
    <p class="mb-0">Silahkan <strong>Refresh Halaman</strong> anda, terimakasih</p>
</div>
@endif
@endsection