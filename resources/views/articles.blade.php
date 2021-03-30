
<head>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</head>
<div class="container mt-3">
@foreach ($posts as $post)
    <div style="margin-bottom:1rem">
        <div style="border:1px solid red">
            {{$post->title}}
        </div>
        <div style="border:1px solid red">
            {{$post->content}}
        </div>
    </div>
@endforeach
</div>
{{-- <div style="margin-left:7rem;margin-right:7rem;" class="card"> --}}
<div class="paginationWrapper" style="display:flex;align-content:center;justify-content:center">
{{-- @if($posts->currentPage() > 1)
      <a href="{{ $posts->previousPageUrl() }}">Previous</a>
   @endif --}}
    {{$posts->links()}}
   {{-- @if($posts->hasMorePages())
      <a href="{{ $posts->nextPageUrl() }}">Next</a>
   @endif --}}
{{-- {{$posts->onEachSide(5)->links()}} --}}
{{-- {{$posts->links('pagination::bootstrap-4')}} --}}
{{-- </div> --}}
</div>