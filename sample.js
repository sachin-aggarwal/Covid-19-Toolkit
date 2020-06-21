var size = 100;
var s_size = 0.85 * size;
var m_size = 0.95 * size;
var s_resize = ( size - s_size )/2;
var m_resize = ( size - m_size )/2;
var image = $('#seventyfive').css('width',size);

var x = image.offset().left; 
var y = image.offset().top; 

function pulse() { 
    image.animate({ 
        width: s_size, top:x+s_resize,left:y+s_resize 
    }, 350, function() { 
        image.animate({ 
            width: size, top:x, left:y 
        }, 100, function() { 
            image.animate({ 
                width: m_size, top:x+m_resize, left:y+m_resize 
            }, 70 ,function(){ 
                image.animate({ 
                    width: size, top:x , left:y 
                }, 70, function() { 
                   pulse();  
                }); 
            });  
        }); 
    });  
}; 

pulse();