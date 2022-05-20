<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <?php
         if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $data_list = [];
            $match_up = [];
            $scores = [];
            $team_score = [];
            $top_teams = [];
            $csv_file = fopen("football.csv", "r");
            while (!feof($csv_file)){
                $data = fgetcsv($csv_file);
                $data_list[] = $data;
            }
            fclose($csv_file);


            if (isset($_GET["top_scorers"])){
                for ($i = 1; $i < count($data_list) - 1; $i++){
                    $match = $data_list[$i][2] . "," . $data_list[$i][4];
                    $match_up[] = explode(",", $match);
                    $score[] = explode("-", $data_list[$i][3]);
                }
                foreach ($match_up as $team){
                    foreach($scores as $score){
                        $score[$team[0]] = $score['0'];
                        unset($score['0']);
                    }
                }
                echo "<tr>";
                echo "<th>Team</th>";
                echo "<th>Scores</th>";
                echo "</tr>";
            }
            if (isset($_GET["leaders"])){
                echo "<tr>";
                echo "<th>Team</th>";
                echo "<th>Points</th>";
                echo "</tr>";
            }
         }
        ?>
    </table>
</body>
</html>