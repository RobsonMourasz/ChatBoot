(()=>{
    document.querySelectorAll(".contato").forEach(card => {
        card.addEventListener("click", ()=>{
            document.querySelector(".page-active").classList.toggle("opacity-100")
            setTimeout(() => {
                document.querySelector(".page-active").classList.add("d-none");
            }, 500);
        });

        document.addEventListener("keydown", (event) => {
            if (event.key === "Escape" || event.key === "Esc") {
                document.querySelector(".page-active").classList.add("opacity-100")
                document.querySelector(".page-active").classList.remove("d-none")
            }
        });
    });
})();