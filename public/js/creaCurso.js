$(function()
{

    // Controles de paginación

    var paginaDosMostradaPorPrimeraVez = false;
    
    $.fn.activar = function()
    {
        this.addClass("activado");
        return this;
    }

    muestraPagina(1);
    $("#pagination1").activar();

    $("#pagination1").on("click", function(ev)
    {
        ev.preventDefault();
        muestraPagina(1);
    })
    $("#pagination2").on("click", function(ev)
    {
        ev.preventDefault();
        muestraPagina(2);
    })
    $("#pagination3").on("click", function(ev)
    {
        ev.preventDefault();
        muestraPagina(3);

    })

    $('area').on("click",function(ev) {
        ev.preventDefault();
    })

    
    $("button#a_pag2").on("click",function(ev) {
        ev.preventDefault();
        muestraPagina(2);
        $("#pagination2").activar();
    })

    $("button#a_pag3").on("click",function(ev) {
        ev.preventDefault();
        muestraPagina(3);
        $("#pagination3").activar();
    })

    function muestraPagina(id)
    {
        $("div[id^=pagina]").hide();
        $("#pagina"+id).show();
        $("#pagination"+id).activar();
        if(id==2)
        {
            if(paginaDosMostradaPorPrimeraVez == false)
            {
                $('img[usemap]').rwdImageMaps();
                paginaDosMostradaPorPrimeraVez = true;
            }
        }
        validaFechas();
    }

    // Ah y que no te deje pasar la página hasta que los valores estén correctos
    // (fechas en su sitio, todo escrito, etcétera)

    var dateFormat = "yyyy/mm/dd",
        from = $("input[id^=form_f_ini]")
            .datepicker({
                minDate: 0,
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1
            })
            .on("change",function() {
                to.datepicker("option","minDate",getDate(this));
            }),
        to = $("input[id^=form_f_fin]").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        })
        .on("change", function() {
            from.datepicker("option","maxDate",getDate(this));
        })

        form_f_ini_inscripcion = $("#form_f_ini_inscripcion")
            .datepicker({
                minDate: 0,
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1
            })
            .on("change",function() {
                form_f_fin_inscripcion.datepicker("option","minDate",getDate(this));
            })
        form_f_fin_inscripcion = $("#form_f_fin_inscripcion")
        .datepicker({
            minDate: 0,
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        })
        .on("change",function() {
            form_f_ini_inscripcion.datepicker("option","maxDate",getDate(this));
            form_f_ini_reclamacion.datepicker("option","minDate",getDate(this));
            form_f_ini_baja.datepicker("option","minDate",getDate(this));
        })
        form_f_ini_reclamacion = $("#form_f_ini_reclamacion")
        .datepicker({
            minDate: 0,
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        })
        .on("change",function() {
            form_f_fin_reclamacion.datepicker("option","minDate",getDate(this));
        })
        form_f_fin_reclamacion = $("#form_f_fin_reclamacion")
        .datepicker({
            minDate: 0,
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        })
        .on("change",function() {
            form_f_ini_reclamacion.datepicker("option","maxDate",getDate(this));
            form_f_ini_curso.datepicker("option","minDate",getDate(this));
        })
        form_f_ini_baja = $("#form_f_ini_baja")
        .datepicker({
            minDate: 0,
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        })
        .on("change",function() {
            form_f_fin_baja.datepicker("option","minDate",getDate(this));
            form_f_ini_curso.datepicker("option","minDate",getDate(this));
        })
        form_f_fin_baja = $("#form_f_fin_baja")
        .datepicker({
            minDate: 0,
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        })
        .on("change",function() {
            form_f_ini_baja.datepicker("option","maxDate",getDate(this));
        })
        form_f_ini_curso = $("#form_f_ini_curso")
        .datepicker({
            minDate: 0,
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        })
        .on("change",function() {
            form_f_fin_curso.datepicker("option","minDate",getDate(this));
        })
        form_f_fin_curso = $("#form_f_fin_curso")
        .datepicker({
            minDate: 0,
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        })
        .on("change",function() {
            form_f_ini_curso.datepicker("option","minDate",getDate(this));
            form_f_fin_baja.datepicker("option","maxDate",getDate(this));
        })

    function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error)
        {
            date = null;
        }
        return date;
    }

    function validaFechas()
    {
        var todoCorrecto = true;
        console.log(getDate(form_f_ini_inscripcion));

        return todoCorrecto;
    }

})