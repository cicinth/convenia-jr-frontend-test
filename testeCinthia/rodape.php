<div class="container-fluid">
    <div class="row footer">
        <div class="col-sm-2 "> 
             <h3> Parceiros </h3>
        </div>
        <div class="col-sm-6"> 
            <div id="img-container" >
                <img id="img-trocar" class = " parceiros img-responsive"></img>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="col-sm-5">  
                 desenvolvido por 
            </div>
            <div class="col-sm-7">  
                 <img src="img/Convenia - Logo.png" class = "img-responsive" >
            </div>
        </div>
</div>
<script>
    $(document).ready(function() {
        carregarImagens();
        
    });
    function criarImagem(imagem, div) {
        var imgTag = $('<img/>', {
        src: imagem.image,
        text: imagem.name,
        alt: imagem.name
        });
        imgTag.appendTo(div);

    }
    function trocarImagens(imagens, tag) {
        var totalImagens = imagens.length -1;
        var i = 0;
        setInterval(function() {
        tag.attr('src', imagens[i].image);
        i = i + 1;
        if (i >= totalImagens) {
            i = 0;
        }
        }, 2500);
    }
    function carregarImagens() {
         var response = $.ajax({
        url : 'https://convenia-front-end-test.firebaseio.com/partners.json',
        type : 'GET'
        });
        response.done(function(data) {
            trocarImagens(data, $('#img-trocar'))
        });
        response.fail(function(data) {
            console.log(data);
         });
    
    }
</script>

