<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <?php include 'imports.php'; ?>
  </head>
  <body>
      <div class="container-fluid">
        <div class="row principal">
          <div class="col-sm-7 ladoA"> 
              <div class="col-sm-7 desc"> 
                  <p> Olá,</p>
                  <p>Você esta acessando o <a> Convenia </a> que oferece descontos e vantagens em mais de 5.000 estabelecimentos.
                 Economize na compra de produtos e serviços de marcas que interessam. </p>
              </div>
              <div class="col-sm-4"></div>
              <form>
                  <div class="form-group col-sm-6">
                      <input type="text"  class = " form-control validacpf" onblur="return verificarCPF(this.value)" class="form-control " id="cpf" placeholder="Ativar CPF">
                  </div>
                  <div class="form-group  col-sm-6">
                      <button type="button" class="btn botao btn-success">Ok</button>
                   </div>
              </form>
              <form>
                  <div class="form-group col-sm-12">
                      <label for="exampleInputEmail1">Se você já possui o cadastro, <a>faça o login</a></label>
                  </div>
                  <div class="form-group col-sm-4">
                      <input type="email" class="form-control " id="email" placeholder="e-mail">
                  </div>
                  <div class="form-group col-sm-4">
                      <input type="password" class="form-control " id="senha" placeholder="senha">
                  </div>  
                  <div class="form-group  col-sm-4">
                      <button type="button"  class = "btn botao btn-success" id="btn-salvar" >Entrar</button>
                  </div>
                  <div class="form-group  col-sm-12">
                      <a>Esqueci a senha</a>
                  </div>
              </form>
          </div>
          <div class="col-sm-5 ladoB"> 
                <img src="img/Convenia - Icon.png" class = "img-responsive" >
          </div>
        <footer>
            <?php include 'rodape.php'; ?>
       </footer>
      </div>
    </div>
  </body>
</html>
<script>
      $(document).ready(function() {
         $('#btn-salvar').click(function(){
         salvarUsuario()
       });
     });
     $(document).ready(function () { 
        var $seuCampoCpf = $("#cpf");
        $seuCampoCpf.mask('000.000.000-00', {reverse: true});
    });
    function salvarUsuario() {
        console.log('salvar');
        var usuario = {
          email: $('#email').val(),
          password: $('#senha').val()
        }
      console.log(usuario);
      var response = $.ajax({
        url : 'https://convenia-front-end-test.firebaseio.com/users.json',
        type : 'POST',
        data: JSON.stringify(usuario)
       });
      response.done(function(data) {
        console.log(data)
        document.getElementById('email').value=''; 
        document.getElementById('senha').value=''; 
       alert("Usuario enviado ");
       });
      response.fail(function(data) {
        console.log(data)
        });
    
    }
  function verificarCPF(c){
    c = c.replace(/[^\d]+/g,''); 
    if (c == "00000000000" || 
        c == "11111111111" || 
        c == "22222222222" || 
        c == "33333333333" || 
        c == "44444444444" || 
        c == "55555555555" || 
        c == "66666666666" || 
        c == "77777777777" || 
        c == "88888888888" || 
        c == "99999999999"){
          $(".validacpf").removeClass("certo");
          $(".validacpf").addClass("error");
          v = true;
       return false;
    }
    var i;
    s = c;
    var c = s.substr(0,9);
    var dv = s.substr(9,2);
    var d1 = 0;
    var v = false;
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(10-i);
    }
    if (d1 == 0){  
        $(".validacpf").removeClass("certo");
        $(".validacpf").addClass("error");
        v = true;
        return false;
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(0) != d1){  
        $(".validacpf").removeClass("certo");
        $(".validacpf").addClass("error");
        v = true;
        return false;
    }
    d1 *= 2;
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(11-i);
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(1) != d1){  
        $(".validacpf").removeClass("certo");
        $(".validacpf").addClass("error");
        v = true;
        return false;
    }
    if (!v) {
        $(".validacpf").removeClass("error");
        $(".validacpf").addClass("certo");
    }
}
</script>
