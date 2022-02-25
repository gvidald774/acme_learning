$(function()
{

    var titulo;
    var descripcion;
    var f_ini_inscripcion;
    var f_ini_reclamacion;
    var f_ini_baja;
    var f_ini_curso;
    var f_fin_inscripcion;
    var f_fin_reclamacion;
    var f_fin_baja;
    var f_fin_curso;
    var categoria;
    var precio;
    var horas;
    var documentacion;
    var aula;
    var horario; // yo qué se
    var contenido;
    var objetivos;
    var requisitos;
    var imagen;

    $("input[id^=form_f]").val('');

        // CALENDARIO
        var divCalendario = document.getElementById("calendario1");
        var calendar = new FullCalendar.Calendar(divCalendario, {
            initialView: 'timeGridWeek',
            firstDay: 1,
            eventMinHeight: 30,
            allDaySlot: false,
            slotDuration: '00:30:00',
            slotMinTime: "08:00:00",
            slotMaxTime: "22:00:00",
            selectable: true,
            selectMirror: true,
            unselectAuto: true,
            selectOverlap: false,
            timeFormat: 'H(:mm)',
            select: function(info)
            {
                var eventoide = new Object();
                eventoide.start = info.startStr;
                eventoide.end = info.endStr;
                eventoide.allDay = false;
                eventoide.title = "Reserva";
                calendar.addEvent(eventoide);
            },
            eventClick: function(info)
            {
                info.event.remove();
            },
            editable:true
        });
        calendar.render();
    
        // los trozos de calendario no se pondrán en gris, serán eventos propios "ajenos" para que funcione selectOverlap

    // Controles de agrupación
    /*$("#add_group").on("click",function()
    {
        var nuevoGrupo = $("<li></li>").append("<input type='color'>").append("<input type='text'>").append("<input type='radio' name='grupos'>");
        $(nuevoGrupo).children(1).on("keypress",input_to_text);

        $(nuevoGrupo).insertBefore(this);

        function input_to_text(event)
        {
            if(event.key == "Enter")
            {
                if($(this).val() != "")
                {
                    var valor = $(this).val();
                    $(this).replaceWith(valor);
                    
                    $(this).on("dblclick",text_to_input);

                    // Sería más sencillo añadir un botoncico que me lo active...
                }
            }
        }

        function text_to_input(event)
        {
            var valor = $(this).text();
            $(this).replaceWith("<input type='text' value='"+valor+"' />")
            $(this).on("keypress",input_to_text);
        }
    })*/

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
        if(validaPaginaUno())
        {
            ev.preventDefault();
            muestraPagina(2);
            calendar.render();
        }
        else
        {
            ev.preventDefault();
        }
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
        if(validaPaginaUno())
        {
            ev.preventDefault();
            muestraPagina(2);
            $("#pagination2").activar();
            calendar.render();
        }
        else
        {
            ev.preventDefault();
        }
    })

    $("button#a_pag3").on("click",function(ev) {
        ev.preventDefault();
        muestraPagina(3);
        $("#pagination3").activar();
    })

    function validaPaginaUno()
    {
        var errores = 0;
        if (!$("#form_titulo").val())
        {
            console.log("No hay título");
            errores++;
            console.log("Errores: "+errores);
        }
        else
        {
            titulo = $("#form_titulo").val();
            console.log("Título: "+titulo);
        }

        if (!$("#form_f_ini_inscripcion").val())
        {
            console.log("No hay f_ini_inscripcion");
            errores++;
            console.log("Errores: "+errores);
        }
        else
        {
            f_ini_inscripcion = $("#form_f_ini_inscripcion").val();
            console.log("F_ini_inscripcion: "+f_ini_inscripcion);
        }

        if (!$("#form_f_fin_inscripcion").val())
        {
            console.log("No hay f_fin_inscripcion");
            errores++;
            console.log("Errores: "+errores);
        }
        else
        {
            f_fin_inscripcion = $("#form_f_fin_inscripcion").val();
            console.log("F_fin_inscripcion: "+f_fin_inscripcion);
        }

        if (!$("#form_f_ini_reclamacion").val())
        {
            console.log("No hay f_ini_reclamacion");
            errores++;
            console.log("Errores: "+errores);
        }
        else
        {
            f_ini_reclamacion = $("#form_f_ini_reclamacion").val();
            console.log("F_ini_reclamacion: "+f_ini_reclamacion);
        }

        if (!$("#form_f_fin_reclamacion").val())
        {
            console.log("No hay f_fin_reclamacion");
            errores++;
            console.log("Errores: "+errores);
        }
        else
        {
            f_fin_reclamacion = $("#form_f_fin_reclamacion").val();
            console.log("F_fin_reclamacion: "+f_fin_reclamacion);
        }

        if (!$("#form_f_ini_baja").val())
        {
            console.log("No hay f_ini_baja");
            errores++;
            console.log("Errores: "+errores);
        }
        else
        {
            f_ini_baja = $("#form_f_ini_baja").val();
            console.log("F_ini_baja: "+f_ini_baja);
        }

        if (!$("#form_f_fin_baja").val())
        {
            console.log("No hay f_fin_baja");
            errores++;
            console.log("Errores: "+errores);
        }
        else
        {
            f_fin_baja = $("#form_f_fin_baja").val();
            console.log("F_fin_baja: "+f_fin_baja);
        }

        if (!$("#form_f_ini_curso").val())
        {
            console.log("No hay f_ini_curso");
            errores++;
            console.log("Errores: "+errores);
        }
        else
        {
            f_ini_curso = $("#form_f_ini_curso").val();
            console.log("F_ini_curso: "+f_ini_curso);
        }

        if (!$("#form_f_fin_curso").val())
        {
            console.log("No hay f_fin_curso");
            errores++;
            console.log("Errores: "+errores);
        }
        else
        {
            f_fin_curso = $("#form_f_fin_curso").val();
            console.log("F_fin_curso: "+f_fin_curso);
        }

        if (!$("#form_categoria").val())
        {
            console.log("No hay categoría");
            errores++;
            console.log("Errores: "+errores);
        }
        else
        {
            categoria = $("#form_categoria").val();
            console.log("Categoria: "+categoria);
        }

        if (!$("#form_precio").val())
        {
            console.log("No hay precio");
            errores++;
            console.log("Errores: "+errores);
        }
        else
        {
            precio = $("#form_precio").val();
            console.log("Precio: "+precio);
        }

        if (!$("#form_horas").val())
        {
            console.log("No hay horas");
            errores++;
            console.log("Errores: "+errores);
        }
        else
        {
            horas = $("#form_horas").val();
            console.log("Horas: "+horas);
        }

        if(errores>0)
        {
            alert("Faltan datos");
            return false;
        }
        else{
            documentos = $("#form_documentos").val();
            return true;
        }
    }

    // Hay que averiguarse la página 2 también o algo

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
    }

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
    $("#form_f_ini_curso").datetimepicker({ // Cambiar la duración? No, cambiar los tramos
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

    // Controles de generar reserva... quitar?

    /*
    $(".add-reserva").on("click",function()
    {
        $("<p>Normalmente aquí aparecería una segunda reserva, pero debido a la falta de tiempo no será posible. Sí he averiguado que se haría con clone(), pero las implicaciones en el backend y en el acceso a la base de datos son tan gargantuescas que no he visto la posibilidad de implementarlas a tiempo.</p>").appendTo("#pagina2");
    });
    */

})