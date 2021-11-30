<div class="rtr-block1">
    <div class="rtr-screen">
        <!-- Slideshow container -->
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
			<?php
				for ($i = 1; $i <= 10; $i++) {
			// HTML код внутри цикла повторится 10 раз:
			?>
				<div class="mySlides fade">
					<div class="numbertext"><?=$i?> / 10</div>
					<img src="images/slide_<?=$i?>.jpg" style="width:100%">
				</div>
			<?php
				}
			?>

            <!-- Next and previous buttons -->
            <a class="prev button" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next button" onclick="plusSlides(1)">&#10095;</a>
        </div>

        <!-- The dots/circles -->
        <div class="dots">
			<?php
				for ($i = 1; $i <= 10; $i++) {
					echo ' <span class="dot button" onclick="currentSlide(' .$i. ')"></span> ';
				}
			?>
        </div>
    </div>
</div>

<div class="rtr-block2">
    <div class="rtr-text">
        <h3>Хотите защитить автомобиль от угона?</h3>
        <p>Не многие знают, что самый простой и эффективный сбособ защитить свой автомобиль - это сделать противоугонную маркировку стекол.</p>
        <p>Суть такого способа заключается в том, что ворам просто не выгодно угонять такой автомобиль, а значит, они его будут обходить стороной.</p>
        <p>Вы можете в удобное для вас время установить такую защиту на специализированном сервисе, со скидкой в размере 15%, сделав предварительную запись на нашем сайте.</p>
    </div>
</div>