
<html>
<head>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</head>
    <div class="form-control">
        <div class="card md-6 mx-auto" style="width: 18rem;text-align:center">
            <div class="card-header">
                Upload a file
            </div>          
            <div class="card-body">
                @if (session()->has('fileset'))
                <div class="mb-2 font-medium">
                    <p class="text-success">{{ session('fileset') }}</p>
                </div>
                {{-- <div class="container">
                    <p class="">{{session()->get('fileset')}}</p>
                </div> --}}
                @endif
               <form method="POST" action="{{route('upload.image')}}" enctype=multipart/form-data name="imageuploadform">
                @csrf
                    <label for="imageInput">Select File:</label>
                    <input type="file" autocomplete="off" class="form-control" id="imageInput" name="imageInput"/>
                    
                    <input type="submit" id="submitImage" class="btn btn-primary my-3" name="submit" />
                </form>
               </div>
            </div>
            </div>
    </div>
</html>
