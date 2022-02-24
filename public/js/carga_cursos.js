$(function()
{

    // Y si hago un embed o algo y a tomar por culo...
    // Eso ya lo tengo que ir viendo y gestionando

    const route = Routing.generate('trae_cursos');
    
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
            element.classList.add("col-6");
            if(obj.descripcion.length > 50)
            {
                var texto = obj.descripcion.substr(0,50)+"...</div>";
            }
            else
            {
                var texto = obj.descripcion;
            }
            element.innerHTML = "   <a href='/cursos/d/"+obj.id+"'><div class='curso p-5 bg-ruby overflow-hidden'>"
                              + "   <img src='/assets/images/cursos/"+obj.imagen+"' class='img-responsive' style='height:100px;'>"
                              + "   <h5>"+obj.titulo+"</h5>"
                              + "   <p class='overflow-hidden'>"+texto+"</p>"
                              + "   <div><strong>"+(obj.precio/100)+" € - "+obj.plazas+" plazas</strong></div>"
                              + "</div></a></div>";
            divPequenio.append(element);
        });
        $(this).html(divCompleto);
    })

})