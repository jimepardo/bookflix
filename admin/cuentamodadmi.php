<?php require_once "vistas/parte_superior.php" ?>
<h3><strong> &nbsp Cuenta</strong></h3>
<!--Inicio del contenido principal-->
<div class="container-fluid">
    <form class="needs-validation" action="modpassword.php" method="POST" novalidate>
        <div class="form-group col-5">
            <label for="pass">Modificar contraseña</label>
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Ingrese su antigua contraseña" value="<?php if(isset($_GET['PASSW'])){ echo $_GET['PASSW'];}?>" required>
            <div class="valid-feedback">Campo completado</div>
            <div class="invalid-feedback" id="feedback-pass">Debe ingresar la contraseña actual</div>
        </div>
        <div class="form-group col-5">
            <label for="pass1">Ingrese nueva contraseña</label>
            <input type="password" class="form-control" value="<?php if(isset($_GET['PASSW1'])){ echo $_GET['PASSW1'];}?>" id="pass1" name="pass1" placeholder="Ingrese su nueva contraseña" required>
            <div class="valid-feedback">Campo completado</div>
            <div class="invalid-feedback">Debe ingresar la nueva contraseña</div>
        </div>
        <div class="form-group col-5">
            <label for="pass2">Repita nueva contraseña</label>
            <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Repita su nueva contraseña"
            value="<?php if(isset($_GET['PASSW2'])){ echo $_GET['PASSW2'];}?>" required>
            <div class="valid-feedback">Campo completado</div>
            <div class="invalid-feedback">Repita la nueva contraseña</div>
        </div>
        <div class="form-group col-5">
            <input type="hidden" name="id" value="<?php echo $_SESSION['ID'] ?>">
            <?php if(isset($_GET['ERROR'])){?> 
            <div  class="alert alert-danger" role="alert">
                <?= $_GET['ERROR'] ?>
            </div>
        <?php } ?>
        </div> 
        <div class="form-group col-5">
            <input class="btn btn-danger" type="submit" value="Guardar cambios">
        </div>
    </form>
</div>


<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        var pass = document.getElementById("pass");
        var pass1 = document.getElementById("pass1");
        var pass2 = document.getElementById("pass2");
        var invalid = document.getElementById("feedback-pass");
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
              invalid.innerHTML= "";
              invalid.innerHTML= "Debe ingresar la contraseña actual";
            }else{
            var validity=( (pass.value) == (pass1.value));
            var validity2=( (pass.value) == (pass2.value));//hacen falta 2 validity porque no me los compara bien sino xd
                if (validity==validity2) {
                    pass.setCustomValidity("Las constraseñas son iguales");
                    invalid.innerHTML= "";
                    invalid.innerHTML= "Las 3 contraseñas tienen el mismo valor !";
                    if(form.checkValidity()===false){
                        event.preventDefault();
                        event.stopPropagation();
                    }
                }
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
</script>

<?php require_once "vistas/parte_inferior.php" ?>