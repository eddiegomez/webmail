import Axios from 'axios'
import { Line } from 'vue-chartjs'

export default {
    extends: Line,
    mounted() {
        Axios.get('api/chart').then(({ data }) => {
            this.renderChart({
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Aug', 'Set', 'Out', 'Nov', 'Dez'],
                datasets: [
                    { label: 'Vendas', backgroundColor: '#dd4b39', data: [data.janeiro, data.fevereiro, data.marco, data.abril, data.maio, data.junho, data.julho, data.agosto, data.setembro, data.outubro, data.novembro, data.dezembro] },
                    { label: 'Pedidos', backgroundColor: '#05CBE1', data: [data.pjaneiro, data.pfevereiro, data.pmarco, data.pabril, data.pmaio, data.pjunho, data.pjulho, data.pagosto, data.psetembro, data.poutubro, data.pnovembro, data.pdezembro] }
                ]
            }, { responsive: false, mantainAspectratio: true })
        })
    }
}