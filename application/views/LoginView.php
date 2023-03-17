
<div class="wrapper fadeInDown">
  <div id="formContent">
  
    <div class="fadeIn first">
      <img src="https://www.coriaweb.hosting/wp-content/uploads/2016/11/dc5df_codeigniter.jpg" id="icon" alt="Code" />
    </div>
    <?php if ($this->session->flashdata("error")) : ?>
            <div class="alert alert-danger">
              <p> <?php echo $this->session->flashdata("error"); ?> </p>
            </div>
          <?php endif; ?>

    <form action="<?php echo base_url(); ?>user/loginUser" method="post">
      <input type="text" id="email" class="fadeIn second" name="email" placeholder="Correo" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña" required>
      <input type="submit" class="fadeIn fourth" value="Ingresar">
    </form>

    <div id="formFooter">
      <a class="underlineHover" href="<?= base_url("user/register") ?>">Registrarse</a>
    </div>

  </div>
</div>
</body>
</html>
