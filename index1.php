<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Project Management</title>
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --background-color: #ecf0f1;
            --button-hover: #2980b9;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--background-color);
            padding: 2rem;
        }

        h2 {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 2rem;
        }

        form {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
        }

        input, select {
            width: 100%;
            padding: 0.8rem;
            border-radius: 8px;
            border: 1px solid #ddd;
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        input:focus, select:focus {
            outline: none;
            border-color: var(--secondary-color);
            box-shadow: 0 0 3px var(--secondary-color);
        }

        button {
            background-color: var(--secondary-color);
            color: white;
            padding: 1rem 2rem;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.3s;
            width: 100%;
        }

        button:hover {
            background-color: var(--button-hover);
            transform: translateY(-2px);
        }

        .error-message {
            color: var(--accent-color);
            font-size: 0.9rem;
            display: none;
            margin-top: 0.5rem;
        }

        .button {
            display: inline-block;
            background-color: var(--secondary-color);
            color: white;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
        }

        .button:hover {
            background-color:
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }

        .button:active {
            background-color: #388e3c;
            transform: translateY(2px);
        }

    </style>
</head>
<body>

    <h2>Research Project Management</h2>

    <form action="create.php" method="POST" id="createForm">
        <label>Project ID: <input type="number" name="project_id" required></label><br>
        <label>Project Title: <input type="text" name="title" maxlength="100" required></label><br>
        <label>Lead Researcher: <input type="text" name="lead_researcher" maxlength="50" required></label><br>
        <label>Funding Amount: <input type="number" name="funding_amount" required></label><br>
        <label>Status:
            <select name="status">
                <option value="Ongoing">Ongoing</option>
                <option value="Completed">Completed</option>
                <option value="Paused">Paused</option>
                <option value="Cancelled">Cancelled</option>
            </select>
        </label><br>
        <label>Start Date: <input type="date" name="start_date" id="startDate" required></label><br>
        <label>End Date: <input type="date" name="end_date" id="endDate"></label><br>
        <button type="submit">Add Project</button>
        <div class="error-message" id="startDateError">Start date cannot exceed today's date.</div>
        <div class="error-message" id="endDateError">End date cannot be earlier than start date.</div>
    </form>
    <hr>
    <br></br>

    <div class="crud-links">
        <a href="read.php" class="button">Read</a>

        <br></br>
        <h3>Update Project</h3>
        <form action="update.php" method="POST">
            <label>Project ID to Update: <input type="number" name="project_id" required></label><br>
            <label>New Title: <input type="text" name="title" maxlength="100" required></label><br>
            <label>New Lead Researcher: <input type="text" name="lead_researcher" maxlength="50" required></label><br>
            <label>New Funding Amount: <input type="number" name="funding_amount" required></label><br>
            <label>New Status:
                <select name="status">
                    <option value="Ongoing">Ongoing</option>
                    <option value="Completed">Completed</option>
                    <option value="Paused">Paused</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </label><br>
            <label>New Start Date: <input type="date" name="start_date" id="upsd" required></label><br>
            <label>New End Date: <input type="date" name="end_date" id="uped"></label><br>
            <button type="submit">Update Project</button>
            <div class="error-message" id="startDateError1">Start date cannot exceed today's date.</div>
            <div class="error-message" id="endDateError1">End date cannot be earlier than start date.</div>
        </form>

        <hr>
        <br></br>
        <h3>Delete Project</h3>
        <form action="delete.php" method="POST">
            <label>Project ID to Delete: <input type="number" name="project_id" required></label><br>
            <button type="submit">Delete Project</button>
        </form>
    </div>

    <script>
        const today = new Date().toISOString().split('T')[0];
        const startDateInput = document.getElementById('startDate');
        const endDateInput = document.getElementById('endDate');
        const s1 = document.getElementById('upsd');
        const e1 = document.getElementById('uped');
        const startDateError = document.getElementById('startDateError');
        const endDateError = document.getElementById('endDateError');

        startDateInput.max = today;
        s1.max = today;

        startDateInput.addEventListener('change', function () {
            if (startDateInput.value > today) {
                startDateError.style.display = 'block';
                startDateInput.value = today;
            } else {
                startDateError.style.display = 'none';
            }
            endDateInput.min = startDateInput.value;
        });

        s1.addEventListener('change', function () {
            if (s1.value > today) {
                startDateError.style.display = 'block';
                s1.value = today;
            } else {
                startDateError.style.display = 'none';
            }
            e1.min = s1.value;
        });

        endDateInput.addEventListener('change', function () {
            if (endDateInput.value < startDateInput.value) {
                endDateError.style.display = 'block';
                endDateInput.value = startDateInput.value; 
            } else {
                endDateError.style.display = 'none';
            }
        });

        e1.addEventListener('change', function () {
            if (e1.value < s1.value) {
                endDateError.style.display = 'block';
                e1.value = s1.value;
            } else {
                endDateError.style.display = 'none';
            }
        });
    </script>

</body>
</html>
