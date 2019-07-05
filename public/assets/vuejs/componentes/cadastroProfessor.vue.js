var cadastroProfessor = Vue.extend({
    template: '#templateCadastroProfessores',

    props: [
        'professor',
        'listagem'
    ],
    computed: {
        isEdit() {
            return this.professor !== 0;
        }
    },
    data: function () {
        return {
            id: 0,
            nomeProfessor: '',
            cpfProfessor: '',
            matriculaProfessor: '',
            sexoProfessor: '',
            ingresso: '',
            salario: '',
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
        saveProf() {
            let url = '../../src/Controller/controllerProfessor.php';
            let self = this;

            let valores = {

                'nomeProfessor': this.nomeProfessor,
                'cpfProfessor': this.cpfProfessor,
                'sexoProfessor': this.sexoProfessor,
                'matriculaProfessor': this.matriculaProfessor,
                'ingresso': this.ingresso,
                'salario': this.salario
            };

            if (!isValidProf()) {
                alert('Preencha todos os campos obrigatórios!');
                return false;
            }
            $.post(url, valores, function (data) {
                self.statusCadastro = true;
                if (data.status) {
                    self.erroCadastro = false;
                    self.mensagem = data.msg;

                    self.nextId();
                    self.nomeProfessor = '';
                    self.cpfProfessor = '';
                    self.sexoProfessor = '';
                    self.ingresso = '';
                    self.salario = '';
                    self.matriculaProfessor = '';

                } else {
                    self.erroCadastro = true;
                    self.mensagem = data.msg
                }
            });
        },

        editProf(){
            let url = '../../src/Controller/controllerProfessor.php';
            let self = this;

            let valores = {
                'idProfessor': this.id,
                'idPessoa': this.dados.pessoa,
                'nomeProfessor': this.nomeProfessor,
                'cpfProfessor': this.cpfProfessor,
                'sexoProfessor': this.sexoProfessor,
                'matriculaProfessor': this.matriculaProfessor,
                'ingresso': this.ingresso,
                'salario': this.salario,
                'editar': true
            };

            if (!isValidProf()) {
                alert('Preencha todos os campos obrigatórios!');
                return false;
            }
            $.post(url, valores, function (data) {
                self.statusCadastro = true;
                if (data.status) {
                    self.erroCadastro = false;
                    self.mensagem = data.msg;

                } else {
                    self.erroCadastro = true;
                    self.mensagem = data.msg
                }
            });
        },

        getData() {
            let url = '../../src/Controller/controllerProfessor.php?getData&id=' + this.professor;

            let self = this;

            $.get(url, {}, function (data) {
                self.dados = data[0];

                self.id = data[0].id;
                self.nomeProfessor = data[0].nome;
                self.cpfProfessor = data[0].cpf;
                self.matriculaProfessor = data[0].matricula;
                self.sexoProfessor = data[0].sexo;
                self.ingresso = data[0].ingresso;
                self.salario = data[0].salario;
            });
        },

        nextId() {
            let url = '../../src/Controller/controllerProfessor.php?nextId';
            let self = this;

            $.get(url, function (data) {
                self.id = data.nextId;
            });

        },
    },

    mounted() {
        if (this.professor === 0) {
            this.nextId();
        } else{
            this.getData();
        }
    }
});