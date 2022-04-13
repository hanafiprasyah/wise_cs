// function readReq() {
//     Swal.fire({
//         title: 'Do you already read this maintenance request?',
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#d33',
//         cancelButtonColor: '#3085d6',
//         confirmButtonText: 'Sure',
//         cancelButtonText: 'Cancel'
//     }).then((result) => {
//         if (result.isConfirmed && result.value == true) {
//             // window.location.href = "../screen/mainReq_detail.php?id=<?php echo $id_url ?>"
//             window.location.href = "../../database/mainreq/read_request.php?id=<?php echo $id_url ?>"
//         } else {
//             return;
//         }
//     })
// }

function editClient() {
    Swal.fire({
        title: 'Do you want to edit this customer?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sure',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed && result.value == true) {
            window.location.href = "../screen/client_edit.php?id=<?php echo $id_url ?>"
        } else {
            return;
        }
    })
}

function editProject() {
    Swal.fire({
        title: 'Do you want to edit this project?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sure',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed && result.value == true) {
            window.location.href = "../screen/project_edit.php?id=<?php echo $id_url ?>"
        } else {
            return;
        }
    })
}