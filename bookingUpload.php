<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="uploadFile.css">
    <title>Upload</title>
</head>
<body>  
    <div class="container mt-5">
        <h1 class="mb-4">Upload Proof of Payment and ID</h1>
        <form method="post" action="carController.php" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="picture" class="form-label">Selfie with Primary IDs</label>
                <input class="form-control" type="file" id="picture" name="pic_ID" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="proof_payment" class="form-label">Proof of Payment</label>
                <input class="form-control" type="file" id="proof_payment" name="proof_payment" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Book Now!</button>
        </form>
    </div>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
