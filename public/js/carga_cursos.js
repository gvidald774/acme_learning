$(function()
{
    alert("Vamos a ver esos cursos");

    // Y si hago un embed o algo y a tomar por culo...
    // Eso ya lo tengo que ir viendo y gestionando

    const route = "{{ path('trae_cursos')|escape('js')  }}";
    
    $.ajax({
        url: route,
        context: $("#cursos")
    }).done(function(info)
    {
        $(this).html(info);
    })

})