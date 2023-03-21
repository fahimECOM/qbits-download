<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
<div class="row">
    <div class="col-md-6 offset-md-3 mt-5">
        <h4>Contact Us</h4>

        @if(Auth::user()->user_type == 'customer')
            $route_link = "route('send.email')";
        @else
            $route_link = "route('admin.send.email')";
        @endif

        <form action="{{$route_link}}" method="POST">
            @csrf
            @if(Session::has('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
            @endif
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
            <div class="from-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" placeholder="enter name" value="{{ old('name')}}" >
                @error('name')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="from-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" placeholder="enter email" value="{{ old('email')}}" >
                @error('email')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="from-group">
                <label for="">Subject</label>
                <input type="text" class="form-control" name="subject" placeholder="enter name" value="{{ old('subject')}}" >
                @error('subject')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="from-group">
                <label for="">Message</label>
                <textarea name="message" class="form-control" cols="30" rows="10">{{ old('message')}}</textarea>
                @error('subject')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <button class="btn btn-primary">send</button>
        </form>
    </div>
</div>
</div>
</body>
</html>