<?= $this->Html->script(['query.js'])?>
<?php  
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OperationsCab $operationsCab
 */
?>
<?php $this->start('navbar') ?>
<ul class="navbar navbar-dark bg-dark navbar-expand-smg">
    <a class="navbar-brand" href="..">Volver</a>
</ul>
<?php $this->end() ?>
<div class="row">
    <nav class="col-md-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link disabled"> <?= __('Actions') ?> </a>
            </li>  
        </ul>
        <div id=div_button_add_articles>
        </div>
        <div class="nav-item">
            Total
        </div>
        <div class="nav-item">
            <input type="text" id="total" readonly="true"/>
        </div>
        <div class="nav-item">
            <button class="btn btn-primary" onclick="pushData()">Agregar Producto</button>
        </div>
    </nav>
    <div class="col-md-9">
    <form>
        <fieldset>
            <legend><?= __('Register Sale') ?></legend>
            <?php
                $type_op = $_GET['operation_type'];
                echo $type_op;
                ?>
                <div class="form-group">   
                    <label><?= __("User") ?></label>        
                    <?= $this->Form->select('user_id', $users,['class'=>'form-control','id'=>'user-id']); ?>
                </div>
                <div class="form-group">
                    <label><?= __("Operation Type")?></label>
                    <?= $this->Form->text('operation_type', ['default'=>$type_op,'readonly' => 'readonly','class'=>'form-control','id'=>'operation-type']); ?>
                </div>
                <div class="form-group">
                    <label><?= __("Article") ?></label>
                    <?= $this->Form->select('article_id', $articles ,['empty' => '(elegir uno)','onchange' =>'articlePrice(this)','class' => 'form-control','id'=>'article-id']); ?>
                </div>
                <div class="form-group">
                    <label><?= __("Quantity") ?></label>
                    <?= $this->Form->text('quantity',['type'=>'number','class' => 'form-control','id'=>'quantity']); ?>
                </div>                         
                <?php __("PRECIO: S/.")?><div id="articlePrice"></div>
        </fieldset>
        <h1><div id="mensaje"></div></h1>
        <button class="btn btn-primary" onclick="accept()">ACEPTAR</buton>
     </form>
</div>
<script>
    var myArr = [[]];
    var i = 0;
    var result = 0;      
    function pushData(){
        var quantity = document.getElementById('quantity').value;
        var inputTextArticle = document.getElementById('article-id');            
        var strArticle = inputTextArticle.options[inputTextArticle.selectedIndex].text;                 
        if (quantity < 1 ){
            alert ('INGRESE CANTIDAD');
            return false;
        }
        else if (strArticle == "(elegir uno)" ){
            alert ('Seleccione Articulo');
            return false;
        }
        else{            
            var userId = document.getElementById('user-id');
            var operationType = document.getElementById('operation-type');            
            var articlePrice = document.getElementById('articlePrice').innerHTML;
            console.log(parseInt(articlePrice));

            myArr[i]=new Array;
            myArr[i].push(i);
            myArr[i].push(parseInt(userId.value));
            myArr[i].push(operationType.value);
            myArr[i].push(inputTextArticle.value);
            myArr[i].push(quantity);            

            var label_name_article = document.createElement("label");        
            label_name_article.innerHTML = strArticle + " * "+quantity +" = " + (quantity *parseFloat(articlePrice));
            label_name_article.id = i;

            var button = document.createElement("input");
            button.type ="button";
            button.value ="X";
            button.id = i;
            button.className ="btn btn-secondary";


            button.onclick = function() {                
                var elem = document.getElementById(this.id);                
                for(var j = 0; j < myArr.length ; j++){
                    
                    if( myArr[j] != undefined){                     
                        if (myArr[j][0] == this.id){                        
                            myArr.splice(j, 1);

                        }
                    }
                }
                var n = elem.innerHTML.split(" ");
                n =  n[n.length - 1];

                elem.parentNode.removeChild(elem);                
                this.parentNode.removeChild(this);          
                $('#total').attr('value', function() {                
                    result = result - parseFloat(n);            
                    return result ;
                });      
                
            };

            var div_button = document.getElementById("div_button_add_articles");
            div_button.appendChild(label_name_article);     
            div_button.appendChild(button);
            i++;

            $('#total').attr('value', function() {                
                result = result + quantity *parseFloat(articlePrice);            
                return result;
            });
            console.log(myArr);            
        }
    }
    function articlePrice(sel) {
        var price = sel.options[sel.selectedIndex].value;
        var operationType = document.getElementById('operation-type');  
        if (operationType.value == "comprar")      
            $.ajax({
                    headers: {
                        'X-CSRF-Token': '<?= h($this->request->getParam('_csrfToken')); ?>'
                    },
                    type: 'get',                    
                    url : "<?= $this->Url->build( [ 'controller' => 'Articles', 'action' => 'comprarprice' ] ); ?>",
                    data : {
                        keyword:parseInt(price)                        
                    },                              
                    success: function( response )
                    {       
                        document.getElementById("articlePrice").innerHTML = response;
                        console.log(response);
                    }
                });
        if (operationType.value == "vender")      
            $.ajax({
                    headers: {
                        'X-CSRF-Token': '<?= h($this->request->getParam('_csrfToken')); ?>'
                    },
                    type: 'get',                    
                    url : "<?= $this->Url->build( [ 'controller' => 'Articles', 'action' => 'price' ] ); ?>",
                    data : {
                        keyword:parseInt(price)                        
                    },                              
                    success: function( response )
                    {       
                        document.getElementById("articlePrice").innerHTML = response;
                        console.log(response);
                    }
                });
        
    }
    function accept() { 
        if( myArr[0][0] == undefined){
            alert("no hay articulos");
            return false;
        }        
        $.ajax({
                    headers: {
                        'X-CSRF-Token': '<?= h($this->request->getParam('_csrfToken')); ?>'
                    },
                    type: 'get',                    
                    url : "<?= $this->Url->build( [ 'controller' => 'OperationsCab', 'action' => 'accept' ] ); ?>",
                    data : {
                        keyword:myArr                        
                    },                              
                    success: function( response )
                    {   
                        document.getElementById("mensaje").innerHTML = response;
                        console.log(myArr);
                        window.location.replace("../");
                    }
                });
        
    }
</script>