<?= $this->Html->script(['query.js'])?>
<?php  
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OperationsCab $operationsCab
 */
?>
<ul class="nav">
        <li class="nav-item">
            <a class="btn btn-outline-secondary" href="..">Volver</a>
        </li>
    </ul>
<div class="row">
    <nav class="col-md-3">
        <ul class="side-nav">
            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('List Operations'), ['action' => 'index']) ?></li>        
        </ul>
        
        <div id=div_button_add_articles>
        </div>
        TOTAL <input type="text" id="total" readonly="true"/>
        <button class="btn btn-primary" onclick="pushData()">Agregar</buton>
        
    </nav>
    <div class="col-md-9">
        <fieldset>
            <legend><?= __('Add Operations') ?></legend>
            <?php
                $type_op = $_GET['operation_type'];
                ?>
                <div class="form-group">           
                <?= $this->Form->control('user_id', ['options' => $users,'class'=>'form-control']); ?>
                </div>
                <div clas="form-group">
                    <?= $this->Form->control('operation_type', ['default'=>$type_op,'readonly' => 'readonly','class'=>'form-control']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('article_id',  ['options' => $articles,'empty' => '(elegir uno)','onchange' =>'articlePrice(this)','class' => 'form-control']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('quantity',['type'=>'number','class' => 'form-control']); ?>
                </div>                         
        
            PRECIO: S/.<div id="articlePrice"></div>
        </fieldset>
        <h1><div id="mensaje"></div></h1>
        <button class="btn btn-primary" onclick="accept()">ACEPTAR</buton>
    </div>
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