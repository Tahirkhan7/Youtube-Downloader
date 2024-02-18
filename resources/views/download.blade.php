<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Youtube Downloader</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style type="text/css">
        .container {
            max-width: 1000px;
            margin: 50px auto;
            text-align: left;
            font-family: sans-serif;
        }
        form {
            border: 1px solid #1A33FF;
            background: #ecf5fc;
            padding: 40px 50px 45px;
        }
        .form-control:focus {
            border-color: #000;
            box-shadow: none;
        }
        label {
            font-weight: 600;
        }
        .error {
            color: red;
            font-weight: 400;
            display: block;
            padding: 6px 0;
            font-size: 14px;
        }
        .form-control.error {
            border-color: red;
            padding: .375rem .75rem;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
        @endif
        <form action="{{ route('youtube.download') }}" method="post">
            @csrf
            <div class="row justify-content-center"> <!-- Centering the row -->
                <div class="col-md-12">
                    <h2 class="text-center">Download Youtube Video</h2> <!-- Heading -->
                    <div class="form-group">
                        <input type="text" class="form-control" name="link" id="link" placeholder="Enter URL of Youtube video to download" required>
                    </div>
                    <input type="submit" value="Download" class="btn btn-dark btn-block">
                </div>
            </div>
        </form>
    </div>
    <div class="footer">
        <p>Created with &#128151; by <strong>  <b>Tahir Khan</b></strong> </p>
        <p><a href="https://www.instagram.com/taahirkhann" target="_blank">Instagram</a> | <a href="https://www.linkedin.com/in/tahirkhan7" target="_blank">LinkedIn</a> | <a href="https://github.com/Tahirkhan7" target="_blank">GitHub</a></p>
    </div>
</body>
</html>
