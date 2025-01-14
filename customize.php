<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daitery Customization</title>
    <link rel="stylesheet" href="Style/daitery_customization.css">
</head>
<body>

<header>
        <?php include('Template/header.php'); ?>
    </header>

    <div class="main-banner">
        <h1>Customize Your Food Preferences</h1>
    </div>

    <div class="customization-plan">
        <form action="daitery_customization.php" method="POST">
        <h2>Food Preferences Form</h2>
            <p>Please select your preferred spice, salt, and sugar levels.</p>

            <label for="spice-level">Spice Level:</label>
            <select id="spice-level" name="spice-level">
                <option value="select" disabled selected>Select Spice Level</option>
                <option value="low">Low</option>
                <option value="normal">Normal</option>
                
            </select><br>

            <label for="salt-level">Salt Level:</label>
            <select id="salt-level" name="salt-level">
                <option value="select" disabled selected>Select Salt Level</option>
                <option value="low">Low</option>
                <option value="normal">Normal</option>
                
            </select><br>

            <label for="sugar-level">Sugar Level:</label>
            <select id="sugar-level" name="sugar-level">
                <option value="select" disabled selected>Select sugar Level</option>
                <option value="low">Low</option>
                <option value="normal">Normal</option>
            </select>

            <button type="submit">Submit</button>
        </form>
    </div>
    
    <footer>
        <?php include('Template/footer.php'); ?>
    </footer>
</body>
</html>