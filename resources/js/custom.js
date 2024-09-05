//Quando eecutar a pagina usa o select2

$(document).ready(function() {
    $('#servicos, #classeServico').select2({
        theme: 'bootstrap-5',
        width: '100%',
    });

    function populateServicos(selectElement, classeServicoValue) {
        $.ajax({
            type: "GET",
            url: "/retorna-nome-servicos/" + classeServicoValue,
            dataType: "json",
            success: function(response) {
                selectElement.empty();
                selectElement.append('<option value="">Selecione um serviço</option>');
                $.each(response, function(index, item) {
                    selectElement.append('<option value="' + item.id + '">' + item
                        .descricao + '</option>');
                });
                selectElement.prop('disabled', false);
            },
            error: function(xhr, status, error) {
                console.error("Ocorreu um erro:", error);
                console.log(xhr.responseText);
            }
        });
    }

    $('#classeServico').change(function() {
        var classeServicoValue = $(this).val();
        var servicosSelect = $('#servicos');

        if (!classeServicoValue) {
            servicosSelect.empty().append('<option value="">Selecione um serviço</option>');
            servicosSelect.prop('disabled', true);
            return;
        }

        populateServicos(servicosSelect, classeServicoValue);
    });

    $('#add-proposta').click(function() {
        var newProposta = $('#template-proposta-comercial').html();
        $('#form-propostas-comerciais').append(newProposta);
    });

    $(document).on('click', '.remove-proposta', function() {
        $(this).closest('.proposta-comercial').remove();
    });
});

