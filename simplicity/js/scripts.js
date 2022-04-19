// console.log("script de contatos");

/* JS INICIAL PARA CEP/ENDEREÇO */
const formulario = document.querySelector("form");
const inputCep = formulario.querySelector("#cep");
const inputTelefone = formulario.querySelector("#telefone");
const inputEndereco = formulario.querySelector("#endereco");
const inputBairro = formulario.querySelector("#bairro");
const inputCidade = formulario.querySelector("#cidade");
const inputEstado = formulario.querySelector("#estado");
const bStatus = formulario.querySelector("#status");
const botaoLocalizar = formulario.querySelector("#localizar-cep");

// Criar evento botão localizar - click
botaoLocalizar.addEventListener("click", function(event){
    event.preventDefault();

    // Pesquisar no site webservice.com.br e as exigencia para pesquisa, resposta será em objeto do javascript - formato json

    // pegar cep digitado no formulario .value na variavel
    let cep = inputCep.value;

    // enviar cep padrão da API webservice.com.br - formato json
    let url = `https://viacep.com.br/ws/${cep}/json/`;

    // console.log(url); teste realizado

    
    
    // Processo Ajax: ou comunicação assincrona com o viaCep. Processo a resposta do cep sem recarregar a pagina (função fetch)

    // 1) Acessar a conexão com a API (viaCep)
    fetch(url)
    
        // 2) Recuper a resposta desse acesso no formato json
        .then(resposta => resposta.json())
        
            // 3) E então, mostre os dados
            .then(dados => {

                if("erro" in dados){
                    bStatus.innerHTML = "Cep não encontrado";
                    // focus aparece mensagem
                    inputCep.focus();
                } else {
                    bStatus.innerHTML = "Cep encontrado";
                    inputEndereco.value = dados.logradouro;
                    inputBairro.value = dados.bairro;
                    inputCidade.value = dados.localidade;
                    inputEstado.value = dados.uf;
                }
            });


});



// Biblioteca ou lib (vanillamasker) para ajustar cep

// https://github.com/vanilla-masker/vanilla-masker/

// download script

// minified version

// aparecera script, salvar todo o script com botão direito

// Olhar documentação antes de usar a biblioteca e as funções

VMasker(inputCep).maskPattern("99999-999");
VMasker(inputTelefone).maskPattern("(99) 9999-9999");

// Se for celular acrescentar mais 9. exemplo: ("(99) 99999-9999")


