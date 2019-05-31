<br><br><br>
<div class="text-info" >
   <h1 style="font-family: sans-serif">Nuestras instalacones</h1> 
</div>
<br><br>
<a title="Campo de fútbol" href="http://localhost/Centro%20Deportivo%20Benameji/views/FootbalFieldView.php">
    <article>
        <div class="item-wrapper">
            <figure>
                <div class="image" style="background-image:url(sources/cesped.jpg);"></div>
                <div class="lighting"></div>
            </figure>
            <div class="item-content">
                <h1>Campo de Fútbol</h1>
                <p>Consta un campo de fútbol 11 y dos de fútbol 7</p>
                <div class="author">Campo de Fútbol Manuel Gomez Martinez</div>
            </div>
        </div>
    </article>
</a>
<a title="Pabellon" href="http://localhost/Centro%20Deportivo%20Benameji/views/PavilionView.php">
    <article>
        <div class="item-wrapper">
            <figure>
                <img class="image" src="sources/suelo.jpg"/>
                <div class="lighting"></div>
            </figure>
            <div class="item-content">
                <h1>Pabellón Deportivo</h1>
                <p>Consta con una pista que puede servir para fútbol sala o para baloncesto</p>
                <div class="author">Pabellón Alberto Aguilar Leiva</div>
            </div>
        </div>
    </article>
</a>
<a title="Paddle" href="http://localhost/Centro%20Deportivo%20Benameji/views/PaddleView.php">
    <article>
        <div class="item-wrapper">
            <figure>
                <div class="image" style="background-image:url(sources/padel-floor.jpg);"></div>
                <div class="lighting"></div>
            </figure>
            <div class="item-content">
                <h1>Pistas de padel</h1>
                <p>Instalación compuesta por dos pistas de pádel</p>
                <div class="author"></div>
            </div>
        </div>
    </article>
</a>
<br><br><br>
<script>
    var articles = $('article > .item-wrapper'),
            lightingRgb = '255,255,255';

    articles.mousemove(function (e) {
        var current = $(this),
                x = current.width() - e.offsetX * 2,
                y = current.height() - e.offsetY * 2,
                rx = -x / 30,
                ry = y / 24,
                deg = Math.atan2(y, x) * (180 / Math.PI) + 45;
        current.css({"transform": "scale(1.05) rotateY(" + rx + "deg) rotateX(" + ry + "deg)"});
        $('figure > .lighting', this).css('background', 'linear-gradient(' + deg + 'deg, rgba(' + lightingRgb + ',0.32) 0%, rgba(' + lightingRgb + ',0) 100%)');
    });

    articles.on({
        'mouseenter': function () {
            var current = $(this);
            current.addClass('enter ease').removeClass("leave");
            setTimeout(function () {
                current.removeClass('ease');
            }, 280);
        },
        'mouseleave': function () {
            var current = $(this);
            current.css({"transform": "rotate(0)"});
            current.removeClass('enter').addClass("leave");
            $('figure > .lighting', this).removeAttr('style');
        }}
    );
</script>