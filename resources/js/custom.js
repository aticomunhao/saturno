//Quando eecutar a pagina usa o select2

//SELECT2
$(document).ready(function () {
    //Importa o select2 com tema do Bootstrap para a classe "select2"
    $(".select2").select2({
        theme: "bootstrap-5",
    });
});

//SELECT2 Dentro do modal
$(document).ready(function () {
    // Inicializa o Select2 em qualquer modal que contenha .select2
    $(document).on('shown.bs.modal', '.modal', function () {
        $('.select2', this).select2({
            theme: "bootstrap-5",
            dropdownParent: $(this),
        });

        // Para o select2 específico com tags: true
        const $valorSelect = $('#valorAquisicaoMaterial, #valorVendaMaterial', this);
        $valorSelect.select2({
            theme: "bootstrap-5",
            dropdownParent: $(this),
            tags: true,
            placeholder: "Selecione ou digite um valor",
            allowClear: true,
            createTag: function (params) {
                const term = params.term.trim();
                if (!/^\d+(\.\d{1,2})?$/.test(term)) {
                    return null;
                }
                return {
                    id: term,
                    text: term,
                    newTag: true
                };
            }
        });
    });

    // Recarrega a página ao clicar em qualquer botão .btn-danger com data-bs-dismiss="modal"
    $(document).on('click', '.btn-danger[data-bs-dismiss="modal"]', function () {
        location.reload();
    });
});

//preencher select da modal Itens Material
$(document).ready(function () {
    // Função genérica para carregar opções via AJAX com async/await
    async function carregarOpcoes(url, targetSelect, placeholder = "Selecione...") {
        const select = $(targetSelect);
        if (select.length === 0) return;

        select.prop('disabled', true);
        select.html(`<option selected>Carregando...</option>`);

        try {
            const response = await fetch(url);
            const data = await response.json();

            select.empty();

            if (data.length > 0) {
                select.append(`<option value="" disabled selected>${placeholder}</option>`);
                data.forEach((item) => {
                    select.append(`<option value="${item.id}">${item.nome}</option>`);
                });
            } else {
                select.append(`<option value="" selected>Não Possui</option>`);
            }
        } catch (error) {
            console.error("Erro ao carregar opções:", error);
            select.html(`<option value="">Erro ao carregar</option>`);
        } finally {
            select.prop('disabled', false);
        }
    }

    // Flag do checkbox "Avariado"
    let avariadoAtivo = false;

    // Atualiza apenas o valor de venda ao marcar/desmarcar "Avariado"
    $('#checkAvariado').on('change', function () {
        avariadoAtivo = $(this).is(':checked');

        const nomeId = $('#nomeMaterial').val();
        if (nomeId) {
            const valorVendaUrl = avariadoAtivo
                ? `/valorVendaAvariado/${nomeId}`
                : `/valorVenda/${nomeId}`;

            carregarOpcoes(valorVendaUrl, '#valorVendaMaterial');
        }
    });

    // Quando categoria é selecionada
    $('#categoriaMaterial').on('change', function () {
        const categoriaId = this.value;
        if (!categoriaId) return;

        const filtrosCategoria = {
            [`/nome/${categoriaId}`]: '#nomeMaterial',
            [`/marcas/${categoriaId}`]: '#marcaMaterial',
            [`/tamanhos/${categoriaId}`]: '#tamanhoMaterial',
            [`/cores/${categoriaId}`]: '#corMaterial',
            [`/fases/${categoriaId}`]: '#faseEtariaMaterial',
        };

        for (const [url, selector] of Object.entries(filtrosCategoria)) {
            carregarOpcoes(url, selector);
        }
    });

    // Quando nome do material é selecionado
    $('#nomeMaterial').on('change', async function () {
        const nomeId = this.value;
        if (!nomeId) return;

        await carregarOpcoes(`/embalagem/${nomeId}`, '#embalagemMaterial');
        await carregarOpcoes(`/valorAquisicao/${nomeId}`, '#valorAquisicaoMaterial');

        const valorVendaUrl = avariadoAtivo
            ? `/valorVendaAvariado/${nomeId}`
            : `/valorVenda/${nomeId}`;
        await carregarOpcoes(valorVendaUrl, '#valorVendaMaterial');

        // Carrega o tipo do material e preenche os campos ocultos
        try {
            const response = await fetch(`/tipo/${nomeId}`);
            const data = await response.json();

            $('#tipoMaterialNome').val(data.nome || '');
            $('#tipoMaterial').val(data.id || '');

            if (data.id == 2) {
                $('#checkAplicacao').prop('disabled', false);
            } else {
                $('#checkAplicacao').prop('disabled', true).prop('checked', false);
            }
        } catch (error) {
            console.error('Erro ao buscar tipo do material:', error);
            $('#tipoMaterialNome').val('');
            $('#tipoMaterial').val('');
        }
    });
});


// Selecione todos os campos com a classe 'proposta'
document.querySelectorAll('.valor-monetario').forEach(function (input) {
    input.addEventListener('input', function (event) {
        let value = event.target.value.replace(/\D/g, ''); // Remove tudo o que não for número
        if (value) {
            value = (parseInt(value) / 100).toFixed(2); // Converte para valor decimal
            value = value.replace('.', ','); // Substitui ponto por vírgula
            event.target.value = 'R$ ' + value; // Adiciona o "R$" antes do valor
        }
    });
});
