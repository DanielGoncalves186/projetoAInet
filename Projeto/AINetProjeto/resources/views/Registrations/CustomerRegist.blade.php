<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Registration Page</h1>
        
        <form action="process_registration.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" class="form-control-file" id="photo" name="photo">
            </div>
            
            <div class="form-group">
                <label for="nif">NIF:</label>
                <input type="text" class="form-control" id="nif" name="nif">
            </div>
            
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address"></textarea>
            </div>
            
            <div class="form-group">
                <label for="payment_type">Default Payment Type:</label>
                <select class="form-control" id="payment_type" name="payment_type">
                    <option value="VISA">VISA</option>
                    <option value="MasterCard">Master Card</option>
                    <option value="PAYPAL">PayPal</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="payment_reference">Default Payment Reference:</label>
                <input type="text" class="form-control" id="payment_reference" name="payment_reference">
            </div>
            
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
