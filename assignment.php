<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form and Table Example</title>
    <style type="text/css">
        
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
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

        .places-link {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }

        .edit-button, .delete-button {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Page 1</h2>

    <form id="sampleForm" onsubmit="updateTable(event)">
        <label for="label1">Package:</label>
        <input type="text" id="label1" name="label1" />

        <label for="label2">Rate:</label>
        <input type="text" id="label2" name="label2" />

        <label for="label3">Date From:</label>
        <input type="dob" id="label3" name="label3" />

        <label for="label4">Date To:</label>
        <input type="dob" id="label4" name="label4" />

        <label for="label5">Contact No:</label>
        <input type="text" id="label5" name="label5" />

        <button type="submit">Submit</button>
    </form>

   
    <table border="1" id="dataTable">
        <thead>
            <tr>
                <th>Package Name</th>
                <th>Rate</th>
                <th>Date From</th>
                <th>Date To</th>
                <th>Contact No</th>
                <th>Places</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>

    <script>
    function updateTable(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById("sampleForm"));
        var newRow = document.createElement("tr");

        for (var i = 1; i <= 5; i++) {
            var label = "label" + i;
            var cell = document.createElement("td");
            cell.appendChild(document.createTextNode(formData.get(label)));
            newRow.appendChild(cell);
        }

        var placesCell = document.createElement("td");
        var placesLink = document.createElement("a");
        placesLink.appendChild(document.createTextNode("Places"));
        placesLink.className = "places-link";
        placesLink.onclick = function () {
            showDetails(newRow);
        };
        placesCell.appendChild(placesLink);
        newRow.appendChild(placesCell);

        var editCell = document.createElement("td");
        var editButton = document.createElement("button");
        editButton.appendChild(document.createTextNode("Edit"));
        editButton.className = "edit-button";
        editButton.onclick = function () {
            editRow(newRow);
        };
        editCell.appendChild(editButton);
        newRow.appendChild(editCell);

        var deleteCell = document.createElement("td");
        var deleteButton = document.createElement("button");
        deleteButton.appendChild(document.createTextNode("Delete"));
        deleteButton.className = "delete-button";
        deleteButton.onclick = function () {
            deleteRow(newRow);
        };
        deleteCell.appendChild(deleteButton);
        newRow.appendChild(deleteCell);

        document.getElementById("dataTable").getElementsByTagName('tbody')[0].appendChild(newRow);
        document.getElementById("sampleForm").reset();
    }

    function showDetails(row) {
        var cells = row.getElementsByTagName('td');
        var details = {};
        for (var i = 0; i < 5; i++) {
            var label = "label" + (i + 1);
            details[label] = cells[i].innerText;
        }

        var queryString = Object.keys(details).map(key => key + '=' + encodeURIComponent(details[key])).join('&');

        window.location.href = 'details_page.php?' + queryString;
    }

    function editRow(row) {
        var cells = row.getElementsByTagName('td');
        for (var i = 1; i <= 5; i++) {
            var label = "label" + i;
            var value = cells[i - 1].innerText;
            document.getElementById(label).value = value;
        }
    }

    function deleteRow(row) {
        row.parentNode.removeChild(row);
    }

    function getRowIndex(row) {
        var rows = document.getElementById("dataTable").getElementsByTagName('tbody')[0].getElementsByTagName('tr');
        for (var i = 0; i < rows.length; i++) {
            if (rows[i] === row) {
                return i;
            }
        }
        return -1;
    }
</script>


</body>
</html>
