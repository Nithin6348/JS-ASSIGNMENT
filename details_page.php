<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Page 2</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .add-button, .delete-button, .save-button {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Page2</h2>

    
    <table border="1">
        <tr>
            <th>Label</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Package</td>
            <td><?php echo $_GET['label1'] ?? ''; ?></td>
        </tr>
        <tr>Rate</td>
            <td><?php echo $_GET['label2'] ?? ''; ?></td>
        </tr>
        <tr>
            <td>Date From</td>
            <td><?php echo $_GET['label3'] ?? ''; ?></td>
        </tr>
        <tr>
            <td>Date To</td>
            <td><?php echo $_GET['label4'] ?? ''; ?></td>
        </tr>
        <tr>
            <td>Contact No</td>
            <td><?php echo $_GET['label5'] ?? ''; ?></td>
        </tr>
    </table>

    <table border="1">
        <tr>
            <th>Places</th>
            <th>Add</th>
            <th>Delete</th>
        </tr>
        <tr>
            <td id="placesColumn">
                <input type="text" id="placeInput" placeholder="Enter Quantity">
            </td>
            <td><button class="add-button" onclick="addQuantity()">Add</button></td>
            <td><button class="delete-button" onclick="deletePlace()">Delete</button></td>
        </tr>
    </table>

   
    <button class="save-button" onclick="saveQuantities()">Save</button>

    <a href="javascript:history.back()">Back</a>

    <script>
        var quantities = [];

        function addQuantity() {
            var quantityInput = document.getElementById('placeInput').value;
            if (quantityInput.trim() !== "") {
                var placesColumn = document.getElementById('placesColumn');
                var newQuantity = document.createElement('div');
                newQuantity.appendChild(document.createTextNode(quantityInput));
                placesColumn.appendChild(newQuantity);

                
                quantities.push(quantityInput);
            }
        }

        function deletePlace() {
            var placesColumn = document.getElementById('placesColumn');
            placesColumn.removeChild(placesColumn.lastChild);

            
            quantities.pop();
        }

        function saveQuantities() {
         
            var quantitiesString = quantities.join(',');

           
            window.location.href = "assignment.php?quantities=" + quantitiesString;
        }
    </script>
</body>
</html>
