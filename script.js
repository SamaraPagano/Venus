function preencherEstrelas(n)
{
    //Preencher as estrelas até a classificação fornecida
    for (let i = 1; i <= 5; i++)
    {
        const estrela = document.getElementById('estrelas{i}');
        if (i <= n)
        {
            estrela.src = 'estrela_cheia.png';
        }
        else
        {
            estrela.src = 'estrela_vazia.png';
        }
    }
}

function enviarAvaliacao()
{
    //Obter a avaliaçao selecionada pelo usuário
    const avaliacao = document.querySelector('input["avaliacao"]: checked').ariaValueMax;
    
    //Exibir mensagem de sucesso
    alert('Avaliação enviada com sucesso: ${avaliacao} estrelas!');
}