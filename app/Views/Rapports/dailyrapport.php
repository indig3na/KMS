<?php $this->layout('layoutsystem', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
<h2>My day today</h2>

<p>name:</p>
<p>date:</p>

<form action="" method="get">

    <h3> I was</h3>
    <input type="radio" name="answer1" value="blue" checked="checked">blue<br>
    <input type="radio" name="answer1" value="red">red<br>
    <input type="radio" name="answer1" value="green">green<br>

    <h3>Q2. The sum of two and three equals...</h3>
    <input type="radio" name="answer2" value="seven">seven<br>
    <input type="radio" name="answer2" value="six">six<br>
    <input type="radio" name="answer2" value="five" checked="checked" >five<br>

    <h3>Q3. Which of these animals is NOT an mammal.</h3>
    <input type="radio" name="answer3" value="lizard" checked="checked">lizard<br>
    <input type="radio" name="answer3" value="monkey">monkey<br>
    <input type="radio" name="answer3" value="dog">dog<br>

    <h3>Q4. Santa Claus is most associated with this holiday.</h3>
    <input type="radio" name="answer4" value="Halloween">Halloween<br>
    <input type="radio" name="answer4" value="Christmas"checked="checked">Christmas<br>
    <input type="radio" name="answer4" value="Fourth of July">Forth of July<br>
    <br>
    <input type="submit" value="Submit">
    <input type="reset" value="Reset">

<?php $this->stop('main_content') ?>
