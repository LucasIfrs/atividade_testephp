
function debounce(func, delay) {
    console.log('deboucing?');
    let timer;
    return function () {
        const context = this;
        const args = arguments;
        clearTimeout(timer);
        timer = setTimeout(() => func.apply(context, args), delay);
    };
}


function processForm() {
    var dados = $('form').serialize();
    const nome = dados.split("=")[1];
    console.log(nome);
    console.log(nome.length);
    if(nome.length>1){
        $.ajax({
            url: 'backend/processa.php',
            method: 'get',
            dataType: 'html',
            data: dados,
            success: function (data) {
                $('#resultado').empty().html(data);
            }
        });
    }

    return false;
}

$(document).ready(function () {
    console.log('ready?');
    $("#myform").submit(function(event) {
        event.preventDefault();
    });

    const debouncedProcessForm = debounce(processForm, 500);
    $('form > div > input').keyup(debouncedProcessForm);
});