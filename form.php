<?php

if (isset($_POST['name'])) $name=$_POST['name'];
else $name = "Name not set";

if (isset($_POST['descrip'])) $descrip=$_POST['descrip'];
else $descrip = "Features not set";

if (isset($_POST['skills'])) {
    $skills=$_POST['skills'];
    $skillsoutput = "";

    foreach($skills as $item) {
        $skillsoutput .= $item . " ";
    }

} else $skillsoutput = "Skills not set";

if (isset($_POST['platoon'])) $platoon=$_POST['platoon'];
else $party = "Party not set";

if (isset($_POST['points'])) $points=$_POST['points'];
else $points = "Points not set";


echo <<<_END

<html>
    <head>
        <title>Chapter 11 - Forms</title>
    </head>
    <body>
        <pre>

        <b>Character:</b>
        Points: $points
        Name: $name
        Team Features: $descrip
        Team Skills: $skillsoutput
        Platoon: $platoon

        <form method="post" action="form.php">

        Tell us about yourself.
        <label>Name
        <input type="text" name="name" autofocus="autofocus" required="required"></label>

        <label>Team Description
        <textarea name="descrip" cols="20" rows="6"
        wrap="wrap" placeholder="Describe team features."></textarea></label>

        <label>Pick special skills for fantasy team:
        <input type="checkbox" name="skills[]" value="Fumble"> Fumble
        <input type="checkbox" name="skills[]" value="Speed"> Speed
        <input type="checkbox" name="skills[]" value="Block"> Blocked Kicks
        <input type="checkbox" name="skills[]" value="Arm"> Arm Strength
        <input type="checkbox" name="skills[]" value="Backflip"> Backflip TD Celebration</label>

        <label>Pick a platoon:
        <input type="radio" name="platoon" value="Offense"> Offense
        <input type="radio" name="platoon" value="Defense"> Defense
        <input type="radio" name="platoon" value="SpecialTeams"> Special Teams</label>

        <input type="hidden" name="level" value="1">

        <input type="submit" >

        </form>

        </pre>
    </body>
</html>

_END;

?>