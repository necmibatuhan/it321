<?php
include("connect.php");

if ($_POST) {
    $name = $_POST["name"];
    $mail = $_POST["email"];
    $habit = $_POST["habit"];

    $sql = "INSERT INTO dbo.registration (name, email, habit) VALUES (:name, :email, :habit)";

    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $mail);
        $stmt->bindParam(':habit', $habit);

        $calistirekle = $stmt->execute();
}
        if ($calistirekle) {
            echo '<script>alert("Bağlantı başarıyla kuruldu. Projemize destek olduğunuz için teşekkür ederiz.");</script>';
        }
     catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Environmental Habits</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 1em;
            text-align: center;
            margin-bottom: 1em;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 800px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        footer {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 1em;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .habit-description {
            margin-top: 20px;
            text-align: left;
        }

        #feedback-container {
            margin-top: 20px;
            background-color: #dff0d8;
            border: 1px solid #d0e9c6;
            color: #3c763d;
            padding: 15px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Environmental Habits</h1>
    </header>

    <form id="habits-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="yt0">
        <h2>Choose Your Environmental Habit</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="habit">Choose a Habit:</label>
        <p>Embarking on a journey towards a more sustainable lifestyle begins with the deliberate choice of the right habit powerful initial step. Each habit contributes uniquely to environmental well-being. Opting for the "Reduce" habit encourages minimizing consumption, fostering awareness of your ecological footprint. The "Recycle" habit empowers you to play a direct role in waste reduction by sorting and recycling materials. Choosing "Conserve" directs you towards responsible resource usage, promoting an eco-friendly way of life. The "Reduce Single-Use Items" habit invites you to reduce disposable plastics by favoring reusable alternatives. Opting for "Opt Minimal or Biodegradable Packaging" empowers you to make choices that decrease your impact on the planet, while "Choose Recycled Paper Products" supports the use of sustainable materials. Explore these habits and discover how each small change makes a significant positive impact on our environment. Your choices matter select a habit, make a difference.</p>
        <select id="habit" name="habit">
            <option value="reduce">Reduce</option>
            <option value="recycle">Recycle</option>
            <option value="conserve">Conserve</option>
            <option value="reduce_single_use">Reduce Single-Use Items</option>
            <option value="opt_minimal">Opt for Minimal or Biodegradable Packaging</option>
            <option value="choose_recycled">Choose Recycled Paper Products</option>
        </select>

        <div class="habit-description" id="selected-habit-description"></div>

        <button type="submit" name= "yt0">Submit</button>

        <div id="feedback-container" class="feedback-message"></div>
    </form>
    <script>
        document.getElementById('habit').addEventListener('change', function() {
            const selectedHabit = this.value;
            const habitDescriptions = {
                'reduce': 'Reduce the amount of resources consumed by individuals or organizations.',
                'recycle': 'Collect and process waste materials into new products or materials.',
                'conserve': 'Limit the consumption of resources and waste generation.',
                'reduce_single_use': 'Choose reusable products or services to reduce the production of disposable items.',
                'opt_minimal': 'Choose minimal or biodegradable packaging options to reduce waste and protect the environment.',
                'choose_recycled': 'Opt for products made from recycled materials, such as recycled paper.',
            };

            document.getElementById('selected-habit-description').textContent = habitDescriptions[selectedHabit];
        });

        document.getElementById('habits-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const feedbackContainer = document.getElementById('feedback-container');
            feedbackContainer.textContent = 'Thank you for signing up! Your feedback is important to us.';
        });
    </script>
</body>
</html>
