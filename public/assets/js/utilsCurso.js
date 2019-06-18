function saveCurso() {

    let url = '../../src/Controller/controllerCurso.php';
    let valores = {
        'nomeCurso': $('#nomeCurso').val(),
        'capacidade': $('#capacidade').val()
    };


    if(!isValidCurso()){
        alert('Existem campos em branco!')

        return false;
    }
    $.post(url, valores, function (data) {
        if(data.status == true){
            alert(data.msg);
            window.open('home.php', '_self');
        } else {
            alert(data.msg);
        }
    });
    // alert('Salvo')
}

function deleteProf(id){

    let teste = confirm('Tem certeza que deseja excluir este cadastro?');

    if (!teste) {
        return false;
    }

    let url = 'control/controlProdutos.php';
    let dados = {
        'id': id,
        'excluir': true
    };

    $.post(url, dados, function(result){
        if (result.status == true) {
            window.open('index.php', '_self');
        } else {
            alert(result.msg);
        }
    });

}

function showFormProf(id) {
    let url = 'control/controlViewProd.php?id= ' + id;

    $.get(url,function (data) {
        if (data.status){
            $('#idStr').html(data.id);
            $('#nomeProdutoStr').html(data.nomeProduto);
            $('#categoriaStr').html(data.categoria);
            $('#valorStr').html(data.valor);
            $('#estoqueStr').html(data.estoque);

            $('#modalViewProd').modal('toggle');
        }  else {
            alert('Erro ao tentar localizar cadastro da pessoa!')
        }

    });

}

function isValidCurso() {
    let campos = $('.required');
    let isValid = true;

    for (let i = 0; i < campos.length; i++){
        if (campos[i].value == ''){
            isValid = false;
        }
    }
    return isValid;
}