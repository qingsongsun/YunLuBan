$(function(){
	

$('body').on("click",'.scjq',function()
    {
    	       
        var D=$(this).attr("rel");
       
        if(D == 'scoff') 
        {
        var txt = '已收藏'	
        $(this).html(txt);
        $(this).addClass("scon").attr("rel","scon");
        
        }
        else
        {
        var txt = '收藏'	
        $(this).html(txt);
        $(this).removeClass("scon").attr("rel","scoff");
    
        }


    });
     

     
$('body').on("click",'.dzjq',function()
    {
    	

        var C=parseInt($(this).html());
        
        var D=$(this).attr("rel");
       
        if(D == 'dzoff') 
        {      
        $(this).html(C+1);
        $(this).addClass("dzon").attr("rel","dzon");
        
        }
        else
        {
        $(this).html(C-1);
        $(this).removeClass("dzon").attr("rel","dzoff");
    
        }


    });





	 
	

    
    
	
	
	});
