@extends('site.layout.site')
@section('content')
    <style>
        .text {
            font-size: 20px;
            color: #000;

        }
    </style>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Feedback</h1>
                <div class="card-body">
                    
                @if (count($feedback) > 0)
                    @foreach ($feedback as $comment)
                        <p>{{ $comment->comment }}</p>
                    @endforeach
                @endif
                    </div>
            </div>
            <form action="{{route('feedback.store' , ['doctor' => $doctor->id])}}" method="post">
                @csrf
                <div class="form-outline">
                    <label class="form-label text" for="textAreaExample">Add Feedback</label>
                    <textarea name="comment" class="form-control" id="textAreaExample" rows="4"></textarea>
                    <button type="submit" class="btn btn-primary py-2">submit</button>
                </div>
            </form>
        @endsection
