const saldoInput = document.getElementById('saldo');
const toggleOlho = document.getElementById('toggle-olho');

function atualizarVisibilidade(visivel) {
    saldoInput.type = visivel ? 'text' : 'password';
    toggleOlho.src = `https://img.icons8.com/?size=100&id=${visivel ? '60022' : '59814'}&format=png&color=FFFFFF`;
}

// Buscar estado salvo na sessão ao carregar
fetch('controllers/toggle_saldo.php')
    .then(response => response.json())
    .then(data => {
        atualizarVisibilidade(data.saldo_visivel);
    })
    .catch(error => console.error('Erro ao carregar estado:', error));

// Evento de clique para alternar estado
toggleOlho.addEventListener('click', () => {
    fetch('controllers/toggle_saldo.php', { method: 'POST' })
        .then(response => response.json())
        .then(data => {
            atualizarVisibilidade(data.saldo_visivel);
        })
        .catch(error => console.error('Erro ao alternar estado:', error));
});


$(document).ready(function () {
    $('#valorEntrada').mask('000.000.000,00', {
        reverse: true
    });
});

$(document).ready(function () {
    $('#valorSaida').mask('000.000.000,00', {
        reverse: true
    });
});

$(document).ready(function () {
    $('#valor').mask('000.000.000,00', {
        reverse: true
    });
});

$(document).ready(function () {
    $('#cpf').mask('000.000.000-00', { reverse: true });
});

$(document).ready(function () {
    $('.checkbox-pago').on('change', function () {
        const parentRow = $(this).closest('.row');
        if ($(this).is(':checked')) {
            parentRow.addClass('checked-bg');
            parentRow.removeClass('bg-default');

        } else {
            parentRow.removeClass('checked-bg');
            parentRow.addClass('bg-default');
        }
    });
});

function refreshWithDelay() {
    setTimeout(function () {
        location.reload();
    }, 100); // Delay de 2000ms (2 segundos)
}


$(document).ready(function () {

    console.log("jQuery está funcionando!");

});


function confirmarExclusao(caminho, id) {
    Swal.fire({
        title: "Tem certeza?",
        text: "Esta ação não pode ser desfeita!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Sim, excluir!",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "http://localhost/sistema_financeiro/controllers/" + caminho + "?id=" + id;
        }
    });
}


$(document).ready(function () {
    // Lógica para a checkbox de pagamento
    $('.checkbox-pago').on('change', function () {
        const parentRow = $(this).closest('.row');
        const isChecked = $(this).is(':checked');
        const id = $(this).data('id'); // Captura o ID do atributo data-id
        const user = $(this).data('user'); // Captura o ID do atributo data-user
        // Atualizar estilos da linha
        if (isChecked) {
            parentRow.removeClass('alert-danger alert-light'); // Remove as cores anteriores
            parentRow.addClass('bg-green'); // Adiciona a cor verde
        } else {
            const isAtrasado = parentRow.hasClass('alert-danger');
            parentRow.removeClass('bg-green'); // Remove a cor verde
            if (isAtrasado) {
                parentRow.addClass('bg-danger'); // Volta para vermelho se atrasado
            } else {
                parentRow.addClass('bg-default'); // Volta para preto se não atrasado
            }
        }

        // Chamada AJAX para atualizar o status
        $.ajax({
            url: 'http://localhost/sistema_financeiro/controllers/ajax_atualiza_status.php',
            method: 'POST',
            data: {
                id: id,
                user_id: user,
                status: isChecked ? 'pago' : 'pendente'
            },
            success: function (response) {
                const data = JSON.parse(response);
                console.log('Status atualizado com sucesso:', response);
                if (data.success) {
                    location.reload();
                } else {
                    alert('Erro ao atualizar o status.');
                }
            },
            error: function (xhr, status, error) {
                console.error('Erro ao atualizar o status:', error);
            }
        });
    });

    // Lógica para o valor editável
    $(document).on('click', '.valor-editavel', function () {
        const valorElemento = $(this);
        const valorAtual = valorElemento.text().trim();
        const idDespesa = valorElemento.data('id');

        const input = $(`<input type="text" class="form-control" value="${valorAtual}" />`);
        valorElemento.html(input);
        input.mask('000.000.000,00', { reverse: true });
        input.focus();

        input.on('blur', function () {
            let novoValor = $(this).val().trim();

            if (!novoValor) {
                alert('Por favor, insira um valor válido.');
                valorElemento.text(valorAtual);
                refreshWithDelay();
                return;
            }

            $.ajax({
                url: 'controllers/ajax_atualiza_valor.php',
                method: 'POST',
                data: {
                    id: idDespesa,
                    valor: novoValor
                },
                success: function (response) {

                    valorElemento.text(novoValor);
                },
                error: function () {
                    alert('Erro ao atualizar valor.');
                    valorElemento.text(valorAtual);
                }
            });
        });

        input.on('keypress', function (e) {
            if (e.which === 13) {
                $(this).blur();
            }
        });
    });
});