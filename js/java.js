$(document).on('ready', function () {

    $('.firstanime').on('click', function () {
        $('.anime').toggle(350);
        $("anime").toggle(350);
    });
    $('.secondanime').on('click', function () {
        $('.anime2').toggle(350);
        $("anime2").toggle(350);
    });

    var items = ["Give us a call, please...", "<span style= 'color: white'> Give us a call, I am begging you...</span>", "I said Give us a call !!!!",  "<span style= 'color: white'>Do you see me ???</span>","Do you hear me ???","<span style= 'color: white'>You must be blind or deaf !!!</span>",
            "Give us a call, please...", "<span style= 'color: white'> Give us a call, I am begging you...</span>"
          ],
        $text = $( '#change' ),
        delay = 0.6; //seconds

    function loop ( delay ) {
        $.each( items, function ( i, elm ){
            $text.delay(delay*1500).fadeOut();
            $text.queue(function(){
                $text.html( items[i] );
                $text.dequeue();
            });
            $text.fadeIn();
            $text.queue(function(){
                if(i == items.length-1){
                    loop(delay);
                }
                $text.dequeue();
            });
        });
    }

    loop(delay);



});


