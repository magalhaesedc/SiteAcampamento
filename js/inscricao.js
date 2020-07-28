
//CALCULAR IDADE
function calculaIdade(dataNasc){ 

    var dataAtual = new Date();
    var anoAtual = dataAtual.getFullYear();
    var anoNascParts = dataNasc.split('-');
    var anoNasc = anoNascParts[0];
    var mesNasc = anoNascParts[1];
    var diaNasc = anoNascParts[2];
    console.log(diaNasc + '/' + mesNasc + '/' + anoNasc);
    var idade = anoAtual - anoNasc;
    var mesAtual = dataAtual.getMonth() + 1; 

    //Se mes atual for menor que o nascimento, nao fez aniversario ainda;  
    if(mesAtual < mesNasc){
       
       idade--;

    } else {

     //Se estiver no mes do nascimento, verificar o dia
        if(mesAtual == mesNasc){ 
            if(new Date().getDate() < diaNasc ){ 
                //Se a data atual for menor que o dia de nascimento ele ainda nao fez aniversario
                idade--; 
            }
        }
    } 
    return idade; 
}

// Função para mostrar campo de adicionar declaração e documento do responsável
var dataNascimento = document.querySelector("#data-nascimento");

dataNascimento.addEventListener("input", function(){

    var idade = calculaIdade(dataNascimento.value);
    console.log(idade);
    //console.log(dataNascimento.value);
    var div_declaracao = document.querySelector("#div-declaracaoResponsabilidade");
    var div_documento = document.querySelector("#div-documentoResponsavel");
    var declaracao = document.querySelector("#declaracaoResponsabilidade");
    var documento = document.querySelector("#documentoResponsavel");
    
    if(idade < 18){
        div_declaracao.classList.remove("d-none");
        div_documento.classList.remove("d-none");
        declaracao.setAttribute('required', '');
        documento.setAttribute('required', '');
    }else{
        div_declaracao.classList.add("d-none");
        div_documento.classList.add("d-none");   
        declaracao.removeAttribute("required");
        documento.removeAttribute("required");
    }

});


//Verificar confirmar senha
var senha1 = document.querySelector("#senha");
var senha2 = document.querySelector("#confirmar-senha");

senha2.addEventListener("input", function(){
    
    if(senha1.value != senha2.value){
        senha2.setCustomValidity("erro")
    }else{
        senha2.setCustomValidity("")
    }

    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if(senha1.value != senha2.value){
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });

});

//Verificar Email Repetido ----------------------------------

var email1 = document.querySelector("#email");
var email2 = document.querySelector("#confirmar-email");

email1.addEventListener("input", function(){
    setarResultadoEmail();
});

email2.addEventListener("input", function(){
    setarResultadoEmail();

});




//-----------------------------------------------------------


$(document).ready(function(e) {

    $("form[ajax=true]").submit(function(e) {
        
        var email_input1 = document.getElementById('email');
        var email_input2 = document.getElementById('confirmar-email');
        
        if(email_input1.value != email_input2.value){
        email_input2.setCustomValidity("erro");
        }else if(email_input1.value != email_input2.value){
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                form.classList.add('was-validated');
              }, false);
            });

        }else{
            email_input2.setCustomValidity("");

            var resultado = document.getElementById('resultado-email').innerText;
        
            if(resultado == "livre"){
                var mensagem1 = document.getElementById('mensagem-confirmar-email1');
                var mensagem2 = document.getElementById('mensagem-confirmar-email2');
                mensagem1.classList.remove("d-none");
                mensagem2.innerText = "Os e-mails precisam ser iguais. Digite um e-mail válido";
                email_input1.setCustomValidity("");
                email_input2.setCustomValidity("");
            }else if(resultado == "usando"){
                e.preventDefault();
                var mensagem1 = document.getElementById('mensagem-confirmar-email1');
                var mensagem2 = document.getElementById('mensagem-confirmar-email2');
                mensagem1.classList.add("d-none");
                mensagem2.innerText = "Esse e-mail já está cadastrado";
                var email_input1 = document.getElementById('email');
                var email_input2 = document.getElementById('confirmar-email');
                email_input1.setCustomValidity("erro");
                email_input2.setCustomValidity("erro");
            }else{
                e.preventDefault();
            }
        }
        
    });  
});

//Verificar se o e-mail não já está cadastrado no Banco de Dados -----------------------
function setarResultadoEmail() {
    var email1 = document.querySelector("#email").value;
    var email2 = document.querySelector("#confirmar-email").value;
    $.post("verificar-email.php", {email1: email1, email2: email2}, function(retorna){
        $('#div-resultado-email').html(retorna);
    });
}
//--------------------------------------------------------------------------------------


//Verificar outro responsável
document.getElementById('responsavel').onclick = function() {
    
    var div_responsavel = document.querySelector("#div-responsavel");
    var nomeResponsavel = document.querySelector("#nomeResponsavel");
    var celularResponsavel = document.querySelector("#celularResponsavel");
    var celularResponsavel_sim = document.querySelector("#celularResponsavel-sim");
    var celularResponsavel_nao = document.querySelector("#celularResponsavel-nao");
    var parentesco = document.querySelector("#parentesco");

    if (this.checked) {
        div_responsavel.classList.remove("d-none");
        nomeResponsavel.value = "";
        nomeResponsavel.setAttribute('required', '');
        celularResponsavel.value = "";
        celularResponsavel.setAttribute('required', '');
        celularResponsavel_sim.checked = false;
        celularResponsavel_sim.setAttribute('required', '');
        celularResponsavel_nao.checked = false;
        celularResponsavel_nao.setAttribute('required', '');
        parentesco.value = "";
        parentesco.setAttribute('required', '');
        console.log("Marcado");
    } else {
        div_responsavel.classList.add("d-none");
        nomeResponsavel.removeAttribute("required");
        celularResponsavel.removeAttribute("required");
        celularResponsavel_sim.removeAttribute("required");
        celularResponsavel_nao.removeAttribute("required");
        parentesco.removeAttribute("required");
        console.log("Desmarcado");
    }
};



