<?php
session_start();
include "connection.php";
$date=date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date."+ $_SESSION[exam_time] minutes"));
include "header.php";
?>


<title>Adroit</title>
     <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px; background-image:url(img3.png);">

        <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">

<?php
$correct = 0;
$wrong = 0;

if (isset($_SESSION["answer"])) {
    for ($i = 1; $i <= sizeof($_SESSION["answer"]); $i++) {
        $answer = "";
        $res = mysqli_query($link, "SELECT * FROM questions WHERE category='$_SESSION[exam_category]' && question_no=$i");
        while ($row = mysqli_fetch_array($res)) {
            $answer = $row["answer"];
        }

        if (isset($_SESSION["answer"][$i])) {
            if ($answer == $_SESSION["answer"][$i]) {
                $correct += 1;
            } else {
                $wrong += 1;
            }
        } else {
            $wrong += 1;
        }
    }
}

$count = 0;
$res = mysqli_query($link, "SELECT * FROM questions WHERE category='$_SESSION[exam_category]'");
$count = mysqli_num_rows($res);
$wrong = $count - $correct;

// Apply negative marking
$marks_per_question = 1;
$negative_marks = $wrong * $marks_per_question;
$correct = $count - $wrong;
$correct = max(0, $correct);

echo "<br>";
echo "<br>";
echo "<center>";
echo "<h3>Total Questions = " . $count . "</h3>";
echo "<br>";
echo "<h3>Correct Answer = " . $correct . "</h3>";
echo "<br>";
echo "<h3>Wrong Answer = " . $wrong . "</h3>";
echo "<br>";
echo "<h3>Negative Marks = " . $negative_marks . "</h3>";
echo "<br>";
$total_score = max(0, $correct - $negative_marks); // Set total score to zero if negative
echo "<h3>Total Score = " . $total_score . "</h3>";

echo "<br>";



echo "<br>";

?>

<form action="" method="post">
    <input type="submit" value="Back to Home" name="home" class="btn btn-primary">
</form>


<?php
echo "</center>";

if(isset($_POST["home"]))
{
    unset($_SESSION["answer"]);
    echo "<script>window.location.href='select_exam.php';</script>";
}
?>









        </div>

    </div>

<?php




if(isset($_SESSION["exam_start"]))
{

    $date=date("Y-m-d");
mysqli_query($link,"insert into exam_results(id,username,exam_type,total_question,correct_answer,wrong_answer,exam_time)values(NULL,'$_SESSION[username]','$_SESSION[exam_category]','$count','$correct','$wrong','$date')") or die(mysqli_error($link));

}

if(isset($_SESSION["exam_start"]))
{

    unset($_SESSION["exam_start"]);
    ?>
    <script type="text/javascript">
        window.location.href=window.location.href;
    </script>
    <?php

}

?>


<?php
include "footer.php";
?>