function removeReq() {
    Swal.fire({
        title: 'Do you want to remove this maintenance request?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sure',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed && result.value == true) {
            window.location.href = "../../database/mainreq/delete_request.php?id=<?php echo $id_url ?>"
        } else {
            return;
        }
    })
}

function removeLoginLogs() {
    Swal.fire({
        title: 'Do you want to remove all of this logs?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sure',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed && result.value == true) {
            window.location.href = "../../database/tracker/delete_login_logs.php?>"
        } else {
            return;
        }
    })
}

function removeProject() {
    Swal.fire({
        title: 'Do you want to remove this project?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sure',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed && result.value == true) {
            window.location.href = "../../database/project/delete_project.php?id=<?php echo $id_url ?>"
        } else {
            return;
        }
    })
}

function removeClient() {
    Swal.fire({
        title: 'Do you want to remove this customer?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sure',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed && result.value == true) {
            window.location.href = "../../database/client/delete_client.php?id=<?php echo $id_url ?>"
        } else {
            return;
        }
    })
}

function removeQuotes() {
    Swal.fire({
        title: 'Do you want to remove this quotes?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sure',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed && result.value == true) {
            window.location.href = ""
        } else {
            return;
        }
    })
}