

<script>
$(document).ready(function() {
    function iniciarReparacion() {
        $.confirm({
            title: '¿Estás seguro?',
            content: '¿Deseas aceptar la cotización?',
            type: 'blue',
            buttons: {
                confirm: {
                    text: 'Sí',
                    btnClass: 'btn-blue',
                    action: function() {
                        $('#loader-container').show();
                        setTimeout(function() {
                            $('#loader-container').hide();
                            $('.reparacion-iniciada').show();
                            $('.tuerca').addClass('animated rotateIn');
                            M.toast({html: 'La reparación ha sido iniciada.', classes: 'green'});
                        }, 3000);
                    }
                },
                cancel: {
                    text: 'No',
                    btnClass: 'btn-red'
                }
            }
        });
    }

    iniciarReparacion(); // Llamada a la función para que se ejecute automáticamente

    // Opcional: Si quieres que se ejecute cada vez que se recarga la página, también puedes agregar un evento de recarga:
    // $(window).on('load', function() {
    //     iniciarReparacion();
    // });
});
</script>

<style>
#loader-container {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(255, 255, 255, 0.5);
    z-index: 9999;
    display: none;
}

.preloader-wrapper {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.reparacion-iniciada {
    font-size: 24px;
    text-align: center;
    margin-top: 20px;
}
</style>


    <div id="loader-container">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>