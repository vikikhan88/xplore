<?php 
require_once 'autoload.php';

use ToyRobot\ToyRobot;

if(!empty($_POST['command'])){
    $instructions = $_POST['command'];
    $commands = preg_split("/\r\n|\n|\r/", $instructions);
    $toyRobot = new ToyRobot;
    foreach($commands as $key => $command){
        $cmd = strtoupper($command);
        switch ($cmd) {
            case str_contains($cmd, 'PLACE') == true:
                $statement = explode(" ", $cmd);
                $arg = explode(",", $statement[1]);
                $toyRobot->place($arg[0],$arg[1], $arg[2]);
                break;
            case 'LEFT':
                $toyRobot->left();
                break;
            case 'RIGHT':
                $toyRobot->right();
                break;
            case 'MOVE':
                $toyRobot->move();
                break;
            case 'REPORT':
                $result = $toyRobot->report();
                break;
        }
    }
}
?>
<html>
    <body>
        <form method="POST" action="">
            <table>
                <tr>
                    <td>Place Command:</td>
                    <td>
                        <textarea name="command" style="width: 300px;height: 150px;"><?php echo $instructions ?? ""; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit">Submit</button></td>
                </tr>
                <tr>
                    <td>OutPut:</td>
                    <td><?php echo $result ?? ""; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </body>
</html>
