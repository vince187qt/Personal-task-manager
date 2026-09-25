<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Task</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f5f5f5;
            color: #222;
        }

        nav {
            background: #111;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .logo span {
            color: #aaa;
        }

        .back {
            background: white;
            color: #111;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
        }

        .container {
            width: 90%;
            max-width: 700px;
            margin: 45px auto;
        }

        .form-card {
            background: white;
            padding: 35px;
            border-radius: 12px;
            border: 1px solid #ddd;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        .title {
            margin-bottom: 30px;
        }

        .title h1 {
            font-size: 30px;
            color: #111;
            margin-bottom: 8px;
        }

        .title p {
            color: #777;
        }

        .line {
            width: 50px;
            height: 4px;
            background: #111;
            margin-top: 15px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #222;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
            font-size: 15px;
            background: white;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border: 2px solid #111;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .update-button,
        .cancel-button {
            flex: 1;
            padding: 14px;
            border-radius: 6px;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }

        .update-button {
            border: none;
            background: #111;
            color: white;
        }

        .update-button:hover {
            background: #333;
        }

        .cancel-button {
            background: #eee;
            color: #222;
        }

        .cancel-button:hover {
            background: #ddd;
        }

        .error {
            background: #eee;
            border-left: 4px solid #111;
            color: #333;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        @media(max-width:600px) {

            .form-card {
                padding: 25px 20px;
            }

            .buttons {
                flex-direction: column;
            }

        }

    </style>

</head>

<body>

<nav>

    <div class="logo">
        TASK<span>MANAGER</span>
    </div>

    <a href="/" class="back">
        ← Back
    </a>

</nav>


<div class="container">

    <div class="form-card">

        <div class="title">

            <h1>Edit Task</h1>

            <p>
                Update the information for this task.
            </p>

            <div class="line"></div>

        </div>


        @if($errors->any())

            <div class="error">

                <strong>Please fix the following:</strong>

                <ul style="margin:8px 0 0 20px;">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form action="/tasks/{{ $task->id }}" method="POST">

            @csrf

            @method('PUT')


            <div class="form-group">

                <label>Task Name</label>

                <input
                    type="text"
                    name="task_name"
                    value="{{ old('task_name', $task->task_name) }}"
                    required>

            </div>


            <div class="form-group">

                <label>Description</label>

                <textarea
                    name="description">{{ old('description', $task->description) }}</textarea>

            </div>


            <div class="form-group">

                <label>Status</label>

                <select name="status" required>

                    <option value="Pending"
                        {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>

                        Pending

                    </option>

                    <option value="Completed"
                        {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>

                        Completed

                    </option>

                </select>

            </div>


            <div class="form-group">

                <label>Due Date</label>

                <input
                    type="date"
                    name="due_date"
                    value="{{ old('due_date', $task->due_date) }}">

            </div>


            <div class="buttons">

                <a href="/" class="cancel-button">
                    Cancel
                </a>

                <button
                    type="submit"
                    class="update-button">

                    Update Task

                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>