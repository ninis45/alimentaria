(function($) {
	$(function(){
	   
       $('#ddlEstado').on('change',function(){
           $.get(SITE_URL+'admin/localidades/municipios/lista/'+$(this).val(),{},function(response){
                var result = response;
                var html = '<option value> [ Seleccionar ]</option>';
                $.each(result,function(index,data){
                    html +='<option value="'+data.iIdMunicipio+'">'+data.cNombre+'</option>';
                });
                $('#ddlMunicipio').html(html);
                //console.log(result.length)
            
           });
        
        
       });
       
    });
	   
       
})(jQuery);