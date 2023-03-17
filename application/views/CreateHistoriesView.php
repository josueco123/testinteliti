<div class="container fadeInDown bg-secondary" style="--bs-bg-opacity: .15;">
    <div class="row justify-content-center">
        <div class="col-md-12">

			<div class="card shadow-lg p-3 mb-5 bg-body rounded" style="margin-top: 15px;">
				
				<div class="card-body" >
					<h3 class="card-title text-center">Agregar Historia Medica</h3>
					<hr>
					<form class="row g-3" id="form-pacient" name="form-pacient" method="post" action="<?php echo base_url(); ?>MedicalHistory/saveHistory">
                        <div class="col-md-6">
                            <label for="name">Nombre del Paciente</label>
                            <input type="text" class="form-control" id="name" name="name" required >                        
                        </div>
                        <div class="col-md-6">
                            <label for="sex">Sexo</label>
                            <select class="form-select" aria-label=".form-select-lg example" id="sex" name="sex">
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>                           
                        </div>
                        <div class="col-md-6">
                            <label for="date">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="date" name="date" max="<?= date("Y-m-d") ?>" required>                        
                        </div>
                        <div class="col-md-3">
                            <label for="height">Estatura</label>
                            <input type="number" class="form-control" id="height" name="height"  required>                        
                        </div>
                        <div class="col-md-3">
                            <label for="weight">Peso</label>
                            <input type="number" class="form-control" id="weight" name="weight" step="0.01"  required>                        
                        </div>                        
                       

                        <div class="col-12">
                            <button class="btn btn-primary " type="submit" data-url-save="<?= base_url("medicalHistory/saveHistory"); ?>" data-url-redirect="<?= base_url("medicalHistory"); ?>">Guardar</button>
                        </div>
                    </form>
				</div>
				
			</div>
		
		</div>  
    </div>
</div>