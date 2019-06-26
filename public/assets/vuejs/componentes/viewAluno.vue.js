var listagem = Vue.extend({
    template: '#templateViewAluno',


    props: [
        'listagem'
    ],

    data() {
        return {
            dados: []
        }
    },

    computed: {
        isListagem(){
            return this.listagem;
        }
    }

,
    methods: {
        getData() {
            let url = '../../src/Controller/controllerAluno.php?getData&id=0';

            let self = this;

            $.get(url, {}, function (data) {
                self.dados = data;
            });
        },
        deleteAluno(id) {

            let teste = confirm('Tem certeza que deseja excluir este cadastro?');
            let self = this;

            if (!teste) {
                return false;
            }

            let url = '../../src/Controller/controllerAluno.php';
            let dados = {
                'id': id,
                'excluir': true
            };

            $.post(url, dados, function (result) {

                if (result.status === true) {
                    self.getData();
                }
            });

        },

    },




    mounted() {
        this.getData();
    }

});
