<?php

require '../../config/config.php';


requireRole('admin');

// logActivity($pdo, $_SESSION['user_id'], $_SESSION['user_email'], 'view_activity_logs', 'success');

// Activity Logs Query Query #3

$stmt = $pdo->query("
    SELECT * FROM activity_logs ORDER BY activity_log_created_at DESC
");


$activities = $stmt->fetchAll(PDO::FETCH_ASSOC);




?>

<!DOCTYPE html>
<html lang="en">



<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        padding: 40px;
        padding-bottom: 90px;

        font-family: Georgia, "Times New Roman", serif;

        background: #f4efe6;
        color: #3b2a20;
    }

    h1 {
        margin: 0 0 25px;
        font-size: 30px;
        font-weight: 600;
        color: #3a2418;
        letter-spacing: -0.5px;
    }

    /* Sign Out */
    .sign-out {
        position: fixed;
        bottom: 20px;
        left: 20px;

        padding: 10px 20px;

        background: #4a3022;
        color: #f8f1e5;

        border: 1px solid #6b4a35;
        border-radius: 4px;

        text-decoration: none;
        font-family: Georgia, "Times New Roman", serif;
        font-size: 14px;
        font-weight: 600;

        box-shadow: 0 3px 8px rgba(59, 42, 32, 0.15);

        transition: all 0.2s ease;
    }

    .sign-out:hover {
        background: #6b4a35;
        color: #fffaf0;
    }

    /* Activity Table */
    table {
        width: 100%;
        border-collapse: collapse;

        background: #fffaf0;

        border: 1px solid #cbbba5;
        border-radius: 6px;

        overflow: hidden;

        font-family: Arial, sans-serif;
        font-size: 14px;

        box-shadow: 0 4px 15px rgba(59, 42, 32, 0.08);
    }

    th {
        padding: 14px 15px;

        background: #4a3022;
        color: #f8f1e5;

        text-align: left;
        font-family: Georgia, "Times New Roman", serif;
        font-weight: 600;

        border-bottom: 2px solid #9a795b;
    }

    td {
        padding: 12px 15px;

        color: #574337;

        border-bottom: 1px solid #e1d6c8;
    }

    tbody tr {
        transition: background 0.15s ease;
    }

    tbody tr:hover {
        background: #f1e8da;
    }

    tbody tr:last-child td {
        border-bottom: none;
    }

    /* Status column */
    td:nth-child(5) {
        font-weight: 600;
        color: #6b4a35;
    }

    /* Mobile */
    @media (max-width: 900px) {
        body {
            padding: 20px;
            padding-bottom: 80px;
        }

        h1 {
            font-size: 25px;
        }

        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }

        .sign-out {
            bottom: 15px;
            left: 15px;
        }
    }
</style>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>

<body>
    <h1>Welcome Admin</h1>
   <a class="sign-out" href="../../auth/signout.php">Sign Out</a>
    <table border="1">
        <thead>
            <tr>

                <th>Record ID</th>
                <th>User ID</th>
                <th>User Email</th>
                <th>Action</th>
                <th>Status</th>
                <th>IP Address</th>
                <th>User Agent</th>
                <th>Date & Time</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activities as $activity): ?>
                <tr>
                    <td><?= htmlspecialchars($activity['activity_log_id']); ?></td>
                    <td><?= htmlspecialchars($activity['user_id']); ?></td>
                    <td><?= htmlspecialchars($activity['user_email']); ?></td>
                    <td><?= htmlspecialchars($activity['activtiy_log_action']); ?></td>
                    <td><?= htmlspecialchars($activity['activity_log_status']); ?></td>
                    <td><?= htmlspecialchars($activity['activity_log_ip_address']); ?></td>
                    <td><?= htmlspecialchars($activity['activity_log_user_agent']); ?></td>
                    <td><?= htmlspecialchars($activity['activity_log_created_at']); ?></td>
                </tr>
            <?php endforeach; ?>

    </table>
    </body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/3.0.4/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/3.0.4/js/dataTables.bootstrap5.min.js"></script>
</html>



