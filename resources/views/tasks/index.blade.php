<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Task Manager</title>

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

        /* =========================
           NAVIGATION
        ========================= */

        nav {
            background: #111;
            color: white;
            padding: 18px 7%;

            display: flex;
            justify-content: space-between;
            align-items: center;

            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .logo {
            font-size: 23px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .logo span {
            color: #777;
        }

        .nav-button {
            background: white;
            color: #111;

            text-decoration: none;

            padding: 10px 18px;

            border-radius: 6px;

            font-weight: bold;

            transition: 0.2s;
        }

        .nav-button:hover {
            background: #ddd;
        }


        /* =========================
           MAIN CONTAINER
        ========================= */

        .container {
            width: 88%;
            max-width: 1250px;

            margin: 40px auto;
        }


        /* =========================
           DASHBOARD
        ========================= */

        .dashboard {
            background: #111;
            color: white;

            padding: 35px;

            border-radius: 14px;

            margin-bottom: 25px;
        }

        .dashboard h1 {
            font-size: 32px;

            margin-bottom: 8px;
        }

        .dashboard p {
            color: #aaa;

            font-size: 15px;
        }


        /* =========================
           SUCCESS MESSAGE
        ========================= */

        .success {
            background: #e9e9e9;

            color: #222;

            border-left: 5px solid #111;

            padding: 15px 18px;

            border-radius: 6px;

            margin-bottom: 20px;

            font-weight: bold;
        }


        /* =========================
           STATISTICS
        ========================= */

        .stats {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 20px;

            margin-bottom: 30px;
        }

        .stat-card {
            background: white;

            padding: 25px;

            border-radius: 12px;

            border: 1px solid #ddd;

            box-shadow:
                0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .stat-number {
            font-size: 35px;

            font-weight: bold;

            color: #111;

            margin-bottom: 6px;
        }

        .stat-label {
            color: #777;

            font-size: 13px;

            text-transform: uppercase;

            letter-spacing: 1px;
        }


        /* =========================
           TASK CARD
        ========================= */

        .task-card {
            background: white;

            padding: 28px;

            border-radius: 14px;

            border: 1px solid #ddd;

            box-shadow:
                0 7px 20px rgba(0, 0, 0, 0.05);
        }


        /* =========================
           TASK HEADER
        ========================= */

        .task-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 22px;
        }

        .task-header h2 {
            color: #111;

            font-size: 22px;
        }

        .task-header p {
            color: #888;

            font-size: 13px;

            margin-top: 5px;
        }

        .add-button {
            background: #111;

            color: white;

            text-decoration: none;

            padding: 11px 18px;

            border-radius: 6px;

            font-weight: bold;

            transition: 0.2s;
        }

        .add-button:hover {
            background: #333;
        }


        /* =========================
           TABLE WRAPPER
        ========================= */

        .table-wrapper {
            width: 100%;

            overflow-x: auto;

            border: 1px solid #ddd;

            border-radius: 12px;

            background: white;
        }


        /* =========================
           TABLE
        ========================= */

        table {
            width: 100%;

            min-width: 900px;

            border-collapse: collapse;
        }

        thead {
            background: #111;
        }

        th {
            color: white;

            padding: 17px 18px;

            text-align: left;

            font-size: 12px;

            text-transform: uppercase;

            letter-spacing: 1px;

            font-weight: 600;
        }

        td {
            padding: 18px;

            border-bottom: 1px solid #eee;

            vertical-align: middle;
        }

        tbody tr {
            transition: 0.2s ease;
        }

        tbody tr:hover {
            background: #f7f7f7;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }


        /* =========================
           NUMBER
        ========================= */

        .task-number {
            width: 50px;

            color: #999;

            font-size: 13px;

            font-weight: bold;
        }


        /* =========================
           TASK NAME
        ========================= */

        .task-name {
            color: #111;

            font-weight: bold;

            font-size: 15px;
        }


        /* =========================
           DESCRIPTION
        ========================= */

        .task-description {
            color: #777;

            font-size: 13px;

            max-width: 250px;

            line-height: 1.5;
        }


        /* =========================
           DATE
        ========================= */

        .task-date {
            color: #555;

            font-size: 13px;
        }


        /* =========================
           STATUS
        ========================= */

        .status {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 7px 12px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: bold;

            text-transform: uppercase;

            letter-spacing: 0.5px;
        }

        .status-dot {
            width: 7px;

            height: 7px;

            border-radius: 50%;

            background: currentColor;
        }

        .pending {
            background: #eeeeee;

            color: #555;
        }

        .completed {
            background: #111;

            color: white;
        }


        /* =========================
           ACTION BUTTONS
        ========================= */

        .actions {
            display: flex;

            gap: 6px;

            align-items: center;
        }

        .actions form {
            margin: 0;
        }

        .edit-button,
        .status-button,
        .delete-button {
            border: none;

            padding: 8px 11px;

            border-radius: 5px;

            font-size: 11px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.2s;
        }


        /* EDIT */

        .edit-button {
            background: #eeeeee;

            color: #111;

            text-decoration: none;
        }

        .edit-button:hover {
            background: #dcdcdc;
        }


        /* STATUS */

        .status-button {
            background: #111;

            color: white;
        }

        .status-button:hover {
            background: #333;
        }


        /* DELETE */

        .delete-button {
            background: #f1f1f1;

            color: #555;
        }

        .delete-button:hover {
            background: #d7d7d7;
        }


        /* =========================
           EMPTY TASK AREA
        ========================= */

        .empty {
            text-align: center;

            padding: 60px 20px;

            color: #888;
        }

        .empty-icon {
            width: 60px;

            height: 60px;

            border: 2px solid #ddd;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            margin: 0 auto 18px;

            font-size: 24px;

            color: #555;
        }

        .empty h3 {
            color: #222;

            margin-bottom: 6px;
        }

        .empty p {
            font-size: 14px;
        }


        /* =========================
           FOOTER
        ========================= */

        footer {
            text-align: center;

            color: #999;

            font-size: 12px;

            margin: 30px 0;
        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 700px) {

            nav {
                padding: 15px 4%;
            }

            .logo {
                font-size: 19px;
            }

            .container {
                width: 92%;

                margin-top: 25px;
            }

            .dashboard {
                padding: 25px;
            }

            .dashboard h1 {
                font-size: 26px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .task-card {
                padding: 18px;
            }

            .task-header {
                flex-direction: column;

                align-items: flex-start;

                gap: 15px;
            }

            .add-button {
                width: 100%;

                text-align: center;
            }

        }

    </style>

</head>


<body>


<!-- =========================
     NAVIGATION
========================= -->

<nav>

    <div class="logo">
        TASK<span>MANAGER</span>
    </div>

    <a
        href="/tasks/create"
        class="nav-button">

        + Add Task

    </a>

</nav>



<!-- =========================
     MAIN
========================= -->

<div class="container">


    <!-- DASHBOARD -->

    <div class="dashboard">

        <h1>
            Task Dashboard
        </h1>

        <p>
            Manage your tasks. Stay organized. Get things done.
        </p>

    </div>



    <!-- SUCCESS MESSAGE -->

    @if(session('success'))

        <div class="success">

            ✓ {{ session('success') }}

        </div>

    @endif



    <!-- =========================
         STATISTICS
    ========================= -->

    @php

        $total = $tasks->count();

        $pending =
            $tasks->where('status', 'Pending')->count();

        $completed =
            $tasks->where('status', 'Completed')->count();

    @endphp


    <div class="stats">


        <div class="stat-card">

            <div class="stat-number">
                {{ $total }}
            </div>

            <div class="stat-label">
                Total Tasks
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-number">
                {{ $pending }}
            </div>

            <div class="stat-label">
                Pending
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-number">
                {{ $completed }}
            </div>

            <div class="stat-label">
                Completed
            </div>

        </div>


    </div>



    <!-- =========================
         TASK CARD
    ========================= -->

    <div class="task-card">


        <div class="task-header">

            <div>

                <h2>
                    My Tasks
                </h2>

                <p>
                    Your current task list
                </p>

            </div>


            <a
                href="/tasks/create"
                class="add-button">

                + Add New Task

            </a>

        </div>



        @if($tasks->count() > 0)


            <!-- =========================
                 MODERN TABLE
            ========================= -->

            <div class="table-wrapper">

                <table>


                    <thead>

                        <tr>

                            <th>
                                #
                            </th>

                            <th>
                                Task
                            </th>

                            <th>
                                Description
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Due Date
                            </th>

                            <th>
                                Actions
                            </th>

                        </tr>

                    </thead>



                    <tbody>


                    @foreach($tasks as $task)


                        <tr>


                            <!-- NUMBER -->

                            <td class="task-number">

                                {{ $loop->iteration }}

                            </td>



                            <!-- TASK NAME -->

                            <td>

                                <div class="task-name">

                                    {{ $task->task_name }}

                                </div>

                            </td>



                            <!-- DESCRIPTION -->

                            <td>

                                <div class="task-description">

                                    {{ $task->description ?: 'No description' }}

                                </div>

                            </td>



                            <!-- STATUS -->

                            <td>


                                @if($task->status === 'Pending')


                                    <span class="status pending">

                                        <span class="status-dot"></span>

                                        Pending

                                    </span>


                                @else


                                    <span class="status completed">

                                        <span class="status-dot"></span>

                                        Completed

                                    </span>


                                @endif


                            </td>



                            <!-- DUE DATE -->

                            <td class="task-date">

                                {{ $task->due_date ?: '—' }}

                            </td>



                            <!-- ACTIONS -->

                            <td>


                                <div class="actions">


                                    <!-- EDIT -->

                                    <a
                                        href="/tasks/{{ $task->id }}/edit"
                                        class="edit-button">

                                        Edit

                                    </a>



                                    <!-- STATUS -->

                                    <form
                                        action="/tasks/{{ $task->id }}/status"
                                        method="POST">

                                        @csrf

                                        @method('PATCH')


                                        <button
                                            type="submit"
                                            class="status-button">

                                            {{ $task->status === 'Pending'
                                                ? 'Complete'
                                                : 'Pending' }}

                                        </button>

                                    </form>



                                    <!-- DELETE -->

                                    <form
                                        action="/tasks/{{ $task->id }}"
                                        method="POST">

                                        @csrf

                                        @method('DELETE')


                                        <button
                                            type="submit"
                                            class="delete-button"

                                            onclick="return confirm('Are you sure you want to delete this task?')">

                                            Delete

                                        </button>

                                    </form>


                                </div>


                            </td>


                        </tr>


                    @endforeach


                    </tbody>


                </table>

            </div>


        @else


            <!-- =========================
                 EMPTY STATE
            ========================= -->

            <div class="empty">

                <div class="empty-icon">
                    +
                </div>

                <h3>
                    No Tasks Yet
                </h3>

                <p>
                    Add your first task to get started.
                </p>

            </div>


        @endif


    </div>


    <footer>

        Personal Task Manager

    </footer>


</div>


</body>

</html>