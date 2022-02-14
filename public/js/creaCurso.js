$(function()
{
    $("#pagina1").hide();
    $("#pagina2").hide();
    $("#pagina3").hide();

    // Añadir función que al cambiar de página guarde los valores aquí en memoria o algo para cuestiones de relevancia e importancia
    $("#pagination1").on("click", function(ev)
    {
        ev.preventDefault();
        $("#pagina1").show();
        $("#pagina2").hide();
        $("#pagina3").hide();
    })
    $("#pagination2").on("click", function(ev)
    {
        ev.preventDefault();
        $("#pagina1").hide();
        $("#pagina2").show();
        $("#pagina3").hide();

    })
    $("#pagination3").on("click", function(ev)
    {
        ev.preventDefault();
        $("#pagina1").hide();
        $("#pagina2").hide();
        $("#pagina3").show();

    })

    $('area').on("click",function(ev) {
        ev.preventDefault();
    })

    // Ah y que no te deje pasar la página hasta que los valores estén correctos
    // (fechas en su sitio, todo escrito, etcétera)
})