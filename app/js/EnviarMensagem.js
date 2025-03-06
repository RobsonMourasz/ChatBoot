document.getElementById("form-envio-mensagem").addEventListener("submit", async (event) => {
    event.preventDefault();
    let data = new FormData(document.getElementById("form-envio-mensagem"));
    data.append("idUsuario", document.getElementById("id").value);
    data.append("idDestinatario", idDestinatarioSelecionado);
    const response = await fetch("php/enviar_mensagem.php", {
        method: "POST",
        body: data
    });

    if (response.ok) {
        limparInputs("form-envio-mensagem");
        exibir_mensagens(document.getElementById("id").value, idDestinatarioSelecionado);
    } else {
        alert("Erro ao enviar a mensagem. Por favor, tente novamente.");
    }
});