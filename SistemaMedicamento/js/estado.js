$(document).ready(function() {
    $('#estado').on('change', function() {
        $.ajax({
            type: 'POST',
            url: 'lista_cidades.php',
            dataType: 'html',
            data: {'estado': $('#estado').val()},
            // Antes de carregar os registros, mostra para o usuário que está
            // sendo carregado.
            beforeSend: function(xhr) {
                $('#cidade').attr('disabled', 'disabled');
                $('#cidade').html('<option value="">Carregando...</option>');

                $('#bairro').html('<option value="">Selecione uma cidade</option>');
                $('#bairro').attr('disabled', 'disabled');
            },
            // Após carregar, coloca a lista dentro do select de cidades.
            success: function(data) {
                if ($('#estado').val() !== '') {
                    // Adiciona o retorno no campo, habilita e da foco
                    $('#cidade').html('<option value="">Selecione</option>');
                    $('#cidade').append(data);
                    $('#cidade').removeAttr('disabled').focus();
                } else {
                    $('#cidade').html('<option value="">Selecione um estado</option>');
                    $('#cidade').attr('disabled', 'disabled');

                    $('#bairro').html('<option value="">Selecione uma cidade</option>');
                    $('#bairro').attr('disabled', 'disabled');
                }
            }
        });
    });

    $('#cidade').on('change', function() {
        $.ajax({
            type: 'POST',
            url: 'lista_bairros.php',
            dataType: 'html',
            data: {'cidade': $('#cidade').val()},
            // Antes de carregar os registros, mostra para o usuário que está
            // sendo carregado.
            beforeSend: function(xhr) {
                $('#bairro').attr('disabled', 'disabled');
                $('#bairro').html('<option value="">Carregando...</option>');
            },
            // Após carregar, coloca a lista dentro do select de bairros.
            success: function(data) {
                if ($('#cidade').val() !== '') {
                    // Adiciona o retorno no campo, habilita e da foco
                    $('#bairro').html('<option value="">Selecione</option>');
                    $('#bairro').append(data);
                    $('#bairro').removeAttr('disabled').focus();
                } else {
                    $('#bairro').html('<option value="">Selecione uma cidade</option>');
                    $('#bairro').attr('disabled', 'disabled');
                }
            }
        });
    });
});