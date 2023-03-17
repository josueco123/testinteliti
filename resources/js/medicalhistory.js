$(document).ready(function () {

  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-primary',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })

    $("body").on("click", ".evt-add-pacient", function () {  
    
        const urlResponse = window.location.href + "/createHistory"         
        $(location).attr("href", urlResponse);
    
      });

    const table = $('#histories').DataTable({
      searching: true,
      pageLength: 5,
      bLengthChange: false,
      ajax: {
        "url": "medicalhistory/getHistories",
        "dataSrc": ""
        },
        "columns":[          
          { data: "name"},
          { data: "birthday"},
          { data: "sex"},
          { data: "height"},
          { data: "weight"},
          { "defaultContent": true,render: function ( data, type, row ) {
            return "<button type='button' class='btn btn-primary btn-sm evt-show'>Ver</button> "+
            "<button type='button' class='btn btn-danger btn-sm evt-delete'>Eliminar</button></td>"
           
          }
        }
      ]
    });

    $("body").on("click", ".evt-delete", function () {  
      
      const data = table.row( $(this).parents('tr') ).data();

      const urlDelete = window.location.href + "/deleteHistory/" + data["history_id"];
      
      swalWithBootstrapButtons.fire({
        title: "Eliminar Historia Médica",
        text: "¿Esta seguro que deseas eliminar esta Historia Médica?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        cancelButtonText: "Cancelar"
      }).then(function (result) {
        if (result.value) {
         
          $.ajax({
            url: urlDelete,
            dataType: "json",
            type: "post",
            contentType: false,
            processData: false,
            cache: false,
            async: false,
          })
            .done(function (resp) {
              if (resp.status_code == 200) {
               table.ajax.url(window.location.href +'/getHistories').load();
               swalWithBootstrapButtons.fire(
                 '!Éxito!',
                 resp.mensaje,
                 'success'
               );                
                
              } else {
                swalWithBootstrapButtons.fire(
                  'Error',
                  resp.mensaje,
                  'error'
                );
              }
            })
            .fail(function () {
              swalWithBootstrapButtons.fire(
                'Error',
                'Ups, sucedió un error, por favor intenta más tarde o contacta al administrador',
                'error'
              );
            });
        }
      });
    });

    $("body").on("click", ".evt-show", function () {  

      const data = table.row( $(this).parents('tr') ).data();

      const urlResponse = window.location.href + "/showMedicalHistory/" + data["history_id"];        
      $(location).attr("href", urlResponse);
  
    });
})