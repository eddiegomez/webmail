export default {
    mensagem_sucesso() {
        swal.fire({
            position: "center",
            icon: "success",
            title: "Operação concluida",
            showConfirmButton: false,
            timer: 1500,
            size: "small",
        });
    }
}