$(function()
{

    const route = Routing.generate('trae_cursos');
    
    $("#loadingDiv")
        .ajaxStart(function()
        {
            $(this).show();
        })
        .ajaxStop(function()
        {
            $(this).hide();
        })

    // Pasar parámetros y tal
    $.ajax({
        url: route,
        context: $("#cursos")
    }).done(function(info)
    {
        var arreglillo = JSON.parse(info)
        console.log(arreglillo);
        var divCompleto = document.createElement("div");
        divCompleto.classList.add("container");
        divCompleto.classList.add("overflow-hidden");
        var divPequenio = document.createElement("div");
        divPequenio.classList.add("row");
        divPequenio.classList.add("g-5");
        divCompleto.append(divPequenio);
        $.each(arreglillo, function(i, obj)
        {
            var element = document.createElement("div");
            element.classList.add("col-12");
            element.classList.add("col-lg-6");
            element.classList.add("col-xxl-4");
            if(obj.descripcion.length > 50)
            {
                var texto = obj.descripcion.substr(0,50)+"...</div>";
            }
            else
            {
                var texto = obj.descripcion;
            }
            element.innerHTML = "   <a href='/cursos/d/"+obj.id+"'><div class='curso p-5 overflow-hidden bg-ruby' data-categoria="+obj.categoria+">"
                              + "   <div style='overflow: hidden;'><img src='/assets/images/cursos/"+obj.imagen+"' class='img-responsive mx-auto my-auto' alt='Imagen de "+obj.titulo+"'></div>"
                              + "   <h5>"+obj.titulo+"</h5>"
                              + "   <p class='overflow-hidden'>"+texto+"</p>"
                              + "   <div><strong>"+(obj.precio/100)+" € - "+obj.plazas+" plazas</strong></div>"
                              + "</div></a>";
            divPequenio.append(element);
        });
        $(this).html(divCompleto);
    })

    const filtro = document.getElementById("filtro");
    filtro.onkeyup = function()
    {
        // Placeholder porque los filtros no juegan bien entre sí, vaciar el otro
        $("input:checkbox").removeAttr('checked');
        const divs = $("div.curso");
        console.log(divs);
        for(let i = 0; i < divs.length; i++)
        {
            if(divs[i].innerText.indexOf(filtro.value)<0)
            {
                divs[i].classList.add("ocultar");
            }
            else
            {
                divs[i].classList.remove("ocultar");
            }
        }
    }

    $("#categorias").children().on("change",function()
    {
        // Placeholder porque los filtros no juegan bien entre sí, vaciar el otro
        document.getElementById("filtro").value = "";
        var selected = [];
        $("#categorias input:checked").each(function()
        {
            selected.push($(this).attr("value"));
        });
        console.log("Se ven ahora las categorías marcadas... cuales? Ah!"+selected);
        console.log(selected);

        const divs = $("div.curso");
        for(let i = 0; i < divs.length; i++)
        {
            if(selected.includes(divs[i].dataset.categoria))
            {
                divs[i].classList.remove("ocultar");
            }
            else
            {
                divs[i].classList.add("ocultar");
            }
        }
        if(selected.length===0)
        {
            for(let i = 0; i < divs.length; i++)
            {
                divs[i].classList.remove("ocultar");
            }
        }

    })

})