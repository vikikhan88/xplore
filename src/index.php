<?php 
require_once 'autoload.php';

use ToyRobot\ToyRobot;

if(!empty($_POST['command'])){
    $toyRobot = new ToyRobot;

    $instructions = $_POST['command'];
    $result= $toyRobot->commandParsing($instructions);
    
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
