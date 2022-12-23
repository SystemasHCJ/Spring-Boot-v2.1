$.ajax({
    type: 'POST',
    url: '../../back/views/domCapturaV.php',
    data: {op: 1},
    dataType: "json",
    success: function (r) {
        $('#P_slctgenero').empty();
        $.each(r, function (key, r) {
            $('#P_slctgenero').append('<option value=' + r.pk_idu_genero + '>' + r.des_genero + '</option>');
        });
        $('#P_slctgenero').change();
    }, error: function (r) {
        console.error(r);
    }
});


$.ajax({
    type: 'POST',
    url: '../../back/views/domCapturaV.php',
    data: {op: 2},
    dataType: "json",
    success: function (r) {
        $('#P_slctNacio').empty();
        $.each(r, function (key, r) {
            $('#P_slctNacio').append('<option value=' + r.pk_idu_nacionalidad + '>' + r.nacionalidad + '</option>');
        });
        $('#P_slctNacio').change();
    }, error: function (r) {
        console.error(r);
    }
});


$.ajax({
    type: 'POST',
    url: '../../back/views/domCapturaV.php',
    data: {op: 3},
    dataType: "json",
    success: function (r) {
        $('#P_slctSangre').empty();
        $.each(r, function (key, r) {
            $('#P_slctSangre').append('<option value=' + r.key + '>' + r.des_tipo + '</option>');
        });
        $('#P_slctSangre').change();
    }, error: function (r) {
        console.error(r);
    }
});


$.ajax({
    type: 'POST',
    url: '../../back/views/domCapturaV.php',
    data: {op: 4},
    dataType: "json",
    success: function (r) {
        $('#P_slctNV_estudio').empty();
        $.each(r, function (key, r) {
            $('#P_slctNV_estudio').append('<option value=' + r.key + '>' + r.des_nivelacademico + '</option>');
        });
        $('#P_slctNV_estudio').change();
    }, error: function (r) {
        console.error(r);
    }
});


$.ajax({
    type: 'POST',
    url: '../../back/views/domCapturaV.php',
    data: {op: 5},
    dataType: "json",
    success: function (r) {
        $('#P_slctPais').empty();
        $('#P_slctPais').append('<option selected disabled value="">Seleccione un pais ...</option>');
        $.each(r, function (key, r) {
            $('#P_slctPais').append('<option value=' + r.key + '>' + r.nom_pais + '</option>');
        });
        //$('#P_slctPais').change();
    }, error: function (r) {
        console.error(r);
    }
});

$('#P_slctFedera').append('<option selected disabled value="">Seleccione su identidad federativa ...</option>');
$("#P_slctPais").change(function () {
    var key = this.value;
    $.ajax({
        type: 'POST',
        url: '../../back/views/domCapturaV.php',
        data: {op: 6, id: key},
        dataType: "json",
        success: function (r) {
            $('#P_slctFedera').empty();
            $('#P_slctFedera').append('<option selected disabled value="">Seleccione su identidad federativa ...</option>');
            $.each(r, function (key, r) {
                $('#P_slctFedera').append('<option value=' + r.key + '>' + r.nom_entidadfederativa + '</option>');
            });
            $('#P_slctFedera').change();
        }, error: function (r) {
            console.error(r);
        }
    });
});

$('#P_slctMuni').append('<option selected disabled value="">Seleccione su municipio...</option>');
$("#P_slctFedera").change(function () {
    var key = this.value;
    if (key !== '') {
        $.ajax({
            type: 'POST',
            url: '../../back/views/domCapturaV.php',
            data: {op: 7, id: key},
            dataType: "json",
            success: function (r) {
                $('#P_slctMuni').empty();
                $('#P_slctMuni').append('<option selected disabled value="">Seleccione su municipio...</option>');
                $.each(r, function (key, r) {
                    $('#P_slctMuni').append('<option value=' + r.key + '>' + r.nom_munucipio + '</option>');
                });
                //$('#P_slctFedera').change();
            }, error: function (r) {
                console.error(r);
            }
        });
    }
});

$('#P_slctColonia').append('<option selected disabled value="">Selecciona la colonia...</option>');
$("#P_slctMuni").change(function () {
    var key = this.value;
    $.ajax({
        type: 'POST',
        url: '../../back/views/domCapturaV.php',
        data: {op: 8, id: key},
        dataType: "json",
        success: function (r) {
            $('#P_slctColonia').empty();
            $('#P_slctColonia').append('<option selected disabled value="">Selecciona la colonia...</option>');
            $.each(r, function (keys, r) {
                $('#P_slctColonia').append('<option value=' + r.key + '>' + r.nom__colonia + '</option>');
            });
            //$('#P_slctFedera').change();
        }, error: function (r) {
            console.error(r);
        }
    });
});




$.ajax({
    type: 'POST',
    url: '../../back/views/domCapturaV.php',
    data: {op: 9},
    dataType: "json",
    success: function (r) {
        $('#P_slctCentro').empty();
        $('#P_slctCentro').append('<option selected disabled value="">Selecciona el centro de trabajo...</option>');
        $.each(r, function (key, r) {
            $('#P_slctCentro').append('<option value=' + r.key + '>' + r.nom_completo + '</option>');
        });
        //$('#P_slctPais').change();
    }, error: function (r) {
        console.error(r);
    }
});


$.ajax({
    type: 'POST',
    url: '../../back/views/domCapturaV.php',
    data: {op: 10},
    dataType: "json",
    success: function (r) {
        $('#P_slctPuesto').empty();
        $('#P_slctPuesto').append('<option selected disabled value="">Selecciona el puesto...</option>');
        $.each(r, function (key, r) {
            $('#P_slctPuesto').append('<option value=' + r.key + '>' + r.des_puesto + '</option>');
        });
        //$('#P_slctPais').change();
    }, error: function (r) {
        console.error(r);
    }
});


(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
})()


$('#P_slctgenero, #P_slctPais, #P_slctFedera, #P_slctMuni, #P_slctColonia').select2({theme: 'bootstrap-5', dropdownParent: $('#frmNuevoEmple'), language: {
        noResults: function () {
            return "No hay resultado";
        },
        searching: function () {
            return "Buscando..";
        }
    }});