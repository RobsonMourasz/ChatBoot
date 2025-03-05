(()=>{
    document.querySelectorAll(".container-mensagens").forEach(card => {
        card.addEventListener("click", ()=>{
            console.log("clicou");
            document.querySelector(".page-active").classList.toggle("opacity-100")
            setTimeout(() => {
                document.querySelector(".page-active").classList.add("d-none");
            }, 500);
        });
    });
    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape" || event.key === "Esc") {
            document.querySelector(".page-active").classList.add("opacity-100")
            document.querySelector(".page-active").classList.remove("d-none")
        }
    });
})();

async function CarregarConversasUsuarios() {
    const idLogado = document.getElementById("id");
    const pesq_conversas = await fetch(`../php/pesqConversas.php?id=${idLogado}`);
    if (pesq_conversas.ok){
        const retorno_conversa = await pesq_conversas.json();
        if (retorno_conversa.Retorno === "OK"){
            
        }
    }
}