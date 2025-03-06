/* <div class="card mensagem-recebida">

    </div>
    <div class="clear-fix"></div> */
async function exibir_mensagens(id) {

    const response = await fetch(`php/exibir_mensagens.php?id=${id}`); // Realiza o fetch para obter as mensagens
    const container = document.getElementById('mensagens');
    if (response.ok) {
        const data = await response.json();
        if (data.length > 0) {
            container.innerHTML = ''; // Limpa o contêiner antes de adicionar novos cards
            data.forEach(item => {
                const card = createCard(item); // Cria um card para cada item
                container.appendChild(card);  // Adiciona o card ao contêiner
            });
            document.getElementById("nome").innerText = `${data.usuario}`;
            document.getElementById("ultimo-acesso").innerText = `${data.visto_ultimo}`;
        } else {
            container.innerHTML = '<p>Sem novas mensagens</p>'; // Exibe mensagem padrão
        }
    }
}

// Função para criar o card
function createCard(data) {
    const card = document.createElement('div');
    card.className = 'card mensagem-recebida'; // Classe do card

    // Cria o HTML do card dinamicamente
    card.innerHTML = `
        <div class="card-title">
            <h3>${data.usuario}</h3>
        </div>
        <div class="card-body">
            <p>${data.mensagem}</p>
        </div>
        <div class="card-footer">
            <span>${data.data_envio}</span>
        </div>
    `;
    const card_flix = document.createElement('div');
    card_flix.innerHTML = "";
    card_flix.innerHTML = `<div class="clear-fix"></div>`;
    card.appendChild(card_flix);
    return card;
}