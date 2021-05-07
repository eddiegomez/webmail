import { Line } from 'vue-chartjs'

export default {
    extends: Line,
    mounted() {
        axios.get("api/chart").then(({ data }) => {
            //perdidas
            localStorage.setItem("1", data.janeiro);
            localStorage.setItem("2", data.fevereiro);
            localStorage.setItem("3", data.marco);
            localStorage.setItem("4", data.abril);
            localStorage.setItem("5", data.maio);
            localStorage.setItem("6", data.junho);
            localStorage.setItem("7", data.julho);
            localStorage.setItem("8", data.agosto);
            localStorage.setItem("9", data.setembro);
            localStorage.setItem("10", data.outubro);
            localStorage.setItem("11", data.novembro);
            localStorage.setItem("12", data.dezembro);

            //encontradas
            localStorage.setItem("e1", data.ejaneiro);
            localStorage.setItem("e2", data.efevereiro);
            localStorage.setItem("e3", data.emarco);
            localStorage.setItem("e4", data.eabril);
            localStorage.setItem("e5", data.emaio);
            localStorage.setItem("e6", data.ejunho);
            localStorage.setItem("e7", data.ejulho);
            localStorage.setItem("e8", data.eagosto);
            localStorage.setItem("e9", data.esetembro);
            localStorage.setItem("e10", data.eoutubro);
            localStorage.setItem("e11", data.enovembro);
            localStorage.setItem("e12", data.edezembro);
        });
        axios.get("api/chart");
        this.renderChart({
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'Pessoas Encontradas',
                backgroundColor: '#05CBE1',
                data: [localStorage.getItem("e1"), localStorage.getItem("e2"), localStorage.getItem("e3"), localStorage.getItem("e4"), localStorage.getItem("e5"), localStorage.getItem("e6"), localStorage.getItem("e7"), localStorage.getItem("e8"), localStorage.getItem("e9"), localStorage.getItem("e10"), localStorage.getItem("e11"), localStorage.getItem("e12")]
            }, {
                label: 'Pessoas Perdidas',
                backgroundColor: '#FC2525',
                //data: [0, 0, 0, 0, 4, 2, 0]
                data: [localStorage.getItem("1"), localStorage.getItem("2"), localStorage.getItem("3"), localStorage.getItem("4"), localStorage.getItem("5"), localStorage.getItem("6"), localStorage.getItem("7"), localStorage.getItem("8"), localStorage.getItem("9"), localStorage.getItem("10"), localStorage.getItem("11"), localStorage.getItem("12")]
            }]
        }, { responsive: true, maintainAspectRatio: false })

    }
}