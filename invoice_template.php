<?php
// Assuming you have established a database connection
// require "./db/config.php";

// $repair_id = $_GET['repair_id'];

// // Retrieve the repair details from the database
// $sql = "SELECT c.first_name, c.last_name, c.email, c.phone_number, r.repair_id, r.repair_cost, r.assigned_date, r.return_date, b.cost_description, b.amount
//         FROM Repairs r
//         INNER JOIN Customer c ON r.customer_id = c.customer_id
//         INNER JOIN Billable b ON r.repair_id = b.repair_id
//         WHERE r.repair_id = '$repair_id' AND r.repair_status = 'Completed'";
//         // ORDER BY b.bill_id";

// $result = mysqli_query($conn, $sql);

// if ($result && mysqli_num_rows($result) > 0) {
//     $row = mysqli_fetch_assoc($result);
//     $first_name = $row['first_name'];
//     $last_name = $row['last_name'];
//     $email = $row['email'];
//     $phone_number = $row['phone_number'];
//     $repair_id = $row['repair_id'];
//     $repair_cost = $row['repair_cost'];
//     $assigned_date = $row['assigned_date'];
//     $return_date = $row['return_date'];

//     // Retrieve the billable details from the database
//     $sql_billable = "SELECT cost_description, amount FROM Billable WHERE repair_id = '$repair_id' ORDER BY bill_id";
//     $result_billable = mysqli_query($conn, $sql_billable);

//     // Generate the invoice HTML
    // $html = "
    //     <html>
    //     <head>
    //         <title>Invoice</title>
    //         <link
    //         rel='stylesheet'
    //         href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css'
    //         integrity='sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA='
    //         crossorigin='anonymous'
    //       />
          
    //       <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
          
    //       <script
    //       defer
    //       src='https://use.fontawesome.com/releases/v5.0.7/js/all.js'
    //       ></script>
          
    //       <script
    //       src='https://kit.fontawesome.com/38f42574c5.js'
    //       crossorigin='anonymous'
    //       ></script>
    //       <link rel='stylesheet' href='styles/invoice_template.css' />
          
    //     </head>
    //     <body>
    //     <div class='container'>
    //     <div class='row'>
    //       <div class='col-lg-12'>
    //         <div class='card'>
    //           <div class='card-body'>
    //             <div class='invoice-title'>
    //               <div class='mb-4'>
    //                 <h2 class='mb-1 text-muted'>Tech Cloud Store</h2>
    //               </div>
    //               <div class='text-muted'>
    //                 <p class='mb-1'>Address</p>
    //                 <p class='mb-1'>
    //                   <i class='uil uil-envelope-alt me-1'></i> techcloud@gmail.com
    //                 </p>
    //                 <p><i class='uil uil-phone me-1'></i> +94 10 356 5989</p>
    //               </div>
    //             </div>
      
    //             <hr class='my-4' />
      
    //             <div class='row'>
    //               <div class='col-sm-6'>
    //                 <div class='text-muted'>
    //                   <h5 class='font-size-16 mb-3'>Billed To:</h5>
    //                   <h5 class='font-size-15 mb-2'>$first_name $last_name</h5>
    //                   <p class='mb-1'>$email</p>
    //                   <p>$phone_number</p>
    //                 </div>
    //               </div>
    //               <!-- end col -->
    //               <div class='col-sm-6'>
    //                 <div class='text-muted text-sm-end'>
    //                   <div>
    //                     <h5 class='font-size-15 mb-1'>Repair No:</h5>
    //                     <p># $repair_id</p>
    //                   </div>
    //                   <div class='mt-4'>
    //                     <h5 class='font-size-15 mb-1'>Assigned Date:</h5>
    //                     <p>$assigned_date</p>
    //                   </div>
    //                   <div class='mt-4'>
    //                     <h5 class='font-size-15 mb-1'>Invoice Date:</h5>
    //                     <p>$return_date</p>
    //                   </div>
    //                 </div>
    //               </div>
    //             </div>
    //         <h2>Billable Details</h2>
    //         <div class='table-responsive'>
    //             <table class='table align-middle table-nowrap table-centered mb-0'>
    //                 <thead>
    //                     <tr>
    //                         <th style='width: 70px'>No.</th>
    //                         <th>Item</th>
    //                         <th>Price</th>
    //                         <th>Quantity</th>
    //                         <th class='text-end' style='width: 120px'>Total</th>
    //                     </tr>
    //                 </thead>
    //                 <tbody>
    // ";

//     // Fetch and display the cost descriptions, quantities, and prices in the table
//     $counter = 1;
//     $total_amount = 0;
//     while ($row = mysqli_fetch_assoc($result)) {
//         $cost_description = $row['cost_description'];
//         $amount = $row['amount'];
//         $html .= "
//             <tr>
//                 <th scope='row'>$counter</th>
//                 <td>
//                     <div>
//                         <h5 class='text-truncate font-size-14 mb-1'>$cost_description</h5>
//                     </div>
//                 </td>
//                 <td>$amount</td>
//                 <td>1</td>
//                 <td class='text-end'>$amount</td>
//             </tr>
//         ";
//         $counter++;
//         $total_amount += $amount;
//     }

//     // Add the total row
//     $html .= "
//             <tr>
//                 <th scope='row' colspan='4' class='border-0 text-end'>Total</th>
//                 <td class='border-0 text-end'>
//                     <h4 class='m-0 fw-semibold'>$repair_cost</h4>
//                 </td>
//             </tr>
//     ";

//     // Close the table and HTML body
//     $html .= "
//                 </tbody>
//             </table>
//             </div>
//             <div class='d-print-none mt-4'>
//               <div class='float-end'>
//                 <a href='javascript:window.print()' class='btn btn-success me-1'
//                   ><i class='fa fa-print'></i
//                 ></a>
//               </div>
//             </div>
//           </div>
//         </div>
//       </div>
//     </div>

//   </div>
// </div
// </html>
//     ";

//     // Output the invoice HTML
//     echo $html;
// } else {
//     echo "No completed repair found for the given repair ID.";
// }

// // Close the database connection
// mysqli_close($conn);

require "./db/config.php";

$repair_id = $_GET['repair_id'];

// Retrieve the repair details from the database
$sql_repair = "SELECT c.first_name, c.last_name, c.email, c.phone_number, r.repair_id, r.repair_cost, r.assigned_date, r.return_date
        FROM Repairs r
        INNER JOIN Customer c ON r.customer_id = c.customer_id
        WHERE r.repair_id = '$repair_id' AND r.repair_status = 'Completed'";

$result_repair = mysqli_query($conn, $sql_repair);

if ($result_repair && mysqli_num_rows($result_repair) > 0) {
    $row_repair = mysqli_fetch_assoc($result_repair);
    $first_name = $row_repair['first_name'];
    $last_name = $row_repair['last_name'];
    $email = $row_repair['email'];
    $phone_number = $row_repair['phone_number'];
    $repair_id = $row_repair['repair_id'];
    $repair_cost = $row_repair['repair_cost'];
    $assigned_date = $row_repair['assigned_date'];
    $return_date = $row_repair['return_date'];

    // Retrieve the billable details from the database
    $sql_billable = "SELECT cost_description, amount FROM Billable WHERE repair_id = '$repair_id' ORDER BY bill_id";
    $result_billable = mysqli_query($conn, $sql_billable);

    // Generate the invoice HTML
    $html = "
        <html>
        <head>
            <title>Invoice</title>
            <link
            rel='stylesheet'
            href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css'
            integrity='sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA='
            crossorigin='anonymous'
          />
          
          <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
          
          <script
          defer
          src='https://use.fontawesome.com/releases/v5.0.7/js/all.js'
          ></script>
          
          <script
          src='https://kit.fontawesome.com/38f42574c5.js'
          crossorigin='anonymous'
          ></script>
          <link rel='stylesheet' href='styles/invoice_template.css' />
          
        </head>
        <body>
        <div class='container'>
        <div class='row'>
          <div class='col-lg-12'>
            <div class='card'>
              <div class='card-body'>
                <div class='invoice-title'>
                  <div class='mb-4'>
                    <h2 class='mb-1 text-muted'>Tech Cloud Store</h2>
                  </div>
                  <div class='text-muted'>
                    <p class='mb-1'>Address</p>
                    <p class='mb-1'>
                      <i class='uil uil-envelope-alt me-1'></i> techcloud@gmail.com
                    </p>
                    <p><i class='uil uil-phone me-1'></i> +94 10 356 5989</p>
                  </div>
                </div>
      
                <hr class='my-4' />
      
                <div class='row'>
                  <div class='col-sm-6'>
                    <div class='text-muted'>
                      <h5 class='font-size-16 mb-3'>Billed To:</h5>
                      <h5 class='font-size-15 mb-2'>$first_name $last_name</h5>
                      <p class='mb-1'>$email</p>
                      <p>$phone_number</p>
                    </div>
                  </div>
                  <!-- end col -->
                  <div class='col-sm-6'>
                    <div class='text-muted text-sm-end'>
                      <div>
                        <h5 class='font-size-15 mb-1'>Repair No:</h5>
                        <p># $repair_id</p>
                      </div>
                      <div class='mt-4'>
                        <h5 class='font-size-15 mb-1'>Assigned Date:</h5>
                        <p>$assigned_date</p>
                      </div>
                      <div class='mt-4'>
                        <h5 class='font-size-15 mb-1'>Invoice Date:</h5>
                        <p>$return_date</p>
                      </div>
                    </div>
                  </div>
                </div>
            <h2>Billable Details</h2>
            <div class='table-responsive'>
                <table class='table align-middle table-nowrap table-centered mb-0'>
                    <thead>
                        <tr>
                            <th style='width: 70px'>No.</th>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th class='text-end' style='width: 120px'>Total</th>
                        </tr>
                    </thead>
                    <tbody>
    ";


    // Fetch and display the billable details in a table
    $itemCount = 1;
    $totalAmount = 0;
    while ($row_billable = mysqli_fetch_assoc($result_billable)) {
        $cost_description = $row_billable['cost_description'];
        $amount = $row_billable['amount'];
        $html .= "
            <tr>
                <td scope='row'>$itemCount</td>
                <td>
                    <div>
                        <h5 class='text-truncate font-size-14 mb-1'>$cost_description</h5>
                    </div>
                </td>
                <td>$amount</td>
                <td>1</td>
                <td class='text-end'>$amount</td>
            </tr>
        ";
        $itemCount++;
        $totalAmount += $amount;
    }

    // Add the total row to the table
    $html .= "
            <tr>
                <th scope='row' colspan='4' class='border-0 text-end'>Total</th>
                <td class='border-0 text-end'>
                    <h4 class='m-0 fw-semibold'>$repair_cost</h4>
                </td>
            </tr>
    ";

    // Close the HTML body and document
    $html .= "
                </tbody>
            </table>
            </div>
            <div class='d-print-none mt-4'>
              <div class='float-end'>
                <a href='javascript:window.print()' class='btn btn-success me-1'
                  ><i class='fa fa-print'></i
                ></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div
</html>
    ";

    // Output the invoice HTML
    echo $html;
} else {
    echo "No completed repair found for the given repair ID.";
}

// Close the database connection
mysqli_close($conn);

?>
