var listagem = Vue.extend({
    template: '#templateViewAluno',


    props: [
        'listagem'
    ],

    data() {
        return {
            dados: [],
            pessoa: {}
        }
    },

    computed: {
        isListagem(){
            return this.listagem;
        },
    },

    methods: {
        getData() {
            // ID = 0 Traz todos os registros
            let url = '../../src/Controller/controllerAluno.php?getData&id=0';

            let self = this;

            $.get(url, {}, function (data) {
                self.dados = data;
            });
        },
        mostrarAluno(id) {
            let url = '../../src/Controller/controllerAluno.php?getData&id=' + id;

            let self = this;

            $.get(url, {}, function (data) {
                // console.log(data);
                self.pessoa = data[0];

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

        editAluno(id) {
          window.open('cadastroAluno.php?id=' + id, '_self')
        },


    },

    mounted() {
        this.getData();
    }

});
