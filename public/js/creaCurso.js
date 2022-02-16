$(function()
{

    var paginaDosMostradaPorPrimeraVez = false;
    
    $.fn.activar = function()
    {
        this.toggleClass("activado");
        return this;
    }


    muestraPagina(1);
    $("#pagination1").activar();

    // Añadir función que al cambiar de página guarde los valores aquí en memoria o algo para cuestiones de relevancia e importancia
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

    // Ah y que no te deje pasar la página hasta que los valores estén correctos
    // (fechas en su sitio, todo escrito, etcétera)

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
        if(id==2)
        {
            if(paginaDosMostradaPorPrimeraVez == false)
            {
                $('img[usemap]').rwdImageMaps();
                paginaDosMostradaPorPrimeraVez = true;
            }
        }
    }

})