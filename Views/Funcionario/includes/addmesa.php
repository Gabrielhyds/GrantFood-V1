<div class="container">
    <div class="row" style="color: white;"> 
      <div align="center">
        <h3>Adicionar mesa</h5>
        <hr>
      </div>
    </div> 
</div>

<div class="container"> 
    <div class="row">
        <div style="width: 650px;">
              <form>
                <fieldset class="scheduler-border" style="border: 1px solid #3D5A80; border-radius: 4px;">
                  <legend class="scheduler-border" style="background: #3D5A80; border-radius: 4px"><span style="padding-left: 21px">Adicionar ao cardápio</span></legend>
                    <div class="control-group">
                        <table style="position: relative; bottom: 70px;">
                        <!--Produto-->
                        <tr>
                        <div class="input-group mb-3">
                            <td><button class="btn btn-primary" type="button" id="button-addon1" style="width: 150px" disabled><span class="texto">Produto</span></button></td>
                            <td><input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" style="position: relative; top: 5px; left: 5px; width: 420px"></td>
                        </div>
                        </tr>

                        <!--Descrição-->
                        <tr>
                        <div class="input-group mb-3">
                            <td><button class="btn btn-secondary" type="button" id="button-addon1" style="width: 150px" disabled><span class="texto">Descrição</span></button></td>
                            <td><input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" style="position: relative; top: 5px; left: 5px"></td>
                            <td></td>
                        </div>
                        </tr>

                        <!--Categoria-->
                        <tr>
                        <div class="input-group mb-3">
                            <td><button class="btn btn-outline-success" type="button" id="button-addon1" style="background: red; border: 1px solid red; color: white; width: 150px" disabled><span class="texto">Categoria</span></button></td>
                            <td><input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" style=" position: relative; top: 5px; left: 5px"></td>
                            <td></td>
                        </div>
                        </tr>


                        <!--Preço-->
                        <tr>
                        <div class="input-group mb-3">
                            <td><button class="btn btn-outline-success" type="button" id="button-addon1" style="background-color: green; color: white; width: 150px" disabled><span class="texto">Preço</span></button></td>
                            <td><input type="number" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" style="width: 150px; position: relative; top: 5px; left: 5px"></td>
                            <td style="position: relative; top: 5px; right: 300px; color: black;">R$</td>
                        </div>
                        </tr>

                        <!--Inserir Imagem-->
                         <tr>
                            <div class="input-group mb-3">
                              <td><button class="btn btn-warning" type="button" id="button-addon1" style=" color: white; width: 150px" disabled><span class="texto">Insira a imagem</span></button></tc>
                              <td><input type="file" class="form-control-file" id="exampleFormControlFile1" style="margin-left:5px;border:none;"></td>
                            </div>
                         </tr>

                          <!--Inserir e Remover-->
                          <tr>
                            <div class="btn" >
                              <td style="position: relative;  top: 20px"><button type="button" name="mesa" class="btn btn-success" style="font-family: arial; font-weight: bold"><span class="fa fa-plus mr-1"></span>Adicionar</button>
                            </div>
                            <div class="btnExcluir" style="position: relative; left: 150px; bottom: 58px">
                              <button type="reset" name="mesa" class="btn btn-danger" style="font-family: arial; font-weight: bold"><span class="fa fa-trash mr-1"></span>Limpar</button></td>
                            </div>
                          </tr>
                        </table>
                    </div>
                </fieldset>
              </form>
        </div>
    </div>
</div>