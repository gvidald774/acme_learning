$(function()
{
    $("input[id^=form_f]").val('');

        // CALENDARIO
        var divCalendario = document.getElementById("calendario1");
        var calendar = new FullCalendar.Calendar(divCalendario, {
            initialView: 'timeGridWeek',
            eventMinHeight: 30,
            allDaySlot: false,
            slotDuration: '00:30:00',
            slotMinTime: "08:00:00",
            slotMaxTime: "22:00:00",
            selectable: true,
            selectMirror: true,
            unselectAuto: false,
            selectOverlap: false,
            select: function(info)
            {
                alert("Se ha seleccionado "+info.startStr + ' a ' + info.endStr);
            }
        });
        calendar.render();
    
        // los trozos de calendario no se pondrán en gris, serán eventos propios "ajenos" para que funcione selectOverlap
    

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
        calendar.render();
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
        calendar.render();
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

    /*    from = $("input[id^=form_f_ini]")
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
    */

    // GESTIÓN DE FECHAS

    $("#form_f_ini_inscripcion").datetimepicker({
        lang: 'es',
        dayOfWeekStart: 1,
        startDate: '+7',
        format:'Y-m-d H:i',
        minDate:0,
        onShow:function(ct)
        {
            this.setOptions({
                maxDate:$("#form_f_fin_inscripcion").val()?$("#form_f_fin_inscripcion").val():false
            })
        }
    });
    $("#form_f_fin_inscripcion").datetimepicker({
        lang: 'es',
        dayOfWeekStart: 1,
        startDate: '+7',
        format:'Y-m-d H:i',
        minDate:0,
        onShow:function(ct)
        {
            this.setOptions({
                minDate:$("#form_f_ini_inscripcion").val()?$("#form_f_ini_inscripcion").val():false,
                maxDate:$("#form_f_ini_reclamacion").val()?$("#form_f_ini_reclamacion").val():false
            })
        }
    });
    $("#form_f_ini_reclamacion").datetimepicker({
        lang: 'es',
        dayOfWeekStart: 1,
        startDate: '+7',
        format:'Y-m-d H:i',
        minDate:0,
        onShow:function(ct)
        {
            this.setOptions({
                minDate:$("#form_f_fin_inscripcion").val()?$("#form_f_fin_inscripcion").val():false,
                maxDate:$("#form_f_fin_reclamacion").val()?$("#form_f_fin_reclamacion").val():false
            })
        }
    });
    $("#form_f_fin_reclamacion").datetimepicker({
        lang: 'es',
        dayOfWeekStart: 1,
        startDate: '+7',
        format:'Y-m-d H:i',
        minDate:0,
        onShow:function(ct)
        {
            this.setOptions({
                minDate:$("#form_f_ini_reclamacion").val()?$("#form_f_ini_reclamacion").val():false,
                maxDate:$("#form_f_ini_curso").val()?$("#form_f_ini_curso").val():false
            })
        }
    });
    $("#form_f_ini_baja").datetimepicker({
        lang: 'es',
        dayOfWeekStart: 1,
        startDate: '+7',
        format:'Y-m-d H:i',
        minDate:0,
        onShow:function(ct)
        {
            this.setOptions({
                minDate:$("#form_f_fin_inscripcion").val()?$("#form_f_fin_inscripcion").val():false,
                maxDate:$("#form_f_fin_baja").val()?$("#form_f_fin_baja").val():false
            })
        }
    });
    $("#form_f_fin_baja").datetimepicker({
        lang: 'es',
        dayOfWeekStart: 1,
        startDate: '+7',
        format:'Y-m-d H:i',
        minDate:0,
        onShow:function(ct)
        {
            this.setOptions({
                minDate:$("#form_f_ini_baja").val()?$("#form_f_ini_baja").val():false,
                maxDate:$("#form_f_fin_curso").val()?$("#form_f_fin_curso").val():false
            })
        }
    });
    $("#form_f_ini_curso").datetimepicker({
        lang: 'es',
        dayOfWeekStart: 1,
        startDate: '+7',
        format:'Y-m-d H:i',
        allowTimes:[
            '08:00','08:30','09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30',
            '13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30',
            '18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30'
        ],
        minDate:0,
        onShow:function(ct)
        {
            this.setOptions({
                minDate:$("#form_f_fin_reclamacion").val()?$("#form_f_fin_reclamacion").val():false,
                maxDate:$("#form_f_fin_curso").val()?$("#form_f_fin_curso").val():false
            })
        }
    });
    $("#form_f_fin_curso").datetimepicker({
        lang: 'es',
        dayOfWeekStart: 1,
        startDate: '+7',
        format:'Y-m-d H:i',
        allowTimes:[
            '08:30','09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30',
            '13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30',
            '18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00'
        ],
        minDate:0,
        onShow:function(ct)
        {
            this.setOptions({
                minDate:$("#form_f_ini_curso").val()?$("#form_f_ini_baja").val():false
            })
        }
    });


    function validaFechas()
    {
        var todoCorrecto = true;
        console.log($("#form_f_ini_inscripcion").datetimepicker('getValue'));

        return todoCorrecto;
    }

})