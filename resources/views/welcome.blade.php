<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

        <title>CREACIÓN DE CUSTOM POST</title>


    </head>
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1" style="margin-top: 150px">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ asset('images/enviar.png') }}" class="card-img" alt="enviar formulario" style="margin-top: 30%">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                <h5 class="card-title">CREACIÓN DE CUSTOM POST</h5>
                                <p class="card-text">
                                    {!! Form::open(['route' => 'UploadForm']) !!}
                                        @include('form.eraser')
                                    {!! Form::close() !!}

                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    @if(session('info'))
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        {{ session('info') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                </p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>



