<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fibonacci Multiplication Table</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Fibonacci Sequence in Multiplication Table</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <h2>
                You can try GET API by submitting form below
            </h2>


            <form action="{{ route('fibonacci.get') }}">

                <div class="form-group">
                    <label for="number">Number:</label>

                    <input type="text"
                           class="form-control"
                           placeholder="Enter number"
                           name="n"
                           id="number">
                </div>

                <button class="btn btn-primary">
                    Submit GET request
                </button>
            </form>
        </div>

        <div class="col-6">
            <h2>
                You can try POST API by submitting form below
            </h2>


            <form action="{{ route('fibonacci.post') }}"
                  method="post">

                <div class="form-group">
                    <label for="number">Number:</label>

                    <input type="text"
                           class="form-control"
                           placeholder="Enter number"
                           name="n"
                           id="number">
                </div>

                <button class="btn btn-primary">
                    Submit POST request
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
