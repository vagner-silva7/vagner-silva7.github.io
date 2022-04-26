/*  JavaScript lendo o dia/mes/ano de hoje, e posteriormente
calculando a idade com referencia, com a data de 
aniversario */

/* Data atual */

const hoje = new Date()

const dia = hoje.getDate().toString().padStart(2,'0')

// console.log(dia)

const mes = String (hoje.getMonth()+1).padStart(2,'0')

// console.log(mes)

const ano = hoje.getFullYear()

// console.log(ano)

const dataAtual = `${dia}/${mes}/${ano} `

// console.log(dataAtual)


/*  Data de nascimento */

const formularioA = document.querySelector("form");
const inputnascimento = formularioA.querySelector("#nascimento");
const bstatusnascimento = formularioA.querySelector("#statusnascimento");

console.log(nascimento)

let idade = (dataAtual - nascimento) / 365

    if ( idade < 18 ){
        bstatusnascimento = ("menor de idade, inscrição no curso somente com autorização dos pais ou responsaveis")
    }
