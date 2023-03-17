<div class="wrapper fadeInDown">
  <div id="formContent">
    
    <div class="fadeIn first">
      <img src="https://www.coriaweb.hosting/wp-content/uploads/2016/11/dc5df_codeigniter.jpg" id="icon" alt="Code" />
    </div>
    
     <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
            
  
    <?php echo form_open('user/createUser'); ?>
      <input type="text" id="name" class="fadeIn second" name="name" placeholder="Nombre" required>
      <input type="text" id="email" class="fadeIn second" name="email" placeholder="Correo" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña" required>
      <input type="submit" class="fadeIn fourth" value="Registarse">
    </form>

  </div>
</div>
</body>
</html>