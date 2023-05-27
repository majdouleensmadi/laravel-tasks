@extends('movie.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Movies Crud</h2>
                        <img src="{{ asset('https://th.bing.com/th/id/R.d01a8fbdf7bbb4d9dc936d06e151039f?rik=7oh09%2f9AD8MQcw&pid=ImgRaw&r=0') }}" alt="Netflix Logo" class="netflix-logo" style="height: 50px; width: 100px;">
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/movie') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Director name" name="director_name">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Filter</button>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            @foreach($movies as $item)
                                <div class="col-md-3">
                                    <div class="movie-card">
                                        <div class="movie-card-img">
                                            @if($item->img)
                                                <img src="{{ asset('movies/image/'. $item->img) }}" alt="Movie Image" class="img-thumbnail">
                                            @else
                                                <img src="{{ asset('path-to-default-image.png') }}" alt="Default Image" class="img-thumbnail">
                                            @endif
                                        </div>
                                        <div class="movie-card-content">
                                            <h4>{{ $item->name }}</h4>
                                            <p>{{ $item->description }}</p>
                                            <p><strong>Director:</strong> {{ $item->director ? $item->director->name : 'N/A' }}</p>
                                            <p><strong>Genre:</strong> {{ $item->gener }}</p>
                                        </div>
                                        <div class="movie-card-actions">
                                            <a href="{{ url('/movie/' . $item->id) }}" title="View Movie" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                            <a href="{{ url('/movie/' . $item->id . '/edit') }}" title="Edit Movie" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                            <form method="POST" action="{{ url('/movie' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Movie" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="add-movie-button">
                    <a href="{{ url('/movie/create') }}" class="btn btn-success btn-sm" title="Add New Movie">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
