<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details - MedKare</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #e9ffff; /* Mild aqua-white */
        }

        .Nav_bar {
            background-color: aqua;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .MedKare, .Home {
            background-color: aqua;
            color: black;
        }

        .container {
            width: 60%;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            border: 2px solid #00b3b3;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-size: 18px;
            font-weight: bold;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 16px;
            border-radius: 5px;
            border: 1px solid gray;
        }

        .submitBtn {
            width: 100%;
            padding: 12px;
            background-color: blue;
            color: white;
            border: 2px solid black;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .submitBtn:hover {
            background-color: royalblue;
        }
    </style>

</head>
<body>

    <nav class="Nav_bar">
        <h1 class="MedKare">MedKare</h1>
        <a class="Home" href="main.html">Home</a>
    </nav>

    <div class="container">
        <h2>User Medical Details</h2>

        <form action="save_user.php" method="POST">

            <label>Age</label>
            <input type="number" name="age" required>

            <label>Gender</label>
            <select name="gender" required>
                <option value="">Select</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>

            <label>Medical History</label>
            <textarea name="history" rows="3"></textarea>

            <label>Allergies</label>
            <textarea name="allergies" rows="2"></textarea>

            <label>Current Medications</label>
            <textarea name="medications" rows="2"></textarea>

            <label>Height (cm)</label>
            <input type="number" name="height">

            <label>Weight (kg)</label>
            <input type="number" name="weight">

            <label>Emergency Contact</label>
            <input type="text" name="emergency">

            <button class="submitBtn" type="submit">Save & Continue</button>
        </form>
    </div>

</body>
</html>
