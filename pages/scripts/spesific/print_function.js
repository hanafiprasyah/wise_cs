function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}

function printProject() {
    Swal.fire({
        title: 'Do you want to print this project?',
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Print',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed && result.value == true) {
            printDiv('printableArea');
            window.location.href = "../screen/project_detail.php?id=<?php echo $id_url ?>"
        } else {
            return;
        }
    })
}


function printMainReq() {
    Swal.fire({
        title: 'Do you want to print this maintenance request?',
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Print',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed && result.value == true) {
            printDiv('printableArea');
            window.location.href = "../screen/mainReq_detail.php?id=<?php echo $id_url ?>"
        } else {
            return;
        }
    })
}

function printClient() {
    Swal.fire({
        title: 'Do you want to print this customer profile?',
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Print',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed && result.value == true) {
            printDiv('printableArea');
            window.location.href = "../screen/client_detail.php?id=<?php echo $id_url ?>"
        } else {
            return;
        }
    })
}