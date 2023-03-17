<div class="container bg-secondary" style="--bs-bg-opacity: .15;">
    <div class="row justify-content-center">
        <div class="col-md-12">

			<div class="card  shadow-lg p-3 mb-5 bg-body rounded" style="margin-top: 15px;">
				
				<div class="card-body">
					<h3 class="card-title text-center">Listado de Historias Médicas</h3>
          <button type="button" class="btn btn-primary btn-sm float-right evt-add-pacient">Agregar Historia Médica</button>
					<hr>
          <?php if ($this->session->flashdata("success")) : ?>
            <div class="alert alert-success">
              <p> <?php echo $this->session->flashdata("success"); ?> </p>
            </div>
          <?php endif; ?>

          <?php if ($this->session->flashdata("error")) : ?>
            <div class="alert alert-danger">
              <p> <?php echo $this->session->flashdata("error"); ?> </p>
            </div>
          <?php endif; ?>

					<div class="table-responsive">
          <table class="table"  id="histories">
            <thead class="table-dark">
            <tr>
              <th>Nombre</th>
              <th>Fecha de Nacimiento</th> 
              <th>Sexo</th>     
              <th>Estatura (cm)</th>              
              <th>Peso</th>
              <th>Acciones</th>
            </tr>
            </thead>
           
          </table>
				  </div>
				
			</div>
		
		</div>  
    </div>
</div>