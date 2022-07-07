<div class="registro">
<section class="m-2" >
  <div class="container h-100 p-0">
    <div class="row d-flex justify-content-center align-items-center h-75 " style="padding:0 !important; margin:0 !important;">
      <div class="col-lg-12 col-xl-11 p-0">
        <div class="card text-black" style="border-radius: 25px; box-shadow: 5px 2px 2px 1px rgba(0, 0, 0, 0.6);">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registro</p>

                <form action="" method="post" class="mx-1 mx-md-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="nombre">Tu nombre</label>
                      <input required type="text" id="nombre" name="nombre" class="form-control" placeholder="nombre" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-signature fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="apellido">Tu apellido</label>
                      <input trequired ype="text" id="apellido" name="apellido" class="form-control" placeholder="apellido" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="email">Tu email</label>
                      <input required placeholder="email" type="email" id="email" name="email"  class="form-control" />
                      <span id="errorEmail" class="bg-warning text-primary" style="font-size:0.5em"></span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-mobile-alt fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="telefono">Tu celular</label>
                      <input type="phone" id="telefono" name="telefono"  placeholder="celular" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label style="display:block;"  class="form-label" for="password">Contraseña</label>
                      <input required type="password" id="password" name="password" class="form-control" />
                      <span id="complejidad" class="bg-warning text-primary" style="font-size:0.4em"></span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label style="display:block;" class="form-label" for="confirm_password">Repetir contraseña</label>
                      <input required type="password" id="confirm_password" name="confirm_password" class="form-control" />
                      <span id="errorPassword" class="bg-warning text-primary" style="font-size:0.4em"></span>
                    </div>
                  </div>

                  <!-- <div class="form-check d-flex justify-content-center mb-5">
                    <input
                      class="form-check-input me-2"
                      type="checkbox"
                      value=""
                      id="form2Example3c"
                    />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div> -->

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button name="" id="submit" class="btn" type="submit" class="btn btn-primary btn-lg">Registrar</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img  style="border-radius: 25px;"src="/statics/img/peoplereading.jpg" class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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