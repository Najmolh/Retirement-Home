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
            <div class="form-group">
                <label for="spice-level">Spice Level:</label>
                <div class="checkbox-group">
                    <input type="radio" id="spice-level-low" name="spice_level" value="low">
                    <label for="spice-level-low">Low</label>
                    
                    <input type="radio" id="spice-level-normal" name="spice_level" value="normal">
                    <label for="spice-level-normal">Normal</label>
                </div>
            </div>
        
            <div class="form-group">
                <label for="salt-level">Salt Level:</label>
                <div class="checkbox-group">
                    <input type="radio" id="salt-level-low" name="salt_level" value="low">
                    <label for="salt-level-low">Low</label>
                    
                    <input type="radio" id="salt-level-normal" name="salt_level" value="normal">
                    <label for="salt-level-normal">Normal</label>
                </div>
            </div>
        
            <div class="form-group">
                <label for="sugar-level">Sugar Level:</label>
                <div class="checkbox-group">
                    <input type="radio" id="sugar-level-low" name="sugar_level" value="low">
                    <label for="sugar-level-low">Low</label>

                    <input type="radio" id="sugar-level-normal" name="sugar_level" value="normal">
                    <label for="sugar-level-normal">Normal</label>
                </div>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
               
        </form>
    </div>
    
    <footer>
        <?php include('Template/footer.php'); ?>
    </footer>
</body>
</html>
