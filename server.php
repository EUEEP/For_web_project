<?php
$question=$option_1=$option_2=$option_3=$option_4=$answer= $Exam_year=$Exit_model=$subject_id = "";
$dbName = "eueep";
$hostName = "localhost";
$userName="root";
$password="";

try {
    $conn = new PDO("mysql:host=$hostName;dbname=$dbName", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error while connecting to database: " . $e->getMessage();
}
//if ($_SERVER["REQUEST_METHOD"] == "POST"){
 if (isset($_POST['submit_me'])) {
  $question = $_POST['question'];
  $option_1 = $_POST['firstOption'];
  $option_2 = $_POST['secondOption'];
  $option_3 = $_POST['thirdOption'];
  $option_4 = $_POST['fourthOption'];
  $answer   = $_POST['answer'];
  $subject_id = $_POST['controll_subject_type'];
  $Exit_model = $_POST['controll_exam_type'];
  $Exam_year = 2015;

    if($Exit_model == "exit"){
      $query = "INSERT INTO exit_exam(QUESTION,OPTION_1,OPTION_2,OPTION_3,OPTION_4,ANSWER,EXAM_YEAR,SUBJECT_ID) VALUES (:QUESTION, :OPTION_1, :OPTION_2, :OPTION_3, :OPTION_4, :ANSWER, :EXAM_YEAR, :SUBJECT_ID)";
      $stmt = $conn->prepare($query);
      $stmt->execute(array(':QUESTION' => $question, ':OPTION_1' => $option_1, ':OPTION_2' => $option_2, ':OPTION_3' => $option_3, ':OPTION_4' => $option_4, ':ANSWER' => $answer, ':EXAM_YEAR' => $Exam_year, ':SUBJECT_ID' => $subject_id));
        }
    if($Exit_model == "model"){
      $query = "INSERT INTO model_exam(QUESTION,OPTION_1,OPTION_2,OPTION_3,OPTION_4,ANSWER,EXAM_YEAR,SUBJECT_ID) VALUES (:QUESTION, :OPTION_1, :OPTION_2, :OPTION_3, :OPTION_4, :ANSWER, :EXAM_YEAR, :SUBJECT_ID)";
      $stmt = $conn->prepare($query);
      $stmt->execute(array(':QUESTION' => $question, ':OPTION_1' => $option_1, ':OPTION_2' => $option_2, ':OPTION_3' => $option_3, ':OPTION_4' => $option_4, ':ANSWER' => $answer, ':EXAM_YEAR' => $Exam_year, ':SUBJECT_ID' => $subject_id));
      }
  }
//}
?>