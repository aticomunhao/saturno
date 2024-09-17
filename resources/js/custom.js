//Quando eecutar a pagina usa o select2

//SELECT2
$(document).ready(function () {
    //Importa o select2 com tema do Bootstrap para a classe "select2"
    $(".select2").select2({
        theme: "bootstrap-5",
    });
});
//Máscara de telefonev (INCLUIR EMPRESA)
document.addEventListener('DOMContentLoaded', function () {
    Inputmask("(99) 99999-9999").mask(document.querySelector("#inscricaoTelefoneId"));
});


document.addEventListener('DOMContentLoaded', function () {
    // Máscara para o CEP
    Inputmask("99999-999").mask("#inscricaoCepId");
});

