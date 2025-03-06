(() => {
    addEventListener('DOMContentLoaded', async () => {
        // Seleciona o contêiner onde os cards serão adicionados
        let container = document.getElementById('container-mensagens');
        const idInput = document.getElementById('id'); // Verifica se o input de 
        const userId = idInput.value;

        try {
            // Realiza o fetch para obter as mensagens
            const response = await fetch(`php/novas_mensagens.php?idUser=${userId}`);

            if (response.ok) {
                const data = await response.json();

                if (data.length > 0) {
                    container.innerHTML = ''; // Limpa o contêiner antes de adicionar novos cards
                    data.forEach(item => {
                        const card = createCard(item); // Cria um card para cada item
                        container.appendChild(card);  // Adiciona o card ao contêiner
                    });
                } else {
                    container.innerHTML = '<p>Sem novas mensagens</p>'; // Exibe mensagem padrão
                }

                const pesquisaElement = document.getElementById('pesquisa');
                if (pesquisaElement) {
                    pesquisaElement.scrollIntoView(); // Rola para o elemento "pesquisa"
                } else {
                    console.warn('Elemento com ID "pesquisa" não encontrado!');
                }
            } else {
                console.error(`Erro ao obter as mensagens! Status: ${response.status}`);
            }
        } catch (error) {
            console.error('Erro na requisição do fetch:', error);
        }
    });
})();

// Função para criar o card
function createCard(data) {
    const card = document.createElement('div');
    const url_foto = data.foto === null ? 'img/perfil/Foto-perfil.png' : data.foto;
    card.className = 'tela-mensagens'; // Classe do card

    // Cria o HTML do card dinamicamente
    card.innerHTML = `
        <div class="contato" idPessoa="${data.idusuario}">
            <div class="contato-img">
                <img src="${url_foto}" alt="Imagem do perfil" width="60" height="60">
            </div>
            <div class="contato-descricao">
                <small>${data.usuario}</small>
                <p>${data.mensagem}</p>
            </div>
            <div class="contato-inf">
                <span class="title">${new Date(data.data_envio).toLocaleTimeString()}</span>
                <span class="visivel">${data.situacao === null ? "Offline" : data.situacao}</span>
            </div>
        </div>
    `;


    return card;
}
