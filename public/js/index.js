var token = $('meta[name=_token]').attr('content');

function Buscador(ruta, itemReplace, item, keyCode){
    if(keyCode != 13) return;

    let url;
    url = $(item).val() != '' ? `${ruta}/` + $(item).val() :  ruta;
    MakeRequestData(url , itemReplace, true);
}

function verPass(id) {
    var item = document.getElementById(id);
    if (item.type == 'password') {
        item.type = "text";
    } else {
        item.type = "password";
    }
}

$("body").on("click", ".page-link", function(event){
    event.preventDefault();
    let url = $(this).attr('href');

    if(url.includes('page')){
        MakeRequestData(url, $(this).closest('.contentPager').attr('link'), true);
    }
});

$("body").on("click", ".category-item", function(){
    let categoria = $(this).attr('categoria');
    let contenedor = `#category-content-${categoria}`;
    let productos = $(contenedor).find('.product-category-item').length;

    if(!productos){
        MakeRequestData(`${$('.link-consulta').html()}/${categoria}/0`, contenedor, true);
    }
});

$('body').on('change', '.previsualizar-imagen', function(){

    // Obtener la imagen seleccionada por el usuario
    const inputImagen = document.getElementById($(this).attr('id'));
    const contenedorImagen = document.getElementById($(this).attr('img-view'));
    const imagen = inputImagen.files[0];

    while (contenedorImagen.firstChild) {
        contenedorImagen.removeChild(contenedorImagen.firstChild);
    }

    // Crear un objeto URL para la imagen y asignarlo como fuente del elemento de imagen
    const urlImagen = URL.createObjectURL(imagen);
    const img = document.createElement('img');
    img.src = urlImagen;

    // Añadir la imagen al contenedor de previsualización
    contenedorImagen.appendChild(img);
    URL.revokeObjectURL();
});

function AlertConfirmacion(TextAlert){
    return new Promise((resolve, reject) => {
        let Titulo = $(TextAlert).text();

        Swal.fire({
            text: Titulo,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            allowOutsideClick: false,
            confirmButtonText: 'Aceptar',
        }).then((result) =>{
            resolve(result.isConfirmed);
        });
    });
}

function getDataRequest(IdForm, Datos){
    if(IdForm != ''){
        var Form = $(IdForm)[0];
        return new FormData(Form);
    }
    let DataSend = { '_token': token };

    for( var i = 0; i < Datos.length; i++){
        let clave = Datos[i].split('/');
        if(clave.length > 2){
            let indice = clave[0];
            clave.shift();
            DataSend[indice] = clave.join('/');
        }else{
            DataSend[clave[0]] = clave[1];
        }
    }
    return DataSend;
}

function ValidarForm(form, ShowInputs = true){

    let newform = $(form)[0];

    if (form && !newform.checkValidity()) {
        newform.classList.add('was-validated');
        if(ShowInputs) return CamposRequeridos(form);
        return true;
    }

    return false;
}

function CamposRequeridos(form){

    let vacias = false;
    let Preguntas = '';

    $(form).each(function () {
        $(this).find('.form-control:invalid').each(function () {
            vacias = true;
            let pregunta = $(this).closest('.form-group').find('.label-form').html();
            if(pregunta){
                Preguntas += `${pregunta}<br><br>`
            }else{
                pregunta = $(this).closest('div').find('.label-form').html();
                if(pregunta){
                    Preguntas += `${pregunta}<br><br>`
                }
            }
        });
    });

    if(vacias){
        ShowAlert('Campos Requeridos:', `<hr class="mt-0"><div class="text-start">${Preguntas}</div>`, 'error', false);
    }
    return vacias;
}

function MakeRequestData(Url, ItemReplace, HideLoad = false, ModalName = '', type = 'GET',
    accion = 2, IdForm = '', ShowResult = false, closeModal= false, params = [], Metodo = SetDataResult){

    if(params.length > 0 && params[0].includes('NeedAsk/#')){
        let info = params[0].split('/');
        params.shift();
        AlertConfirmacion(info[1])
        .then(response => {
            if(response){
                MakeRequestData(Url, ItemReplace, HideLoad, ModalName, type,
                accion, IdForm, ShowResult, closeModal, params, Metodo);
            }
        });
    }else{
        if(IdForm.includes('##')){
            IdForm = IdForm.replace('##', '#');
        }else if(IdForm != '' && ValidarForm(IdForm)){ return; }

        let DataSend = getDataRequest(IdForm, params);
        if(HideLoad) LoadingAlert();

        let confi = {
            type: type,
            url: Url,
            cache: false,
            data: (type == 'POST' ? DataSend : null),
            timeout: 800000,
            async: true,
            success: function(response) {
                if(ModalName != '') $(ModalName).modal('show');
                if(HideLoad) Swal.close();
                Metodo(ItemReplace, accion, response, params);
                if(ShowResult) ShowAlert('Éxito', 'El proceso se ha realizado correctamente','success');

                if($(ModalName).is(':visible') && closeModal) $(ModalName).modal('hide');
            },
            error: function(error){ ErrorRequest(error); }
        }

        if(IdForm != '') {
            confi['processData'] = false;
            confi['contentType'] = false;
        }
        $.ajax(confi);
    }
}

function EditShopping(ItemReplace, accion, response, params){
    SetDataResult(ItemReplace, accion, response, params);
    let subtotal = 0;

    $('.subtotal-item').each(function(){
        subtotal += parseFloat($(this).html());
    })

    $('.total-shopping').html(subtotal.toFixed(2));
}

function AlertWait(ItemReplace, accion, response){

    response += '|0|0'
    let titulo = 'El proceso se ha realizado correctamente';
    let respuesta = response.split('|');
    let icono = 'success';

    if(respuesta[1] == 'personalizado'){
        titulo = respuesta[2];
        icono = respuesta[3];
    }else{
        titulo = (respuesta[2] != '0' ? respuesta[2] : titulo) + (respuesta[1] != '0' ? ` con código ${respuesta[1]}`  : '')
    }

    Swal.fire({
        icon: icono,
        title: titulo,
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#293643',
        showConfirmButton: true,
        }).then(() => {
            SetDataResult(ItemReplace, accion, respuesta[0]);
    });
}

function SetDataResult(ItemReplace, accion, response){
    switch(accion){
        case 0:
            $(ItemReplace).append(response);
            break;
        case 1:
            location.reload();
            break;
        case 2:
            $(ItemReplace).html(response);
            break;
        case 3:
            $(ItemReplace).replaceWith(response);
            break;
        case 4:
            $(ItemReplace).prepend(response);
            break;
        case 5:
            location.replace(response);
            break;
        case 6:
            window.location.href = response;
            break;
        case 7:
            $(ItemReplace).val(response);
            break;
    }
}

function ErrorRequest(response){

    try{
        console.log(response);
        let r = jQuery.parseJSON(response.responseText);
        if(r.includes('^')){
            ShowAlert('Error', r.replace('^',''),'error');
        }else if (r.includes('/Sesion')){
            location.reload();
        }
        else{
            ShowAlert('Error', 'Ocurrio un error al procesar la solicitud.','error');
        }
    }catch(ex){
        ShowAlert('Error', 'Ocurrio un error al procesar la solicitud.','error');
    }
}

function LoadingAlert(){
    Swal.fire({
        type: 'info',
        html: '<div><strong>Cargando...</strong></div>',
        allowOutsideClick: false,
        showConfirmButton: false,
        width: 170,
        padding: '0'
    });
    $(".swal2-modal").addClass('main-color');
}

function ShowAlert(Titulo, Mensaje, Icono, toastView = true){
    Swal.fire({
        title: Titulo,
        html: Mensaje,
        icon: Icono,
        confirmButtonColor: '#293643',
        showConfirmButton: true,
        allowOutsideClick: false,
        toast: toastView,
        confirmButtonText:'Aceptar'
    });
}
