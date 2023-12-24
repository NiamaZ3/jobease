<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Offre Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .modal {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            width: 400px;
        }

        .modal-content {
            text-align: left;
        }

        .form-label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="file"] {
            margin-bottom: 10px;
        }

        .btn {
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .d-flex {
            display: flex;
        }

        .w-100 {
            width: 100%;
        }

        .mb-4 {
            margin-bottom: 16px;
        }

        .save, .annuler {
            cursor: pointer;
        }

    </style>
</head>
<body>

    <div class="modal">
        <div class="modal-content">
            <form method="POST" action="?route=Edit_Offre" enctype="multipart/form-data">
                <div class="mb-4">
                    <input type="hidden" name="idOffre" value="<?= $row['id_offre'] ?>">
                    <label class="form-label">Offre description</label>
                    <input type="text" name="description" class="form-control task-desc" value="<?= $row['description'] ?>" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Offre title</label>
                    <input type="text" name="title" class="form-control task-desc"  value="<?= $row['title'] ?>" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Offre company</label>
                    <input type="text" name="company" class="form-control task-desc" value="<?= $row['company'] ?>" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Offre Location</label>
                    <input type="text" name="Location" class="form-control task-desc" value="<?= $row['location'] ?>" required>
                </div>
                <input type="file" name="file" accept=".png, .jpeg, .jpg, .gif" required>

                <div class="d-flex w-100">
                    <button type="submit" name="submit" class="btn btn-success mb-4 save">Save Edit</button>
                    <a href="?route=All_Offre"><button type="button" class="btn btn-danger mb-4 annuler">Annuler</button></a> 
                </div>
            </form>
        </div>
    </div>

</body>
</html>
