
(() => {


    // Seleciona o contêiner geral
    const container = document.getElementById('container-mensagens');

    // Adiciona um listener de clique ao contêiner
    container.addEventListener('click', (event) => {
        // Verifica se o elemento clicado contém a classe 'contato'
        const contatoDiv = event.target.closest('.contato');

        if (contatoDiv && contatoDiv.hasAttribute('idPessoa')) {
            // Obtém o valor do atributo idPessoa
            const idPessoa = contatoDiv.getAttribute('idPessoa');
            idDestinatarioSelecionado = idPessoa;
            exibir_mensagens(document.getElementById("id").value, idPessoa);
            document.querySelector(".page-active").classList.toggle("opacity-100");
            setTimeout(() => {
                document.querySelector(".page-active").classList.add("d-none");
            }, 500);
        } else {
            console.log('Clique fora da div com a classe "contato" ou sem atributo idPessoa');
        }
    });

    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape" || event.key === "Esc") {
            document.querySelector(".page-active").classList.add("opacity-100");
            document.querySelector(".page-active").classList.remove("d-none");
        }
    });
})();

async function CarregarConversasUsuarios() {
    const idLogado = document.getElementById("id");
    const pesq_conversas = await fetch(`../php/pesqConversas.php?id=${idLogado}`);
    if (pesq_conversas.ok) {
        const retorno_conversa = await pesq_conversas.json();
        if (retorno_conversa.Retorno === "OK") {

        }
    }
}

