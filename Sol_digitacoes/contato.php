<?php include "includes/cabecalho.php" ?>

    <p>Para acessar pagina inicial de usuarios, clique: <a href="entrada.php">Pagina inicial</a></p>
    <hr>

    <h2>Duvidas sobre cadastro</h2>
    <hr>

    <p> Entre em contato no telefone: <a href="tel:(11)21350300">11-2135-0300</a>, para esclarecer as duvidas, ou preencha formulario abaixo.</p>
        
        <article class="conteudo limitador">
           
            <!-- Formulario contato -->
            <!-- Action - Envio ao formspree.io (envio de dados para o email cadastrado no site) -->         

            <form id="my-form" action="https://formspree.io/f/mrgjydnw" method="post">
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" required>
                </div>

                <div>
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div>
                    <!-- instrução do caixa (Data de nascimento:)  -->
                    <!-- for será igual id -->
                    <div>
                        <label for="nascimento">Data de nascimento:</label>
                        <input type="date" name="nascimento" id="nascimento">
                    </div>

                    <!-- instrução do caixa (Idade:)  -->
                    <!-- for será igual id -->
                    <div>
                        <label for="idade">Idade:</label>
                        <input type="number" name="idade" id="idade" min="18" max="100" placeholder="Idade é" disabled>
                    </div>

                        <p> <b> Obs.: Limite de 18 anos até 100 anos.</b> </p>

                </div>

                <!-- instrução do caixa (Telefone:)  -->
                <!-- for será igual id -->
                    
                <div>
                    <label for="celular">Celular:</label> 
                    <input type="tel" name="celular" id="celular">     
                </div>

                <div>
                    <label for="telefone">Telefone fixo:</label> 
                    <input type="tel" name="telefone" id="telefone">     
                </div> 


                <div>
                    <p>Sexo:</p>
                    
                    <input value="Masculino" type="radio" name="sexo" id="masculino">
                    <label for="masculino">Masculino</label>

                    <input value="Feminino" type="radio" name="sexo" id="feminino">
                    <label for="feminino">Feminino</label>
                </div>

                <div>
                    <p>Interesses:</p>
                    
                    <input value="Design" type="checkbox" name="interesses" id="design">
                    <label for="design">Design</label>

                    <input value="Marketing" type="checkbox" name="interesses" id="marketing">
                    <label for="marketing">Marketing</label>

                    <input value="Programação" type="checkbox" name="interesses" id="programacao">
                    <label for="programacao">Programação</label>
                </div>


                <!-- INÍCIO HTML PARA CEP/ENDEREÇO -->
                <div>
                    <label for="cep">CEP:</label>
                    <input type="text" id="cep" name="cep" maxlength="9" required>
                    <p></p>
                    <button id="localizar-cep">Localizar</button>
                    <b id="status"></b>
                </div>
                <div>
                    <label for="endereco">Endereço:</label>
                    <input type="text" id="endereco" name="endereco" size="30">
                </div>
                <div>
                    <label for="bairro">Bairro:</label>
                    <input type="text" id="bairro" name="bairro">
                </div>
                <div>
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade">
                </div>
                <div>
                    <label for="estado">Estado:</label>
                    <input type="text" id="estado" name="estado">
                </div>
                <!-- /FIM HTML PARA CEP/ENDEREÇO -->



                <div>
                    <label for="assunto">Assunto:</label>
                    <select name="assunto" id="assunto">
                        <option></option> <!-- deixe vazio de propósito -->
                        <option>Dúvidas</option>
                        <option>Elogios</option>
                        <option>Reclamações</option>
                        <option>Outros</option>
                    </select>
                </div>

                <div>
                    <label for="mensagem">Mensagem: 
                        <span id="maximo"> (restam <b id="caracteres">100</b> caracteres)</span>
                    </label> <br>
                    <textarea maxlength="100" name="mensagem" id="mensagem" cols="25" rows="5"></textarea>
                </div>
    
                <button type="submit">Enviar</button>
                <!-- também poderia usar:
                <input type="button" value="Enviar"> -->
    
                <p id="my-form-status"></p>
    
                
            </form>
            </article>
            

        <!-- Para calcular caracteres do campo mensagem -->
        <!-- <script src="js/vanilla-masker.min.js"></script> -->
        <!-- <script src="js/scripts.js"></script> -->


<?php include "includes/rodape.php" ?>