var cadastroAluno = Vue.extend({
    template: '#templateCadastroAlunos',

    props: [
        'aluno'
    ],
    computed: {
        isEdit(){
            return this.aluno == 0 ? false : true;
        }
    },

    data: function() {
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
            isEdit: false,
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
            $.post(url, valores, function(data) {
                self.statusCadastro = true;
                if (data.status) {
                    self.erroCadastro = false;
                    self.messagem = data.msg;

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

        nextId(){
            let url = '../../src/Controller/controllerAluno.php?nextId';
            let self = this;

            $.get(url, function (data) {
                self.id = data.nextId;
            });

        }
    },

    mounted(){
        this.nextId();
    }
});