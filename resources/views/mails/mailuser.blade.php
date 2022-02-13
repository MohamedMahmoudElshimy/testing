<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">


    </head>
    <body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <section class="mail-seccess section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12">
                    <!-- Error Inner -->
                    <div class="success-inner">
                        <h1><i class="fa fa-envelope"></i><span>{{$details ['title']}}</span></h1>
                        <p>{{$details ['body']}}</p>
                        <a href="#" class="btn btn-primary btn-lg">Go Home</a>
                    </div>
                    <!--/ End Error Inner -->
                </div>
            </div>
        </div>
    </section>
        </div>
    </body>
</html>
