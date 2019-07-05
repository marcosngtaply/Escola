var listagem = Vue.extend({
    template: '#templateViewProfessor',

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
            let url = '../../src/Controller/controllerProfessor.php?getData&id=0';

            let self = this;

            $.get(url, {}, function (data) {
                self.dados = data;
            });
        },
        mostrarProf(id) {
            let url = '../../src/Controller/controllerProfessor.php?getData&id=' + id;

            let self = this;

            $.get(url, {}, function (data) {
                // console.log(data);
                self.pessoa = data[0];

            });
        },
        deleteProf(id) {

            let teste = confirm('Tem certeza que deseja excluir este cadastro?');
            let self = this;

            if (!teste) {
                return false;
            }

            let url = '../../src/Controller/controllerProfessor.php';
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

        editProf(id) {
            window.open('cadastroProfessor.php?id=' + id, '_self')
        },

    },

    mounted() {
        this.getData();
    }

});
