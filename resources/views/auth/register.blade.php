<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <title>Registro</title>
</head>

<body>

    <div class="contenedor">

        <header>

            <div class="logo">
                <a href="{{ route('inicio') }}">LOGO</a>
            </div>

        </header>

        <main class="main_registro">

            <div class="img">
                <p><strong>Disfruta</strong> de millones de libros de todas las tematicas</p>
                <p><strong>Conviertete</strong> en socio y distruta de muchas ventajas</p>
            </div>

            <div class="palo"></div>

            <div class="registro">
                <h1>Crear Cuenta</h1>

                <form method="POST" action="{{ route('register') }}" class="form_registro">
                    @csrf
                    <div class="registro_nombre_apellidos">
                        <div class="form-group col-md-4">
                            <label for="nombre">Nombre</label>

                            <div class="col-md-12">
                                <input id="nombre" type="text"
                                    class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                    value="{{ old('nombre') }}" required autocomplete="nombre" autofocus
                                    placeholder="Indica tu nombre">

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="ape1">Primer apellido</label>

                            <div class="col-md-12">
                                <input id="ape1" type="text" class="form-control @error('ape1') is-invalid @enderror"
                                    name="ape1" value="{{ old('ape1') }}" required autocomplete="ape1" autofocus
                                    placeholder="Indica tu primer apellido">

                                @error('ape1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="ape2">Segundo apellido</label>

                            <div class="col-md-12">
                                <input id="ape2" type="text" class="form-control @error('ape2') is-invalid @enderror"
                                    name="ape2" value="{{ old('ape2') }}" autocomplete="ape2" autofocus
                                    placeholder="Indica tu segundo apellido">

                                @error('ape2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="registro_email_feNacimiento">
                        <div class="form-group col-md-9">
                            <label for="email">Correo electrónico</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Indica tu correo">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="fechaNac">Fecha de nacimiento</label>

                            <div class="col-md-12">
                                <input id="fechaNac" type="date"
                                    class="form-control @error('fechaNac') is-invalid @enderror" name="fechaNac"
                                    value="{{ old('fechaNac') }}" required autocomplete="fechaNac" autofocus>

                                @error('fechaNac')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="registro_contrasenia">
                        <div class="form-group col-md-6">
                            <label for="password">Contraseña</label>

                            <div class="col-md-12">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password" placeholder="Indica tu contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="password-confirm">Confirmar la contraseña</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password-confirm" required autocomplete="new-password"
                                    placeholder="Repite la contraseña">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn_registro registro_boton_crear_cuenta">Crear Cuenta</button>
                    <a href="{{ route('login') }}" class="btn btn_registro btn-danger">Cancelar</a>
                </form>
            </div>

        </main>

    </div>

</body>

</html>
