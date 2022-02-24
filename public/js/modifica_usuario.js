$(function()
{
    $("#boton-modificar").on("click",function(ev)
    {
        ev.preventDefault();
        // Cambiar todos los parámetros de la cosa esta modificables por inputs texts
        $(".datos-perfil").toggleClass("d-none");
        $(".formulario-perfil").toggleClass("d-none");
    });
})