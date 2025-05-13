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
    // Função genérica para carregar opções via AJAX
    function carregarOpcoes(url, targetSelect, placeholder = "Selecione...") {
        fetch(url)
            .then((response) => response.json())
            .then((data) => {
                const select = $(targetSelect);
                console.log(data);
                select.empty(); // Limpa as opções existentes
                if (data.length > 0) {
                    select.append(`<option value="" disabled selected>${placeholder}</option>`);
                    data.forEach((item) => {
                        select.append(`<option value="${item.id}">${item.nome}</option>`);
                    });
                } else {
                    select.append(`<option value="" selected>Não Possui</option>`);
                }
            })
            .catch((error) => console.error("Erro ao carregar opções:", error));
    }

    let avariadoAtivo = false;

    // Atualiza a flag quando o checkbox mudar
    $('#checkAvariado').on('change', function () {
        avariadoAtivo = $(this).is(':checked');
        $('#nomeMaterial').trigger('change');
    });

    // Filtro dinâmico com base na categoria
    $('#categoriaMaterial').on('change', function () {
        const categoriaId = this.value;
        if (categoriaId) {
            carregarOpcoes(`/nome/${categoriaId}`, '#nomeMaterial');
            carregarOpcoes(`/marcas/${categoriaId}`, '#marcaMaterial');
            carregarOpcoes(`/tamanhos/${categoriaId}`, '#tamanhoMaterial');
            carregarOpcoes(`/cores/${categoriaId}`, '#corMaterial');
            carregarOpcoes(`/fases/${categoriaId}`, '#faseEtariaMaterial');
        }
    });

    // Filtro dinâmico com base no nome do material
    $('#nomeMaterial').on('change', function () {
        const nomeId = this.value;
        if (nomeId) {
            carregarOpcoes(`/embalagem/${nomeId}`, '#embalagemMaterial');
            carregarOpcoes(`/valorAquisicao/${nomeId}`, '#valorAquisicaoMaterial');

            // Verifica se avariado está ativado para buscar dos endpoints corretos
            if (avariadoAtivo) {
                carregarOpcoes(`/valorVendaAvariado/${nomeId}`, '#valorVendaMaterial');
            } else {
                carregarOpcoes(`/valorVenda/${nomeId}`, '#valorVendaMaterial');
            }

            fetch(`/tipo/${nomeId}`)
                .then(response => response.json())
                .then(data => {
                    $('#tipoMaterialNome').val(data.nome || '');
                    $('#tipoMaterial').val(data.id || '');
                })
                .catch(error => {
                    $('#tipoMaterialNome').val('');
                    $('#tipoMaterial').val('');
                    console.error('Erro ao buscar tipo do material:', error);
                });
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
