$(document).ready(function () {
    $('#modal_New_Person').submit(function (event) {
        var opcion = $('#op').val();
        let url;
        opcion === '1' ? url='http://localhost:8090/api/user/CrearEmpleado' : url='http://localhost:8090/api/user/actualizar';
      
        $.ajax({
            url: url,
            type: 'POST',
            data: JSON.stringify(
                    {
                        nom_empleado: $('#P_Nombre').val()
                        , apellido_paterno_empleado: $('#P_ApelP').val()
                        , apellido_materno_empleado: $('#P_ApelM').val()
                        , num_nomina_empleado: $('#P_NoNomi').val()
                        , pk_iud_empleado: $('#key').val()
                    }),
            processData: false,
            contentType: "application/json",
            success: function (r) {
                r.result === true ? (
                        toastr["success"]('Guardado', 'Turno'),
                        $('#tbl_Empleados').DataTable().ajax.reload(null, false)
                        ) :
                        Swal.fire({
                            icon: 'error',
                            title: 'Hubo un error ☹!',
                            text: JSON.stringify(r),
                            footer: 'Por favor tome captura de este mensaje y contacte a Desarrollo de sistemas'}
                        );
                $('#modal_New_Person').modal('hide');
            }
        });
        event.preventDefault();
    });
});

$.fn.dataTable.moment('DD/MM/YYYY');
$.fn.dataTable.moment('MM/YYYY');
$.fn.dataTable.moment('HH:mm MMM D, YY');
$.fn.dataTable.moment('dddd, MMMM Do, YYYY'); //
$.fn.dataTable.moment('Do [de] MMMM [del] YYYY h:mm:ss a');
$.fn.dataTable.moment('DD/MM/YYYY h:mm a');





/*Inisializacion del Datatable*/
$('#tbl_Empleados').DataTable({
    "processing": true, //Premiote procesar la info
    "ajax": {
        url: "http://localhost:8090/api/empleados", //Urls de peticion
        method: 'GET', //Envia variables por el metodod post
        data: function (G) {//pasando variables ala url
            //G.op = 2;//Entra en el menu dos de la url
            //G.TP = $('#filt_TpEmple_DataTable').val();// pasa un parametro para el filtro
        },
        dataSrc: ""
    },
    deferRender: true,
    responsive: false, //desactiva la tabla responsiva
    "autoWidth": false, //quita la propiedad de ajustar el ancho
    "destroy": true, // permite destruir el datatable
    "paging": true, // muestra el numero de pag
    scrollY: 400, // ancho del datable 
    scrollX: true, // activa el scroll
    scrollCollapse: false,
    "aaSorting": [], // Metodo que ordena la tabla
    "dom": 'Bfrtilp', // Apis que permiten extraer la info del datatable
    keys: true,
    fixedColumns: {// Fija la columna 1 y la ultima 
        left: [2],
        right: 1
    },
    search: {//Activa la tecla intro para realizar un busqueda
        return: true
    },
    "ordering": true, //Propieedad de ordenamiento
    "language": {//Json con la traduccion del Datable
        "url": "../assets/DataTables_traslate/General.json"
    },
    buttons: [// botones para exportar la info del datatable
        {extend: 'excelHtml5', footer: false,
            className: 'btn btn-success',
            titleAttr: 'Exportar a Excel',
            text: '<i class="fas fa-file-excel"></i>',
            title: 'Lista de Turnos',
            orientation: 'landscape', pageSize: 'LEGAL', exportOptions: {
                columns: ':visible'
            }, sheetName: 'Turnos', autoFilter: false},

        {extend: 'colvis', text: 'Ver', className: 'btn btn-warning',

        }
    ],
    "columns": [//Variables que recibe de la sql 

        {
            data: "pk_iud_empleado",
            "width": "1%", "className": 'text-center h6', // Personaliza la columna 0
            "render": function (data, type, row) {
                return (data);// funcionn que agrega ceros de js
            }
        },
        {
            data: "nom_empleado",
            "width": "1%", "className": 'text-center small', // Personaliza la columna 0
            "render": function (data, type, row) {
                return (data);// funcionn que agrega ceros de js
            }
        },
        {
            data: "apellido_paterno_empleado",
            "width": "1%", "className": 'text-center small', // Personaliza la columna 0
            "render": function (data, type, row) {
                return (data);// funcionn que agrega ceros de js
            }
        },
        {
            data: "apellido_materno_empleado",
            "width": "1%", "className": 'text-center small', // Personaliza la columna 0
            "render": function (data, type, row) {
                return (data);// funcionn que agrega ceros de js
            }
        },
        {
            data: "num_nomina_empleado",
            "width": "1%", "className": 'text-center small', // Personaliza la columna 0
            "render": function (data, type, row) {
                return (data);// funcionn que agrega ceros de js
            }
        },
        {
            "width": "1%",
            orderable: false,
            data: null,
            defaultContent: '<button type="button" id="eliminarEmpleado" class="btn btn-sm btn-outline-danger"  title="Eliminar empleado"><i class="far fa-trash-alt"></i></button>' +
                    '<button type="button" id="editarEmpleado" class="btn btn-sm btn-outline-teal"  title="Editar empleado"><i class="far fa-envelope"></i></button>',
        },
    ],
    "lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "All"]], // tamaño del selector de registros

});


$('#tbl_Empleados tbody').on('click', 'button#more', function () {
    var tr = $(this).closest('tr');
    var row = $('#tbl_Empleados').DataTable().row(tr);
    //var pos = row[0][0];
    //var data = $('#tbl_Empleados').DataTable().row($(this).parents('tr')).data();
    if (row.child.isShown()) {
        row.child.hide();
        tr.removeClass('text-success');
    } else {
        row.child(DetailRe(row.data())).show();
        tr.addClass('text-success');
    }
});

$('#tbl_Empleados tbody').on('click', 'button#eliminarEmpleado', function () {
    var tr = $(this).closest('tr');
    var info = $('#tbl_Empleados').DataTable().row(tr).data();
    var trDelete = $(this).parents('tr');

    var keyEliminar = info.pk_iud_empleado;

    Swal.fire({
        title: '¿Esta Segur@ de Eliminar él empleado?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Si',
        //denyButtonText: `Don't save`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: 'http://localhost:8090/api/user/Eliminar',
                //dataType: "json",
                processData: false,
                contentType: "application/json",
                data: JSON.stringify(
                        {
                            pk_iud_empleado: keyEliminar
                        }
                ),
                success: function (r) {
                    r.result === true ? (toastr["success"]('Eliminado', 'Empleado'),
                            $('#tbl_Empleados').DataTable().row(trDelete).remove().draw()) :
                            r.delete === false ? toastr["error"]('No Eliminado :(', 'Empleado') : '';

                }, error: function () {
                }
            });
        }
    });
});

$('#tbl_Empleados tbody').on('click', 'button#editarEmpleado', function () {
    var tr = $(this).closest('tr');
    var info = $('#tbl_Empleados').DataTable().row(tr).data();
    
    $('#titleEmpleado').text('Editar Empleado: ' + (info.nom_empleado));

    $('#P_Nombre').val(info.nom_empleado);
    $('#P_ApelP').val(info.apellido_paterno_empleado);
    $('#P_ApelM').val(info.apellido_materno_empleado);
    $('#P_NoNomi').val(info.num_nomina_empleado);
    $('#key').val(info.pk_iud_empleado);//hidden

    $('#op').val(5);
    $('#modal_New_Person').modal('show');
});

$("#modal_New_Person").on("hidden.bs.modal", function () {
    $("#frmNuevoEmple")[0].reset();
    $('#op').val(1);
    $('#titleEmpleado').text('Nuevo Empleado');
});


/*$.ajax({
 type: 'GET',
 url: 'http://localhost:8090/api/empleados',
 //data: 0,
 dataType: "json",
 success: function (r) {
 console.log(r);
 }, error: function (r) {
 console.error(r);
 }
 });*/


/*$.ajax({
 url: 'http://localhost:8090/api/user/Eliminar',
 type: 'POST',
 data: JSON.stringify(
 {
 pk_iud_empleado: '31'
 }
 ),
 processData: false,
 contentType: "application/json"
 })*/