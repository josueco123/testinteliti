<div class="container fadeInDown bg-secondary" style="--bs-bg-opacity: .15;">
    <div class="row justify-content-center">
        <div class="col-md-12">

        <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="margin-top: 15px;">
				
				<div class="card-body" >
					<h3 class="card-title text-center">Historia Médica</h3>
					<hr>
                    <p><strong>Nombre: </strong> <?=  $history->name ?></p>
                    <p><strong>Fecha de Nacimiento: </strong> <?=  $history->birthday ?> </p>
                    <p><strong>Sexo: </strong> <?=  $history->sex ?></p>
                    <p><strong>Estatura: </strong> <?=  $history->height ?></p>
                    <p><strong>Peso: </strong> <?=  $history->weight ?></p>
                    <?php if ($age < 18) {      ?>
                    <p><strong>Recomendación: </strong> Hola <?=  $history->name ?> eres  <?=  $history->sex == 'F' ? 'una ' : 'un ' ?> 
                     joven muy saludable, te recomiendo salir a jugar al aire libre durante <?=  $x ?>   horas diarias</p>
                     <?php }else { ?>
                     <p><strong>Recomendación: </strong> Hola <?=  $history->name ?> eres  una persona muy saludable, te recomiendo comer
                       <?=  $history->weight > 30?' menos ' : 'más' ?>  y salir  a correr <?=  $km ?> km diarios</p>
                     <?php } ?>
                </div>  

            </div>
    	</div>  
    </div>
</div>