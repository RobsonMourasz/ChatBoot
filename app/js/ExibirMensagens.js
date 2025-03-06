/* <div class="card mensagem-recebida">

    </div>
    <div class="clear-fix"></div> */
async function exibir_mensagens(idLogado, idPessoa) {

    const response = await fetch(`php/exibir_mensagens.php?idLogado=${idLogado}&idPessoa=${idPessoa}`); // Realiza o fetch para obter as mensagens
    const container = document.getElementById('mensagens');
    if (response.ok) {
        const data = await response.json();
        if (data.length > 0) {
            container.innerHTML = ''; // Limpa o contêiner antes de adicionar novos cards
            data.forEach(item => {
                const card = createCardMensagens(item); // Cria um card para cada item
                container.appendChild(card);  // Adiciona o card ao contêiner
            });
            document.getElementById("nome").innerText = data[0].usuario;
            document.getElementById("ultimo-acesso").innerText = `Visto por último em ${data[0].ultimo_acesso}`;
            document.querySelectorAll(".card").forEach(card => {
                card.scrollIntoView();
            });
        } else {
            container.innerHTML = '<p>Sem novas mensagens</p>'; // Exibe mensagem padrão
        }
    }
}

// Função para criar o card
function createCardMensagens(data) {
    const card = document.createElement('div');
    let user = "";
    if (data.id_remetente == document.getElementById("id").value) {
        card.className = 'card mensagem-enviada';
        user = "Eu";
        
    }else{
        card.className += 'card mensagem-recebida';
        user = data.usuario;
    }
    // Cria o HTML do card dinamicamente
    card.innerHTML = `
        <div class="card-title">
            <h3>${user}</h3>
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
    card_flix.className = "clear-fix";
    card.appendChild(card_flix);
    return card;
}