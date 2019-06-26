var listagem = Vue.extend({
    template: '#templateViewAluno',


    data() {
        return {
            dados: []
        }
    },

    computed: {

    }

,
    methods: {
        getData() {
            let url = '../../src/Controller/controllerAluno.php?getData&id=' + this.aluno;

            let self = this;

            $.get(url, {}, function (data) {
                self.dados = data[0];

                self.id = data[0].id;
                self.nomeAluno = data[0].nomeAluno;
                self.cpfAluno = data[0].cpfAluno;
                self.matriculaAluno = data[0].matriculaAluno;
                self.sexoAluno = data[0].sexoAluno;
                self.telefone = data[0].telefone;
            });
        },


    },

    mounted() {
        this.getData();
    }

});
