<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>


        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">

                  <form method="post" action="{{route('offer.store')}}">
                    @csrf
                    <div class="container">
                      <div class="text-center">
                          <div class="form-group mt-5">
                              <label for="email" class="col-sm-2 control-label">Offer Name</label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" name="name">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="email" class="col-sm-2 control-label">Offer Price</label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" name="price">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="email" class="col-sm-2 control-label">Offer Details</label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" name="details">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-sm-12 col-sm-push-2">
                                  <input type="submit" id="submit" class="btn btn-defaulte" value="submit">
                              </div>
                          </div>
                        </div>

                      </div>
                  </form>

                </div>


            </div>
        </div>
    </body>
</html>
