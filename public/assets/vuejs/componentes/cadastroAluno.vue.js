var cadastroAluno = Vue.extend({
    template: '#templateCadastroAlunos',

    props: [
        'aluno',
        'listagem'
    ],
    computed: {
        isEdit() {
            return this.aluno !== 0;
        }
    },

    data: function () {
        return {
            id: 0,
            nomeAluno: '',
            cpfAluno: '',
            matriculaAluno: '',
            sexoAluno: '',
            telefone: '',
            sexoLista: [
                {
                    valor: '',
                    texto: 'Selecione'
                },
                {
                    valor: 'M',
                    texto: 'Masculino'
                },
                {
                    valor: 'F',
                    texto: 'Feminino'
                }
            ],
            statusCadastro: false,
            erroCadastro: false,
            mensagem: '',
            dados: []
        }
    },

    methods: {
        saveAluno() {
            let url = '../../src/Controller/controllerAluno.php';
            let self = this;

            let valores = {

                'nomeAluno': this.nomeAluno,
                'cpfAluno': this.cpfAluno,
                'sexoAluno': this.sexoAluno,
                'matriculaAluno': this.matriculaAluno,
                'telefone': this.telefone
            };

            if (!isValidAluno()) {
                alert('Preencha todos os campos obrigatórios!');
                return false;
            }
            $.post(url, valores, function (data) {
                self.statusCadastro = true;
                if (data.status) {
                    self.erroCadastro = false;
                    self.messagem = data.msg;

                    self.nextId();
                    self.nomeAluno = '';
                    self.cpfAluno = '';
                    self.sexoAluno = '';
                    self.telefone = '';
                    self.matriculaAluno = '';

                } else {
                    self.erroCadastro = true;
                    self.messagem = data.msg
                }
            });
        },

        deleteAluno(id) {

            let teste = confirm('Tem certeza que deseja excluir este cadastro?');

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
                    window.open('../view/viewAluno.php[Deprecated]', '_self');
                } else {
                    alert(result.msg);
                }
            });

        },

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

        nextId() {
            let url = '../../src/Controller/controllerAluno.php?nextId';
            let self = this;

            $.get(url, function (data) {
                self.id = data.nextId;
            });

        }

    },

    mounted() {
        if (this.aluno === 0) {
        this.nextId();
        }
        this.getData();
    }


});