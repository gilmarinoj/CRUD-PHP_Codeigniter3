$(document).ready(function(){
    $(document).on('submit', '#eliminararticulo', function(e){
        if(!confirm('¿Seguro que quieres borrar este artículo?')){
            e.preventDefault();
        }
    })
})

$(document).ready(function(){
    $(document).on('submit', '#eliminarcategoria', function(e){
        if(!confirm('¿Seguro que quieres borrar esta categoria?')){
            e.preventDefault();
        }
    })
})

$(document).ready(function(){
    $(document).on('submit', '#eliminarautor', function(e){
        if(!confirm('¿Seguro que quieres borrar este autor?')){
            e.preventDefault();
        }
    })
})