<div class="usuarios">

<div class="card col-12 col-lg-6 m-5">
<div class="card">
    <div class="card-header">
        Agregar Usuario
    </div>
    <div class="card-body">
        <form action="" method="post">

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input required type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre del usuario">
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input required type="text" class="form-control" name="apellido" id="apellido" aria-describedby="helpId" placeholder="Apellido del usuario">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input required type="email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Email">
            </div>

            <span id="errorEmail" class="text-warning"></span>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input required type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Password">
            </div>
            <span id="complejidad" class="text-warning"></span>


            <div class="mb-3">
                <label for="confirm_password" class="form-label">Repetir Password:</label>
                <input required type="password" class="form-control" name="confirm_password" id="confirm_password" aria-describedby="helpId" placeholder="Repetir Password">
            </div>

            <span id="errorPassword" class="text-warning"></span>


            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="text" class="form-control" name="telefono" id="telefono" aria-describedby="helpId" placeholder="Telefono">
            </div>
            
            <div class="mb-3">
                <label for="rol" class="form-label">Rol:</label>
                <select name="rol" id="rol" class="form-control">
                    <option value="">Seleccione un rol</option>
                    <option value="1">Administrador</option>
                    <option value="2">Comprador-Vendedor</option>
            </select>
            </div>



            <input name="" id="submit" class="btn btn-success" type="submit" value="Agregar usuario">
        </form>
    </div>
</div>

</div>
</div>
<script>
    // validate the password fields and if they are the same do the submit

        // validity complexity of the password
        var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
        var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");

        $('#password').on('keyup', function () {
            if (strongRegex.test($('#password').val())) {
                $('#password').css('background-color', '#0f0');
                $('#complejidad').text('');
            } else if (mediumRegex.test($('#password').val())) {
                $('#submit').attr('disabled', true);
                $('#password').css('background-color', '#ff0');
                $('#complejidad').text('La contraseña debe tener al menos 6 caracteres, una mayúscula, una minúscula y un caracter especial');
            } else {
                $('#submit').attr('disabled', true);
                $('#password').css('background-color', '#f00');
                $('#complejidad').text('La contraseña debe tener al menos 6 caracteres, una mayúscula, una minúscula y un caracter especial');
            }
        });
        
        // validar que las contrase;as sean iguales
        $('#confirm_password').on('change',function () {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#confirm_password').css('background-color', '#0f0');
                $('#errorPassword').text('');
            } else {
                $('#submit').attr('disabled', true);
                $('#confirm_password').css('background-color', '#f00');
                $('#errorPassword').text('Las contraseñas no coinciden');
            }
        });
        
        // show button password
        $('#password').on('keyup', function () {
            if ($('#password').val() != '') {
                $('#show_password').show();
            } else {
                $('#show_password').hide();
            }
        });



        // validate email regex and disable submit button if not valid
        function validateEmail() {
            var email = document.getElementById("email");
            var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if(!regex.test(email.value)) {
                document.getElementById("submit").disabled = true;
                document.getElementById("errorEmail").innerHTML = "El mail ingresado no es valido";
            } else {
                document.getElementById("submit").disabled = false;
                document.getElementById("errorEmail").innerHTML = "";

            }
        }

        email.onchange = validateEmail;
        email.onkeyup = validateEmail;
</script>