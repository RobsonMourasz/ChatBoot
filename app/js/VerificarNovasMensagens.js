async function buscarNovasMensagens() {
    const idLogado = document.getElementById("id").value;
    const response = await fetch(`php/verificar_novas_mensagens?id=${idLogado}`);
    if (response.ok){
        const data = await response.json();
        console.log(data.msg);
        if (data.status == "ok") {
            
            if (data.msg > 0) {
                const container = document.getElementById('container-mensagens');
                container.addEventListener('click', (event) => {
                    const contatoDiv = event.target.closest('.contato');
                    if (contatoDiv && contatoDiv.hasAttribute('idPessoa')) {
                        // Obtém o valor do atributo idPessoa
                        const idPessoa = contatoDiv.getAttribute('idPessoa');
                        if (idPessoa == data.pessoa){
                            contatoDiv.querySelector('.contato-descricao').style = "background-color: #f00;";
                        }
            
                    } else {
                        console.log('Clique fora da div com a classe "contato" ou sem atributo idPessoa');
                    }
                });
                alert("Você tem " + data.msg + " mensagens não lidas");
                CarregarListaMensagens();   
            }
        }
    }

}

(()=>{
    setInterval( buscarNovasMensagens, 10000);
})();