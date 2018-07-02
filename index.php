<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <style type="text/css">
        body
        {
            font-family: Arial;
            font-size: 10pt;
        }
        table
        {
            border: 1px solid #ccc;
            border-collapse: collapse;
        }
        table th
        {
            background-color: #F7F7F7;
            color: #333;
            font-weight: bold;
        }
        table th, table td
        {
            padding: 5px;
            border-color: #ccc;
        }
    </style>
</head>
<body>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            //Build an array containing Customer records.
            var customers = new Array();

            //Add the data rows.
            for (var i = 0; i < customers.length; i++) {
                AddRow(customers[i][0], customers[i][1]);
            }
        });

        function Add() {
            AddRow($("#txtName").val(), $("#txtCountry").val());
            $("#txtName").val("");
            $("#txtCountry").val("");

            var name = $("TD", row).eq(0).html();
            var country = $("TD", row).eq(1).html();
            alert(name);

            $.ajax({
            type: 'post',
            url: 'addmore.php',
            data: {
            name:name,
            country:country
            },
            success: function (response) {

            $('#success__para').html("You data will be saved");
            }
            });

            return false;

        };

        function AddRow(name, country) {
            //Get the reference of the Table's TBODY element.
            var tBody = $("#tblCustomers > TBODY")[0];

            //Add Row.
            row = tBody.insertRow(-1);

            //Add Name cell.
            var cell = $(row.insertCell(-1));
            cell.html(name);

            //Add Country cell.
            cell = $(row.insertCell(-1));
            cell.html(country);

            //Add Button cell.
            cell = $(row.insertCell(-1));
            var btnRemove = $("<input />");
            btnRemove.attr("type", "button");
            btnRemove.attr("onclick", "Remove(this);");
            btnRemove.val("Remove");
            cell.append(btnRemove);
        };

        function Remove(button) {
            //Determine the reference of the Row using the Button.
            var row = $(button).closest("TR");
            var name = $("TD", row).eq(0).html();
            if (confirm("Do you want to delete: " + name)) {

                //Get the reference of the Table.
                var table = $("#tblCustomers")[0];

                //Delete the Table row using it's Index.
                table.deleteRow(row[0].rowIndex);
            }
        };
        function Genrate()
        {
          alert("test");
        }
    </script>
    <table id="tblCustomers" cellpadding="0" cellspacing="0" border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Country</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <td><input type="text" id="txtName" required="" /></td>
                <td><input type="text" id="txtCountry" required="" /></td>
                <td><input type="button" onclick="Add()" value="Add" /></td>
            </tr>
        </tfoot>
    </table>
    <input type="button" onclick="Genrate()" value="Genrate" />
    <p id="success_para" ></p>
</body>
</html>
<script>
</script>
