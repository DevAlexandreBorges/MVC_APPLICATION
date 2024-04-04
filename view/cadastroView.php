<html>
<link rel="stylesheet" href="index.css">
<link rel="stylesheet" href="cadastro.css">
<body>
    

<div id="" class="formsCadastro">
    <form action="" id="Cadastro">
        <h1>Cadastro de produtos</h1>
        <div class="boxfixing">
        <div class="input1">
            <label   for="">Nome:</label>
            <input  id="nameInput" class="inputNameDescricao" type="text" name="produto">
            <label for="">Descrição:</label>
            <input id="descriptionInput"class="inputNameDescricao" type="text" name="descricao">
        </div>
        <div class="input2">
            <label  for="">Quantidade:</label>
            <input id="quantInput" type="number" name="quantidade">
            <label for="">Valor:</label>
            <input  id="valueInput" type="number" name="valor">
        </div>
        <div class="input3"> 
            <label for="">Categoria:</label>
            <select  id="selectInput" name="" id="">
            <option selected></option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
            </select>
        </div>
        <div class="btns">
        <input id="btnEditar" type="submit" value="Editar">
        <input  id="btnSalvar"type="submit" value="Salvar">
        <input  id="btnCancelar"type="submit" value="Cancelar">        
        </div>
        </div>
    </form>
</div>
</body>
</html>